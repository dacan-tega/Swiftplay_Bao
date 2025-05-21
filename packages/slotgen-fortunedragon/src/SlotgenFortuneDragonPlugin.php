<?php

namespace Slotgen\SlotgenFortuneDragon;

use Filament\Contracts\Plugin;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Slotgen\SlotgenFortuneDragon\Filament\Pages\SlotgenFortuneDragonConfigPage;

class SlotgenFortuneDragonPlugin implements Plugin
{
    public function getId(): string
    {
        return 'slotgen-fortunedragon';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            SlotgenFortuneDragonConfigPage::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function getNavigationItems(): NavigationGroup
    {
        return NavigationGroup::make('Fortune Dragon')
            ->items([
                NavigationItem::make('fortune-tiger')
                    ->icon('heroicon-o-key')
                    ->label(fn (): string => 'Setting')
                    ->url(fn (): string => SlotgenFortuneDragonConfigPage::getUrl())
                    ->visible(true),
            ]);
    }
}
