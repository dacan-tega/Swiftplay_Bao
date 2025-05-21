<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WithdrawalResource\Pages;
use App\Filament\Resources\WithdrawalResource\RelationManagers;
use App\Models\User;
use App\Models\Withdrawal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class WithdrawalResource extends Resource
{

    protected static ?string $model = Withdrawal::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-tray';

    protected static ?string $navigationLabel = 'Take out';

    protected static ?string $modelLabel = 'Take out';

    protected static ?string $navigationGroup = 'Administração';

    protected static ?string $slug = 'todos-saques';

    protected static ?int $navigationSort = 3;

    /**
     * @return string[]
     */
    public static function getGloballySearchableAttributes(): array
    {
        return ['type', 'bank_info', 'user.name', 'user.last_name', 'user.cpf', 'user.phone',  'user.email'];
    }

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
                Forms\Components\Section::make('Cadastro de Saques')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label(__('admin.User'))
                            ->placeholder(__('admin.Select_user'))
                            ->relationship(name: 'user', titleAttribute: 'name')
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

    /**
     * @param Table $table
     * @return Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('admin.User'))
                    ->searchable(['users.name', 'users.last_name'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label(__('admin.Value'))
                    ->formatStateUsing(fn (Withdrawal $record): string => $record->symbol . ' ' . $record->amount)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_chave')
                    ->label(__('admin.Type'))
                    //->formatStateUsing(fn (string $state): string => \Helper::formatPixType($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('chave_pix')
                    ->label(__('admin.Pix_Key')),
                Tables\Columns\TextColumn::make('proof')
                    ->label(__('admin.Transaction_ID'))
                   ->html()
                   ->formatStateUsing(fn (string $state): string => '<a href="'.url('storage/'.$state).'" target="_blank">Baixar</a>'),
               Tables\Columns\IconColumn::make('status')
                    ->boolean()
                ,
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data')
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
                    ->visible(fn (Withdrawal $withdrawal): bool => !$withdrawal->pendding)
                    ->action(function(Withdrawal $withdrawal) {
                        \Filament\Notifications\Notification::make()
                            ->title(__('admin.Withdraw'))
                            ->success()
                            ->persistent()
                            ->body(__('admin.requesting_withdrawal'). \Helper::amountFormatDecimal($withdrawal->amount))
                            ->actions([
                                \Filament\Notifications\Actions\Action::make('view')
                                    ->label(__('admin.Confirm'))
                                    ->button()
                                    ->url(route(\Helper::getGatewaySelected().'.withdrawal.approve', ['id' => $withdrawal->id]))
                                    ->close(),
                                \Filament\Notifications\Actions\Action::make('undo')
                                    ->color('gray')
                                    ->label(__('admin.Cancel'))
                                    ->action(function(Withdrawal $withdrawal) {

                                    })
                                    ->close(),
                            ])
                            ->send();
                    }),
                    Action::make('decline_payment')
                    ->label(__('admin.Decline'))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn (Withdrawal $withdrawal): bool => !$withdrawal->pendding)
                    ->action(function(Withdrawal $withdrawal) {
                        \Filament\Notifications\Notification::make()
                            ->title(__('admin.Withdraw'))
                            ->success()
                            ->persistent()
                            ->body(__('admin.requesting_withdrawal'). \Helper::amountFormatDecimal($withdrawal->amount))
                            ->actions([
                                \Filament\Notifications\Actions\Action::make('view')
                                    ->label(__('admin.Confirm'))
                                    ->button()
                                    ->url(route(\Helper::getGatewaySelected().'.withdrawal.decline', ['id' => $withdrawal->id]))
                                    ->close(),
                                \Filament\Notifications\Actions\Action::make('undo')
                                    ->color('gray')
                                    ->label(__('admin.Cancel'))
                                    ->action(function(Withdrawal $withdrawal) {

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



    /**
     * @return array|\Filament\Resources\RelationManagers\RelationGroup[]|\Filament\Resources\RelationManagers\RelationManagerConfiguration[]|string[]
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWithdrawals::route('/'),
            'create' => Pages\CreateWithdrawal::route('/create'),
            'edit' => Pages\EditWithdrawal::route('/{record}/edit'),
        ];
    }
}
