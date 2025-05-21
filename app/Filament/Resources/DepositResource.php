<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepositResource\Pages;
use App\Filament\Resources\DepositResource\RelationManagers;
use App\Models\Deposit;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class DepositResource extends Resource
{
    protected static ?string $model = Deposit::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';

    protected static ?string $navigationLabel = 'Deposits';

    protected static ?string $modelLabel = 'Deposits';

    protected static ?string $navigationGroup = 'Administração';

    protected static ?string $slug = 'todos-depositos';

    protected static ?int $navigationSort = 2;

    /**
     * @return string|null
     */
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 0)->count();
    }

    /**
     * @return string|array|null
     */
    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::where('status', 0)->count() > 5 ? 'success' : 'warning';
    }

    /**
     * @param Form $form
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Deposit Registration')
                ->schema([
                    Forms\Components\Select::make('user_id')
                        ->label(__('admin.User'))
                        ->placeholder(__('admin.Select_user'))
                        ->relationship(name: 'users', titleAttribute: 'name')
                        ->options(
                            fn($get) => User::query()
                                ->pluck('name', 'id')
                        )
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Forms\Components\TextInput::make('amount')
                        ->label(__('admin.Value'))
                        ->required()
                        ->default(0.00),
                    Forms\Components\TextInput::make('type')
                        ->label(__('admin.Type'))
                        ->required()
                        ->maxLength(191),
                    Forms\Components\FileUpload::make('proof')
                        ->label(__('admin.Proof'))
                        ->placeholder(__('admin.Upload_receipt_image'))
                        ->image()
                        ->columnSpanFull()
                        ->required(),
                    Forms\Components\Toggle::make('status')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label(__('admin.Value'))
                    ->formatStateUsing(fn (Deposit $record): string => $record->symbol . ' ' . $record->amount)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label(__('admin.Type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('proof')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('approve_payment')
                    ->label(__('admin.Approve'))
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Deposit $deposit): bool => !$deposit->pendding)
                    ->action(function(Deposit $deposit) {
                        \Filament\Notifications\Notification::make()
                            ->title(__('admin.Deposit'))
                            ->success()
                            ->persistent()
                            ->body(__('admin.requesting_deposit'). \Helper::amountFormatDecimal($deposit->amount))
                            ->actions([
                                \Filament\Notifications\Actions\Action::make('view')
                                    ->label(__('admin.Confirm'))
                                    ->button()
                                    ->url(route(\Helper::getGatewaySelected().'.deposit.approve', ['id' => $deposit->id]))
                                    ->close(),
                                \Filament\Notifications\Actions\Action::make('undo')
                                    ->color('gray')
                                    ->label(__('admin.Cancel'))
                                    ->action(function(Deposit $deposit) {

                                    })
                                    ->close(),
                            ])
                            ->send();
                    }),
                    Action::make('decline_payment')
                    ->label(__('admin.Decline'))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn (Deposit $deposit): bool => !$deposit->pendding)
                    ->action(function(Deposit $deposit) {
                        \Filament\Notifications\Notification::make()
                            ->title(__('admin.Deposit'))
                            ->success()
                            ->persistent()
                            ->body(__('admin.requesting_deposit'). \Helper::amountFormatDecimal($deposit->amount))
                            ->actions([
                                \Filament\Notifications\Actions\Action::make('view')
                                    ->label(__('admin.Confirm'))
                                    ->button()
                                    ->url(route(\Helper::getGatewaySelected().'.deposit.decline', ['id' => $deposit->id]))
                                    ->close(),
                                \Filament\Notifications\Actions\Action::make('undo')
                                    ->color('gray')
                                    ->label(__('admin.Cancel'))
                                    ->action(function(Deposit $deposit) {

                                    })
                                    ->close(),
                            ])
                            ->send();
                    }),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions(env('APP_DEMO') ? [] :[
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
            'index' => Pages\ListDeposits::route('/'),
            'create' => Pages\CreateDeposit::route('/create'),
            'edit' => Pages\EditDeposit::route('/{record}/edit'),
        ];
    }
}
