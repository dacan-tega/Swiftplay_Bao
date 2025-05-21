<?php

namespace Slotgen\SlotgenCaptainsBounty;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class SlotgenCaptainsBounty implements Plugin
{
    public function getId(): string
    {
        return 'slotgen-captainsbounty';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('slotgen-captainsbounty', __DIR__ . '/../resources/dist/slotgen-captainsbounty.css'),
        ]);

        $panel
            ->font('DM Sans')
            ->primaryColor(Color::Amber)
            ->secondaryColor(Color::Gray)
            ->warningColor(Color::Amber)
            ->dangerColor(Color::Rose)
            ->successColor(Color::Green)
            ->grayColor(Color::Gray)
            ->theme('slotgen-captainsbounty');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
