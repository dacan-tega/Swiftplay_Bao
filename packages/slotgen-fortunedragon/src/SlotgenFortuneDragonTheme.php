<?php

namespace Slotgen\SlotgenFortuneDragon;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class SlotgenFortuneDragon implements Plugin
{
    public function getId(): string
    {
        return 'slotgen-fortunedragon';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('slotgen-fortunedragon', __DIR__ . '/../resources/dist/slotgen-fortunedragon.css'),
        ]);

        $panel
            ->font('DM Sans')
            ->primaryColor(Color::Amber)
            ->secondaryColor(Color::Gray)
            ->warningColor(Color::Amber)
            ->dangerColor(Color::Rose)
            ->successColor(Color::Green)
            ->grayColor(Color::Gray)
            ->theme('slotgen-fortunedragon');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
