<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use File;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    /**
     * @return array|Tab[]
     */
    // protected function getTableQuery(): Builder 
    // {
    //     return parent::getTableQuery()->groupBy('game');
    // } 

    public function getTabs(): array
    {
        $configPrivate = storage_path('private/config.json');
        $apiConfig = File::get($configPrivate);
        $apiInfo = (object) json_decode($apiConfig, true);
        $agen = $apiInfo->agent;
        $gentArr = [];
        $arrMergeFs = ["Home" => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('agent_id', "-1"))];
        $arrMergeAll = ["All" => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('created_at', '>', now()->subWeek()))];
        $gentArr = array_merge($gentArr,$arrMergeAll);
        $gentArr = array_merge($gentArr,$arrMergeFs);
        for ($i = 0; $i < count($agen); $i++) {
            $arrMerge = ["agent {$i}" => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('agent_id', $i))];
            $gentArr = array_merge($gentArr,$arrMerge);
        }
        // dd($arrMerge);
        return $gentArr;
        // return [
            
        //     // "Fortune Dragon" => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('created_at', '>', now()->subWeek())->where('game', "Fortune Dragon")),
        //     // "Gates of Olympus" => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('created_at', '>', now()->subWeek())->where('game', "Gates of Olympus")),
        //     __('admin.All') => Tab::make()->modifyQueryUsing(fn($query) => $query->where('created_at', '>', now()->subWeek())),
        //     // __('admin.All') => Tab::make(),
        //     // __('admin.This_Week') => Tab::make()->modifyQueryUsing(fn($query) => $query->where('created_at', '>', now()->subWeek()))->badge(Order::query()->where('created_at', '>', now()->subWeek())->count()),
        //     // __('admin.This_Month') => Tab::make()->modifyQueryUsing(fn($query) => $query->where('created_at', '>', now()->subMonth()))->badge(Order::query()->where('created_at', '>', now()->subMonth())->count()),
        //     // __('admin.This_Year') => Tab::make()->modifyQueryUsing(fn($query) => $query->where('created_at', '>', now()->subYear()))->badge(Order::query()->where('created_at', '>', now()->subYear())->count()),
        // ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
