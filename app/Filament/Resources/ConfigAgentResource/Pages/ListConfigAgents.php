<?php

namespace App\Filament\Resources\ConfigAgentResource\Pages;

use App\Filament\Resources\ConfigAgentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfigAgents extends ListRecords
{
    protected static string $resource = ConfigAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
