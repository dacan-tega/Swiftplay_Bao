<?php

namespace App\Filament\Resources\ConfigAgentResource\Pages;

use App\Filament\Resources\ConfigAgentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\ConfigAgent;

class CreateConfigAgent extends CreateRecord
{
    protected static string $resource = ConfigAgentResource::class;

    /**
     * Posso manipular os dados antes da criação
     * @param array $data
     * @return Model
     */
    protected function handleRecordCreation(array $data): Model
    {
        // $data['slug'] = Str::slug($data['name']);

        $Agent = ConfigAgent::where('game_code', $data['game_code'])->where('agent_id', $data['agent_id'])->first();
        
        // dd($Agent);
        if(!empty($Agent)) {
            $Agent->delete();
        } 
        
        return static::getModel()::create($data);

    }
}
