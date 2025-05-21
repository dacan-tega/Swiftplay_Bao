<?php

namespace Slotgen\SlotgenAztec;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class SlotgenAztec implements Plugin
{
    public function getId(): string
    {
        return 'slotgen-aztec';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('slotgen-aztec', __DIR__ . '/../resources/dist/slotgen-aztec.css'),
        ]);

        $panel
            ->font('DM Sans')
            ->primaryColor(Color::Amber)
            ->secondaryColor(Color::Gray)
            ->warningColor(Color::Amber)
            ->dangerColor(Color::Rose)
            ->successColor(Color::Green)
            ->grayColor(Color::Gray)
            ->theme('slotgen-aztec');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
