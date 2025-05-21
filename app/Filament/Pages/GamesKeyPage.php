<?php

namespace App\Filament\Pages;

use App\Models\GamesKey;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class GamesKeyPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.games-key-page';

    protected static ?string $title = 'Game Keys';

    protected static ?string $slug = 'chaves-dos-jogos';


    public ?array $data = [];
    public ?GamesKey $setting;

    /**
     * @return void
     */
    public function mount(): void
    {
        $gamesKey = GamesKey::first();
        if(!empty($gamesKey)) {
            $this->setting = $gamesKey;
            $this->form->fill($this->setting->toArray());
        }else{
            $this->form->fill();
        }
    }

    /**
     * @param Form $form
     * @return Form
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Slotegrator API')
                    ->description(__('admin.Credential_Slotegrator'))
                    ->schema([
                        TextInput::make('merchant_url')
                            ->label('Merchant URL')
                            ->placeholder(__('admin.API_URL'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                        TextInput::make('merchant_id')
                            ->label('Merchant ID')
                            ->placeholder(__('admin.Merchant_ID'))
                            ->maxLength(191),
                        TextInput::make('merchant_key')
                            ->placeholder(__('admin.Merchant_Key'))
                            ->label('Merchant Key')
                            ->maxLength(191),
                    ])
                    ->columns(2),

                Section::make('Fivers API')
                    ->description(__('admin.Credential_Fivers'))
                    ->schema([
                        TextInput::make('agent_code')
                            ->label('Agent Code')
                            ->placeholder(__('admin.Agent_Code'))
                            ->maxLength(191),
                        TextInput::make('agent_token')
                            ->label('Agent Token')
                            ->placeholder(__('admin.Agent_Token'))
                            ->maxLength(191),
                        TextInput::make('agent_secret_key')
                            ->label('Agent Secret Key')
                            ->placeholder(__('admin.Agent_Secret'))
                            ->maxLength(191),
                        TextInput::make('api_endpoint')
                            ->label('Api Endpoint')
                            ->placeholder(__('admin.Endpoint_API'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Section::make('Salsa API')
                    ->description(__('admin.Credential_Salsa'))
                    ->schema([
                        TextInput::make('salsa_base_uri')
                            ->label('Salsa URI')
                            ->placeholder(__('admin.Salsa_URL_Base'))
                            ->maxLength(191),
                        TextInput::make('salsa_pn')
                            ->label('Salsa PN')
                            ->placeholder(__('admin.PN'))
                            ->maxLength(191),
                        TextInput::make('salsa_key')
                            ->label('Salsa Key')
                            ->placeholder(__('admin.Salsa_Key'))
                            ->maxLength(191),
                    ])
                    ->columns(3),

                Section::make('Vibra Casino API')
                    ->description(__('admin.Credential_Vibra'))
                    ->schema([
                        TextInput::make('vibra_site_id')
                            ->label('Vibra Site ID')
                            ->placeholder(__('admin.Vibra_ID'))
                            ->maxLength(191),
                        TextInput::make('vibra_game_mode')
                            ->label('Vibra Game Mode')
                            ->placeholder(__('admin.Vibra_Game'))
                            ->maxLength(191),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }


    /**
     * @return void
     */
    public function submit(): void
    {
        try {
            if(env('APP_DEMO')) {
                Notification::make()
                    ->title(__('admin.Attention'))
                    ->body(__('admin.cannot_demo_version'))
                    ->danger()
                    ->send();
                return;
            }

            $setting = GamesKey::first();
            if(!empty($setting)) {
                if($setting->update($this->data)) {
                    Notification::make()
                        ->title(__('admin.Changed_Keys'))
                        ->body(__('admin.keys_changed_successfully'))
                        ->success()
                        ->send();
                }
            }else{
                if(GamesKey::create($this->data)) {
                    Notification::make()
                        ->title(__('admin.Keys_Created'))
                        ->body(__('admin.keys_created_successfully'))
                        ->success()
                        ->send();
                }
            }


        } catch (Halt $exception) {
            Notification::make()
                ->title(__('admin.Error_data!'))
                ->body(__('admin.Error_data!'))
                ->danger()
                ->send();
        }
    }
}
