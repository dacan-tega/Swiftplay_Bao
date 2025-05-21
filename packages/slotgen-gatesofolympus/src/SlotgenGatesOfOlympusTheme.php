<?php

namespace Slotgen\SlotgenGatesOfOlympus;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class SlotgenGatesOfOlympus implements Plugin
{
    public function getId(): string
    {
        return 'slotgen-gatesofolympus';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('slotgen-gatesofolympus', __DIR__ . '/../resources/dist/slotgen-gatesofolympus.css'),
        ]);

        $panel
            ->font('DM Sans')
            ->primaryColor(Color::Amber)
            ->secondaryColor(Color::Gray)
            ->warningColor(Color::Amber)
            ->dangerColor(Color::Rose)
            ->successColor(Color::Green)
            ->grayColor(Color::Gray)
            ->theme('slotgen-gatesofolympus');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
