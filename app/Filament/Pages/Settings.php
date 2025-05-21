<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Forms\Components\Actions\Action;


class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.settings';

    protected static ?string $navigationLabel = 'Configurações';

    protected static ?string $modelLabel = 'Configurações';

    protected static ?string $title = 'Settings';

    protected static ?string $slug = 'configuracoes';

    public ?array $data = [];
    public Setting $setting;

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->setting = Setting::first();
        $this->form->fill($this->setting->toArray());
    }

    /**
     * @param Form $form
     * @return Form
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('admin.Website_Details'))
                    ->schema([
                        TextInput::make('software_name')
                            ->label(__('admin.Name'))
                            ->required()
                            ->maxLength(191),
                        TextInput::make('software_description')
                            ->label(__('admin.Description'))
                            ->maxLength(191),
                            Select::make('language')
                            ->label('language')
                            ->options([
                                "en" => "en",
                                "pt" => "pt"
                            ]),
                    ])->columns(3),
                Section::make('Logos')
                    ->schema([
                        FileUpload::make('software_favicon')
                            ->label('Favicon')
                            ->placeholder(__('admin.Upload_favicon'))
                            ->image(),
                        FileUpload::make('software_logo_white')
                            ->label(__('admin.White_Logo'))
                            ->placeholder(__('admin.Upload_white_logo'))
                            ->image(),
                        FileUpload::make('software_logo_black')
                            ->label(__('admin.Dark_Logo'))
                            ->placeholder(__('admin.Upload_dark_logo'))
                            ->image(),
                    ])->columns(3),
                Section::make(__('admin.Deposits_Withdrawals'))
                    ->schema([
                        TextInput::make('min_deposit')
                            ->label(__('admin.Min_Deposit'))
                            ->numeric()
                            ->maxLength(191),
                        TextInput::make('max_deposit')
                            ->label(__('admin.Max_Deposit'))
                            ->numeric()
                            ->maxLength(191),
                        TextInput::make('min_withdrawal')
                            ->label(__('admin.Min_Withdrawal'))
                            ->numeric()
                            ->maxLength(191),
                        TextInput::make('max_withdrawal')
                            ->label(__('admin.Max_Withdrawal'))
                            ->numeric()
                            ->maxLength(191),
                    ])->columns(4),
                Section::make(__('admin.Fees'))
                    ->description(__('admin.Platform_Settings'))
                    ->schema([
                        Select::make('active_gateway')->options([
                            'bspay' => 'Bspay',
                            'suitpay' => 'Suitpay',
                        ]),
                        TextInput::make('revshare_percentage')
                            ->label('RevShare (%)')
                            ->numeric()
                            ->suffix('%')
                            ->maxLength(191),
                        TextInput::make('ngr_percent')
                            ->label('NGR (%)')
                            ->numeric()
                            ->suffix('%')
                            ->maxLength(191),
                    ])->columns(3),
                Section::make(__('admin.General_data'))
                    ->schema([
                        TextInput::make('initial_bonus')
                            ->label(__('admin.Initial_Bonus'))
                            ->numeric()
                            ->suffix('%')
                            ->maxLength(191),
                        TextInput::make('currency_code')
                            ->label(__('admin.Coin'))
                            ->maxLength(191),
                        Select::make('decimal_format')->options([
                            'dot' => 'Dot',
                            'dot' => 'Dot'
                        ]),
                        Select::make('currency_position')->options([
                            'left' => 'Left',
                            'right' => 'Right',
                        ]),
                    ])->columns(4),

                Section::make(__('admin.Social_media'))
                    ->description(__('admin.social_media_URL'))
                    ->schema([
                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->placeholder(__('admin.Instagram_URL'))
                            ->maxLength(191),
                        TextInput::make('discord')
                            ->placeholder(__('admin.Discord_URL'))
                            ->label('Discord')
                            ->maxLength(191),
                        TextInput::make('telegram')
                            ->placeholder(__('admin.Telegram_URL'))
                            ->label('Telegram')
                            ->maxLength(191),
                        TextInput::make('twitter')
                            ->placeholder(__('admin.Twitter_URL'))
                            ->label('Twitter')
                            ->maxLength(191),
                        TextInput::make('tiktok')
                            ->placeholder(__('admin.Tiktok_URL'))
                            ->label('Tiktok')
                            ->maxLength(191),
                        TextInput::make('what\'s app')
                            ->placeholder(__('admin.Whatsapp_URL'))
                            ->label('What\'s app')
                            ->maxLength(191),
                    ])->columns(2),
            ])
            ->statePath('data');
    }


    /**
     * @param array $data
     * @return array
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        return $data;
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Submit'))
                ->action(fn () => $this->submit())
                ->submit('submit')
            //->url(route('filament.admin.pages.dashboard'))
            ,
        ];
    }

    /**
     * @param $array
     * @return mixed|void
     */
    private function uploadFile($array)
    {
        if (!empty($array) && is_array($array) || !empty($array) && is_object($array)) {
            foreach ($array as $k => $temporaryFile) {
                if ($temporaryFile instanceof TemporaryUploadedFile) {
                    $path = \Helper::upload($temporaryFile);
                    if ($path) {
                        return $path['path'];
                    }
                } else {
                    return $temporaryFile;
                }
            }
        }
    }


    /**
     * @return void
     */
    public function submit(): void
    {
        try {
            if (env('APP_DEMO')) {
                Notification::make()
                    ->title(__('admin.Attention'))
                    ->body(__('admin.cannot_demo_version'))
                    ->danger()
                    ->send();
                return;
            }

            $setting = Setting::first();
            if (!empty($setting)) {

                $favicon   = $this->data['software_favicon'];
                $logoWhite = $this->data['software_logo_white'];
                $logoBlack = $this->data['software_logo_black'];

                if (is_array($favicon) || is_object($favicon)) {
                    if (!empty($favicon)) {
                        $this->data['software_favicon'] = $this->uploadFile($favicon);
                    }
                }

                if (is_array($logoWhite) || is_object($logoWhite)) {
                    if (!empty($logoWhite)) {
                        $this->data['software_logo_white'] = $this->uploadFile($logoWhite);
                    }
                }

                if (is_array($logoBlack) || is_object($logoBlack)) {
                    if (!empty($logoBlack)) {
                        $this->data['software_logo_black'] = $this->uploadFile($logoBlack);
                    }
                }

                if (!empty($this->data['software_smtp_type'])) {
                    $envs = DotenvEditor::load(base_path('.env'));

                    $envs->setKeys([
                        'MAIL_MAILER' => $this->data['software_smtp_type'],
                        'MAIL_HOST' => $this->data['software_smtp_mail_host'],
                        'MAIL_PORT' => $this->data['software_smtp_mail_port'],
                        'MAIL_USERNAME' => $this->data['software_smtp_mail_username'],
                        'MAIL_PASSWORD' => $this->data['software_smtp_mail_password'],
                        'MAIL_ENCRYPTION' => $this->data['software_smtp_mail_encryption'],
                        'MAIL_FROM_ADDRESS' => $this->data['software_smtp_mail_from_address'],
                        'MAIL_FROM_NAME' => $this->data['software_smtp_mail_from_name'],
                    ]);

                    $envs->save();
                }

                // dd($setting);
                if ($setting->update($this->data)) {

                    Cache::put('setting', $setting);

                    Notification::make()
                        ->title(__('admin.Changed_data'))
                        ->body(__('admin.Successfully_data!'))
                        ->success()
                        ->send();

                    redirect(route('filament.admin.pages.dashboard'));
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
