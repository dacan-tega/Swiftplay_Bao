<?php

namespace App\Filament\Resources\AgentResource\Pages;

use App\Filament\Resources\AgentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Agent;
use File;

class EditAgent extends EditRecord
{
    protected static string $resource = AgentResource::class;

    protected function getHeaderActions(): array
    {
        // $configPrivate = storage_path('private/config.json');
        // $agents = Agent::get()->toArray();
        // $res = [];
        // foreach ($agents as $agent) {
        //     $res[] = [
        //         "api" => $agent['api'],
        //         "token" => $agent['token'],
        //         "currency" => $agent['currency'],
        //         "home_url" => $agent['home_url'],
        //     ];
        // }
        // $resArr = ["agent" => $res];
        // File::put($configPrivate, json_encode($resArr));
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
