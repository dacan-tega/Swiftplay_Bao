<?php

namespace App\Filament\Resources\ConfigAgentResource\Pages;

use App\Filament\Resources\ConfigAgentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfigAgent extends EditRecord
{
    protected static string $resource = ConfigAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
