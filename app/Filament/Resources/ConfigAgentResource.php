<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigAgentResource\Pages;
use App\Filament\Resources\ConfigAgentResource\RelationManagers;
use App\Models\ConfigAgent;
use App\Models\Agent;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConfigAgentResource extends Resource
{
    protected static ?string $model = ConfigAgent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('game_name')
                            ->label('Game Name')
                            ->placeholder('Game Name')
                            ->required()
                            ->options(
                                fn($get) => Game::query()
                                    ->pluck('name', 'name')
                            ),
                        Forms\Components\Select::make('game_code')
                            ->label('Game Code')
                            ->placeholder('Game Code')
                            ->required()
                            ->options(
                                fn($get) => Game::query()
                                    ->pluck('technology', 'technology')
                            ),
                        Forms\Components\Select::make('agent_id')
                            ->label('Agent Id')
                            ->placeholder('Agent Id')
                            ->options(
                                fn($get) => Agent::query()
                                    ->pluck('id', 'id')
                            ),
                        Forms\Components\TextInput::make('bet_size')
                            ->label('Bet Size')
                            ->placeholder('Bet Size')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('bet_level')
                            ->label('Bet Level')
                            ->placeholder('Bet Level')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('base_bet')
                            ->label('Base Bet')
                            ->placeholder('Base Bet')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('max_bet')
                            ->label('Bet Limit')
                            ->placeholder('Bet Limit')
                            ->maxLength(191),
                        Forms\Components\TextInput::make('min_bet')
                            ->label('Min Bet')
                            ->placeholder('Min Bet')
                            ->maxLength(191),

                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('game_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('game_code')
                    ->label('Game Code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agent_id')
                    ->label('Agent Id'),
                Tables\Columns\TextColumn::make('bet_size')
                    ->label('Bet Size')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bet_level')
                    ->label('Bet Level')
                    ->searchable(),
                Tables\Columns\TextColumn::make('base_bet')
                    ->label('Base Bet')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_bet')
                    ->label('Bet Limit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_bet')
                    ->label('Bet Limit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('min_bet')
                    ->label('Min Bet')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfigAgents::route('/'),
            'create' => Pages\CreateConfigAgent::route('/create'),
            'edit' => Pages\EditConfigAgent::route('/{record}/edit'),
        ];
    }
}
