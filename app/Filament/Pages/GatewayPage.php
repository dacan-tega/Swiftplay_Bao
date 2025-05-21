<?php

namespace App\Filament\Pages;

use App\Models\Gateway;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class GatewayPage extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.gateway-page';

    protected static ?string $navigationLabel = 'Gateway de Pagamento';

    protected static ?string $title = 'Payment Gateway';

    public ?array $data = [];
    public Gateway $setting;

    /**
     * @return void
     */
    public function mount(): void
    {
        $gateway = Gateway::first();
        if(!empty($gateway)) {
            $this->setting = $gateway;
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
                Section::make('BsPay')
                    ->description(__('admin.Credential_BsPay'))
                    ->schema([
                        TextInput::make('bspay_uri')
                            ->label('BsPay URI')
                            ->placeholder(__('admin.API_url1'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                        TextInput::make('bspay_cliente_id')
                            ->label('Client ID')
                            ->placeholder(__('admin.client_id'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                        TextInput::make('bspay_cliente_secret')
                            ->label('Client Secret')
                            ->placeholder(__('admin.secret_key'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                    ]),
                Section::make('Suitpay')
                    ->description(__('admin.Credential_Suitpay'))
                    ->schema([
                        TextInput::make('suitpay_uri')
                            ->label('Client URI')
                            ->placeholder(__('admin.API_url1'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                        TextInput::make('suitpay_cliente_id')
                            ->label('Client ID')
                            ->placeholder(__('admin.client_id'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                        TextInput::make('suitpay_cliente_secret')
                            ->label('Client Secret')
                            ->placeholder(__('admin.client_secret'))
                            ->maxLength(191)
                            ->columnSpanFull(),
                    ]),
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

            $setting = Gateway::first();
            if(!empty($setting)) {
                if($setting->update($this->data)) {
                    if(!empty($this->data['stripe_public_key'])) {
                        $envs = DotenvEditor::load(base_path('.env'));

                        $envs->setKeys([
                            'STRIPE_KEY' => $this->data['stripe_public_key'],
                            'STRIPE_SECRET' => $this->data['stripe_secret_key'],
                            'STRIPE_WEBHOOK_SECRET' => $this->data['stripe_webhook_key'],
                        ]);

                        $envs->save();
                    }

                    Notification::make()
                        ->title(__('admin.Changed_Keys'))
                        ->body(__('admin.keys_changed_successfully'))
                        ->success()
                        ->send();
                }
            }else{
                if(Gateway::create($this->data)) {
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
