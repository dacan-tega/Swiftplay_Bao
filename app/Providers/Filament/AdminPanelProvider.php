<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Pages\GamesKeyPage;
use App\Filament\Pages\GatewayPage;
use App\Filament\Pages\SettingMailPage;
use App\Filament\Pages\CopyPackagesPage;
use App\Filament\Pages\RunComposer;
use App\Filament\Pages\Settings;
use App\Filament\Pages\SuitPayPaymentPage;
use App\Filament\Resources\BannerResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\HomeControllerResource;
use App\Filament\Resources\DepositResource;
use App\Filament\Resources\FiversGameResource;
use App\Filament\Resources\FiversProviderResource;
use App\Filament\Resources\GameExclusiveResource;
use App\Filament\Resources\GameResource;
use App\Filament\Resources\OrderResource;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\VibraCasinoGameResource;
use App\Filament\Resources\WalletResource;
use App\Filament\Resources\WithdrawalResource;
use App\Livewire\AdminWidgets;
use App\Livewire\LatestAdminComissions;
use App\Livewire\WalletOverview;
use App\Models\BetCategory;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Resources\AgentResource;
use App\Filament\Resources\ConfigAgentResource;
use Slotgen\SlotgenGatesOfOlympus\SlotgenGatesOfOlympusPlugin;
use Slotgen\SlotgenFortuneDragon\SlotgenFortuneDragonPlugin;
use Slotgen\SlotgenCaptainsBounty\SlotgenCaptainsBountyPlugin;
use Slotgen\SlotgenAztec\SlotgenAztecPlugin;



class AdminPanelProvider extends PanelProvider
{
    /**
     * @param Panel $panel
     * @return Panel
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Slate,
                'info' => Color::Blue,
                'primary' => Color::Indigo,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->font('Roboto Condensed')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->sidebarCollapsibleOnDesktop()
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                WalletOverview::class,
                AdminWidgets::class,
                LatestAdminComissions::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                //'hasRole:0|1'
            ])
            ->plugins([
                SlotgenGatesOfOlympusPlugin::make(),
                SlotgenFortuneDragonPlugin::make(),
                SlotgenCaptainsBountyPlugin::make(),
                SlotgenAztecPlugin::make(),
            ])

            ->sidebarCollapsibleOnDesktop()
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('dashboard')
                                ->icon('heroicon-o-home')
                                ->label(fn(): string => __('filament-panels::pages/dashboard.title'))
                                ->url(fn(): string => Dashboard::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs('filament.pages.settings')),

                            NavigationItem::make('settings')
                                ->icon('heroicon-o-wrench-screwdriver')
                                ->label(fn(): string => __('admin.settings'))
                                ->url(fn(): string => Settings::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs('filament.pages.settings'))
                                ->visible(fn(): bool => auth()->user()->hasRole('admin')),

                            NavigationItem::make('games-key')
                                ->icon('heroicon-o-key')
                                ->label(fn(): string => __('admin.Game_Keys'))
                                ->url(fn(): string => GamesKeyPage::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs('filament.pages.games-key-page'))
                                ->visible(fn(): bool => auth()->user()->hasRole('admin')),

                            NavigationItem::make('gateway')
                                ->icon('heroicon-o-cog-6-tooth')
                                ->label(fn(): string => __('admin.Payment_Gateway'))
                                ->url(fn(): string => GatewayPage::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs('filament.pages.gateway-page'))
                                ->visible(fn(): bool => auth()->user()->hasRole('admin')),

                            NavigationItem::make('setting-mail')
                                ->icon('heroicon-o-envelope')
                                ->label(fn(): string => __('admin.Email_Settings'))
                                ->url(fn(): string => SettingMailPage::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs('filament.pages.setting-mail-page'))
                                ->visible(fn(): bool => auth()->user()->hasRole('admin')),

                            NavigationItem::make('suitpay-pagamentos')
                                ->icon('heroicon-o-currency-dollar')
                                ->label(fn(): string => __('admin.SuitPay_Payments'))
                                ->url(fn(): string => SuitPayPaymentPage::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs('filament.pages.suit-pay-payment-page'))
                                ->visible(fn(): bool => auth()->user()->hasRole('admin')),
                        ]),

                    SlotgenGatesOfOlympusPlugin::make()->getNavigationItems(),
                    SlotgenFortuneDragonPlugin::make()->getNavigationItems(),
                    SlotgenCaptainsBountyPlugin::make()->getNavigationItems(),
                    SlotgenAztecPlugin::make()->getNavigationItems(),
                    // auth()->user()->hasRole('admin') ?
                    //     NavigationGroup::make(__('admin.Game_Settings'))
                    //     ->items([
                    //         ...FiversProviderResource::getNavigationItems(),
                    //         ...CategoryResource::getNavigationItems(),
                    //     ])
                    //     : NavigationGroup::make(),

                    auth()->user()->hasRole('admin') ?
                        NavigationGroup::make('Manage Games')
                        ->items([
                            ...GameResource::getNavigationItems(),
                        ])
                        : NavigationGroup::make(),
                    auth()->user()->hasRole('admin') ?
                        NavigationGroup::make(__('admin.Customization'))
                        ->items([
                            ...BannerResource::getNavigationItems(),
                        ])
                        : NavigationGroup::make(),

                    auth()->user()->hasRole('admin') ?
                        NavigationGroup::make(__('admin.Administration'))
                        ->items([
                            ...UserResource::getNavigationItems(),
                            ...AgentResource::getNavigationItems(),
                            ...ConfigAgentResource::getNavigationItems(),
                            ...WalletResource::getNavigationItems(),
                            ...DepositResource::getNavigationItems(),
                            ...WithdrawalResource::getNavigationItems(),
                            ...OrderResource::getNavigationItems()
                        ])
                        : NavigationGroup::make(),
                    auth()->user()->hasRole('admin') && env('APP_DEMO') === false ?
                        NavigationGroup::make(__(config('filament-spatie-roles-permissions.navigation_section_group', 'filament-spatie-roles-permissions::filament-spatie.section.roles_and_permissions')))
                        ->items([
                            NavigationItem::make(__('filament-spatie-roles-permissions::filament-spatie.section.role'))
                                ->icon('heroicon-o-user-group')
                                ->isActiveWhen(fn() => request()->routeIs([
                                    'filament.admin.resources.roles.index',
                                    'filament.admin.resources.roles.create',
                                    'filament.admin.resources.roles.view',
                                    'filament.admin.resources.roles.edit',
                                ]))
                                ->url(fn(): string => '/admin/roles'),
                            NavigationItem::make(__('filament-spatie-roles-permissions::filament-spatie.section.permission'))
                                ->icon('heroicon-o-lock-closed')
                                ->isActiveWhen(fn() => request()->routeIs([
                                    'filament.admin.resources.permissions.index',
                                    'filament.admin.resources.permissions.create',
                                    'filament.admin.resources.permissions.view',
                                    'filament.admin.resources.permissions.edit',
                                ]))
                                ->url(fn(): string => '/admin/permissions'),
                        ])
                        : NavigationGroup::make(),

                ]);
            });
    }
}
