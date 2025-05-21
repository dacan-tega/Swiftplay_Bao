<?php

namespace App\Livewire;

use App\Models\AffiliateHistory;
use App\Models\User;
use App\Models\Wallet;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminWidgets extends BaseWidget
{
    protected static ?int $navigationSort = -2;

    /**
     * @return array|Stat[]
     */
    protected function getCards(): array
    {
        $comissaoTotal      = Wallet::where('user_id', auth()->user()->id)->sum('refer_rewards');
        $comissaoRevshare   = AffiliateHistory::where('commission_type', 'revshare')->where('status', 1)->sum('commission_paid');
        $comissaoCPAs       = AffiliateHistory::where('commission_type', 'cpa')->where('status', 1)->sum('commission_paid');

        return [
            Stat::make(__('admin.Commission'), \Helper::amountFormatDecimal($comissaoTotal))
                ->description(__('admin.Affiliate_Commission'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make(__('admin.CPA_Commission'), \Helper::amountFormatDecimal($comissaoCPAs))
                ->description(__('admin.CPA_Commission'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make(__('admin.Revshare_Commission'), \Helper::amountFormatDecimal($comissaoRevshare))
                ->description(__('admin.Revshare_Commission'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }

    /**
     * @return bool
     */
    public static function canView(): bool
    {
        return auth()->user()->hasRole(__('admin.Affiliate'));
    }
}
