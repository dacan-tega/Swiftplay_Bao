<?php

namespace App\Filament\Pages;

use App\Livewire\LatestPixPayments;
use App\Models\SuitPayPayment;
use App\Models\User;
use App\Traits\Gateways\SuitpayTrait;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SuitPayPaymentPage extends Page
{
    use SuitpayTrait;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string $view = 'filament.pages.suit-pay-payment-page';

    protected static ?string $navigationLabel = 'SuitPay Pagamentos';

    protected static ?string $modelLabel = 'SuitPay Pagamentos';

    protected static ?string $title = 'SuitPay Payments';

    protected static ?string $slug = 'suitpay-pagamentos';

    public ?array $data = [];
    public SuitPayPayment $suitPayPayment;

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * @param Form $form
     * @return Form
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('admin.Payment_Details'))
                    ->schema([
                        Select::make('user_id')
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
                        TextInput::make('pix_key')
                            ->label(__('admin.Pix_Key'))
                            ->placeholder(__('admin.Enter_Pix_key'))
                            ->required(),
                        Select::make('pix_type')
                            ->label(__('admin.Key_Type'))
                            ->placeholder(__('admin.Select_key_type'))
                            ->options([
                                'document' => __('admin.document'),
                                'phoneNumber' => __('admin.phoneNumber'),
                                'randomKey' => __('admin.randomKey'),
                                'paymentCode' => __('admin.paymentCode'),
                            ]),
                        TextInput::make('amount')
                            ->label(__('admin.Value'))
                            ->placeholder(__('admin.Enter_value'))
                            ->required()
                            ->numeric(),
                        Textarea::make('observation')
                            ->label(__('admin.Observation'))
                            ->placeholder(__('admin.Leave_comment'))
                            ->rows(5)
                            ->cols(10)
                            ->columnSpanFull()
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    /**
     * @return void
     */
    public function submit(): void
    {
        if(env('APP_DEMO')) {
            Notification::make()
                ->title(__('admin.Attention'))
                ->body(__('admin.cannot_demo_version'))
                ->danger()
                ->send();
            return;
        }


        $suitpayment = SuitPayPayment::create([
            'user_id'       => $this->data['user_id'],
            'pix_key'       => $this->data['pix_key'],
            'pix_type'      => $this->data['pix_type'],
            'amount'        => $this->data['amount'],
            'observation'   => $this->data['observation'],
        ]);

        if($suitpayment) {
            $resp = self::pixCashOut([
                'pix_key' => $this->data['pix_key'],
                'pix_type' => $this->data['pix_type'],
                'amount' => $this->data['amount'],
                'payment_id' => $suitpayment->id
            ]);

            if($resp) {
                Notification::make()
                    ->title(__('admin.Requested_withdrawal'))
                    ->body(__('admin.Successfully_withdrawal'))
                    ->success()
                    ->send();
            }else{
                Notification::make()
                    ->title(__('admin.Withdrawal_error'))
                    ->body(__('admin.Error_ withdrawal'))
                    ->danger()
                    ->send();
            }
        }else{
            Notification::make()
                ->title(__('admin.Error_saving'))
                ->body(__('admin.Error_saving_withdrawal'))
                ->danger()
                ->send();
        }
    }

    /**
     * @return array|\Filament\Widgets\WidgetConfiguration[]|string[]
     */
    public function getFooterWidgets(): array
    {
        return [
            LatestPixPayments::class
        ];
    }
}
