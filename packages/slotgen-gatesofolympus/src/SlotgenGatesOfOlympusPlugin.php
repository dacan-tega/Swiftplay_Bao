<?php

namespace Slotgen\SlotgenGatesOfOlympus;

use Filament\Contracts\Plugin;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Slotgen\SlotgenGatesOfOlympus\Filament\Pages\SlotgenGatesOfOlympusConfigPage;

class SlotgenGatesOfOlympusPlugin implements Plugin
{
    public function getId(): string
    {
        return 'slotgen-gatesofolympus';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            SlotgenGatesOfOlympusConfigPage::class,
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
        return NavigationGroup::make('Gates Of Olympus')
            ->items([
                NavigationItem::make('fortune-tiger')
                    ->icon('heroicon-o-key')
                    ->label(fn (): string => 'Setting')
                    ->url(fn (): string => SlotgenGatesOfOlympusConfigPage::getUrl())
                    ->visible(true),
            ]);
    }
}
