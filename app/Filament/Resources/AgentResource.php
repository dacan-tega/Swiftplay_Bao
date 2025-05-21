<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgentResource\Pages;
use App\Filament\Resources\AgentResource\RelationManagers;
use App\Models\Agent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('api')
                            ->label('Api_url')
                            ->placeholder('Api_url')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('token')
                            ->label('Secret Key')
                            ->placeholder('Secret Key')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('operator_id')
                            ->label('Operator Id')
                            ->placeholder('Operator Id')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\TextInput::make('currency')
                            ->label('Currency')
                            ->placeholder('Currency')
                            ->maxLength(191),
                        Forms\Components\TextInput::make('home_url')
                            ->label('Home Url')
                            ->placeholder('Home Url')
                            ->maxLength(191),
                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('api')
                    ->label('Api_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('token')
                    ->label('Secret Key'),
                Tables\Columns\TextColumn::make('operator_id')
                    ->label('Operator Id'),
                Tables\Columns\TextColumn::make('currency')
                    ->label('Currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('home_url')
                    ->label('Home Url')
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions(env('APP_DEMO') ? [] : [
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListAgents::route('/'),
            'create' => Pages\CreateAgent::route('/create'),
            'edit' => Pages\EditAgent::route('/{record}/edit'),
        ];
    }
}
