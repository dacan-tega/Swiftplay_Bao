<?php

namespace App\Livewire;

use App\Models\Deposit;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WalletOverview extends BaseWidget
{
    protected static ?int $sort = -2;

    protected function getStats(): array
    {
        $setting = \Helper::getSetting();
        $dataAtual = Carbon::now();

        // Executa a consulta para obter a soma dos depósitos para o mês atual
        $sumDepositMonth = Deposit::whereMonth('created_at', Carbon::now()->month)
            ->where('status', 1)
            ->sum('amount');

        $sumWithdrawalMonth = Withdrawal::whereMonth('created_at', Carbon::now()->month)
            ->sum('amount');

        $revshare = \Helper::porcentagem_xn($setting->revshare_percentage, $sumDepositMonth);

        return [
            Stat::make(__('admin.Deposits'), \Helper::amountFormatDecimal($sumDepositMonth))
                ->description(__('admin.Total_Deposits'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make(__('admin.Withdrawals'), \Helper::amountFormatDecimal($sumWithdrawalMonth))
                ->description(__('admin.Total_withdrawals'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Revshare', \Helper::amountFormatDecimal($revshare))
                ->description(__('admin.Platform Earnings'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
