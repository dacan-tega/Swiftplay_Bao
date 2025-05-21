<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Support\Exceptions\Halt;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;

class ChangePasswordUser extends Page implements HasForms
{
    use HasPageSidebar, InteractsWithForms;

    public User $record;
    public ?array $data = [];


    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.change-password-user';

    protected static ?string $title = 'Change Password';

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
//    public function form(Form $form): Form
//    {
//        return $form
//            ->schema($this->getFormSchema())
//            ->statePath('data');
//    }

    public function save()
    {
        if(env('APP_DEMO')) {
            Notification::make()
                ->title(__('admin.Attention'))
                ->body(__('admin.cannot_demo_version'))
                ->danger()
                ->send();
            return;
        }

        try {
            $user = User::find($this->record->id);

            $user->update(['password' => $this->data['password']]);
            Notification::make()
                ->title(__('admin.Password_Changed'))
                ->body(__('admin.Password_successfully'))
                ->success()
                ->send();
        } catch (Halt $exception) {
            return;
        }
    }

    /**
     * @return array|\Filament\Forms\Components\Component[]
     */
    public function getFormSchema(): array
    {
        return [
            Section::make(__('admin.Change_your_password'))
                ->description(__('admin.change_new_password'))
                ->schema([
                   TextInput::make('password')
                        ->label(__('admin.Password'))
                        ->placeholder(__('admin.Type_password'))
                        ->password()
                        ->required()
                        ->maxLength(191),
                    TextInput::make('confirm_password')
                        ->label(__('admin.Confirm_Password'))
                        ->placeholder(__('admin.Confirm_your_password'))
                        ->password()
                        ->confirmed()
                        ->maxLength(191),
                ])
                ->columns(2)
                ->statePath('data')

        ];
    }
}
