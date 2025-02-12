<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::incomes()->get()->sum('amount');
        $pengeluaran = Transaction::expenses()->get()->sum('amount');
        return [
            Stat::make('Total Pemasukan', $pemasukan)
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Total Pengeluaran', $pengeluaran)
            ->description('7% decrease')
            ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Selisih', $pemasukan - $pengeluaran)
            ->description('3% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
