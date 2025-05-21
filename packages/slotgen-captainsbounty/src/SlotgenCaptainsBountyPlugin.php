<?php

namespace Slotgen\SlotgenCaptainsBounty;

use Filament\Contracts\Plugin;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Slotgen\SlotgenCaptainsBounty\Filament\Pages\SlotgenCaptainsBountyConfigPage;

class SlotgenCaptainsBountyPlugin implements Plugin
{
    public function getId(): string
    {
        return 'slotgen-captainsbounty';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            SlotgenCaptainsBountyConfigPage::class,
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
        return NavigationGroup::make('Captains Bounty')
            ->items([
                NavigationItem::make('fortune-tiger')
                    ->icon('heroicon-o-key')
                    ->label(fn (): string => 'Setting')
                    ->url(fn (): string => SlotgenCaptainsBountyConfigPage::getUrl())
                    ->visible(true),
            ]);
    }
}
