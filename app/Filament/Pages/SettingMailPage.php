<?php

namespace App\Filament\Pages;

use App\Models\SettingMail;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class SettingMailPage extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.setting-mail-page';

    public ?array $data = [];
    public SettingMail $setting;

    /**
     * @return void
     */
    public function mount(): void
    {
        $smtp = SettingMail::first();
        if(!empty($smtp)) {
            $this->setting = $smtp;
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
                Section::make('SMTP')
                    ->description(__('admin.Credential_SMTP'))
                    ->schema([
                        TextInput::make('software_smtp_type')
                            ->label('Mailer')
                            ->placeholder(__('admin.Enter_mailer'))
                            ->maxLength(191),
                        TextInput::make('software_smtp_mail_host')
                            ->label('Host')
                            ->placeholder(__('admin.Enter_host'))
                            ->maxLength(191),
                        TextInput::make('software_smtp_mail_port')
                            ->label('Porta')
                            ->placeholder(__('admin.Enter_port'))
                            ->maxLength(191),
                        TextInput::make('software_smtp_mail_username')
                            ->label(__('admin.User'))
                            ->placeholder(__('admin.Enter_user'))
                            ->maxLength(191),
                        TextInput::make('software_smtp_mail_password')
                            ->label(__('admin.Password'))
                            ->placeholder(__('admin.Type_password'))
                            ->maxLength(191),
                        TextInput::make('software_smtp_mail_encryption')
                            ->label(__('admin.Encryption'))
                            ->placeholder(__('admin.Enter_encryption'))
                            ->maxLength(191),
                        TextInput::make('software_smtp_mail_from_address')
                            ->label(__('admin.Email_Header'))
                            ->placeholder(__('admin.Enter_Header_Email'))
                            ->maxLength(191),
                        TextInput::make('software_smtp_mail_from_name')
                            ->label(__('admin.Name_Header'))
                            ->placeholder(__('admin.Enter_Header_name'))
                            ->maxLength(191)
                    ])->columns(4),
            ])
            ->statePath('data');
    }


    /**
     * @return void
     */
    public function submit(): void
    {
        dd($this->data);
        try {
            $setting = SettingMail::first();
            if(!empty($setting)) {
                if(!empty($this->data['software_smtp_type'])) {
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

                if($setting->update($this->data)) {
                    Notification::make()
                        ->title(__('admin.Changed_Keys'))
                        ->body(__('admin.keys_changed_successfully'))
                        ->success()
                        ->send();
                }
            }else{
                if(SettingMail::create($this->data)) {
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
