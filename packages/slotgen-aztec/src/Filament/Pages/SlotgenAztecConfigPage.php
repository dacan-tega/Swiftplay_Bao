<?php

namespace Slotgen\SlotgenAztec\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Slotgen\SlotgenAztec\Models\SlotgenAztecConfig;
use Slotgen\SlotgenAztec\Models\SlotgenGame;
use Yepsua\Filament\Forms\Components\RangeSlider;
use ZipArchive;

class SlotgenAztecConfigPage extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'slotgen-aztec::filament.pages.config-page';

    public ?array $data = [];

    public SlotgenAztecConfig $setting;

    public function mount(): void
    {
        $rtpConfig = SlotgenAztecConfig::first();
        if (!empty($rtpConfig)) {
            $this->setting = $rtpConfig;
            $this->form->fill($this->setting->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('RTP')
                    ->description('Config RTP')
                    ->schema([
                        RangeSlider::make('win_ratio')
                            ->label('Normal Win Ratio')
                            ->steps([
                                0 => '0',
                                25 => '25',
                                50 => '50',
                                75 => '75',
                                100 => '100',
                            ])->step(1),
                        RangeSlider::make('feature_ratio')
                            ->label('Access FreeSpin Ratio')
                            ->steps([
                                0 => '0',
                                25 => '25',
                                50 => '50',
                                75 => '75',
                                100 => '100',
                            ])->step(1),
                        RangeSlider::make('feature_winvalue')
                            ->label('Share Free Spin')
                            ->steps([
                                0 => '0',
                                25 => '25',
                                50 => '50',
                                75 => '75',
                                100 => '100',
                            ])->step(1),
                        RangeSlider::make('system_rtp')
                            ->label('RTP Value')
                            ->steps([
                                0 => '0',
                                25 => '25',
                                50 => '50',
                                75 => '75',
                                100 => '100',
                            ])->step(1),
                        TextInput::make('sign_feature_spin')
                            ->label('SIGN FEATURE SPIN')
                            ->placeholder('SIGN FEATURE SPIN')
                            ->maxLength(191),
                        TextInput::make('sign_feature_credit')
                            ->label('SIGN FEATURE CREDIT')
                            ->placeholder('SIGN FEATURE CREDIT')
                            ->maxLength(191),
                            TextInput::make('jackpot_value')
                            ->label('Jackpot Value')
                            ->placeholder('Jackpot Value')
                            ->maxLength(191),
                        TextInput::make('jackpot_win_ratio')
                            ->label('Jackpot Win Ratio')
                            ->placeholder('Jackpot Win Ratio')
                            ->maxLength(191),
                        TextInput::make('jackpot_return_value_ratio')
                            ->label('Jackpot Return Value Ratio')
                            ->placeholder('Jackpot Return Value Ratio')
                            ->maxLength(191),
                        TextInput::make('sign_bonus')
                            ->label('SIGNUP BONUS')
                            ->placeholder('SIGNUP BONUS')
                            ->maxLength(191),
                        Toggle::make('use_rtp')->dehydrated(false),
                        TextInput::make('max_bet')
                            ->label('Max Bet')
                            ->placeholder('Max Bet')
                            ->maxLength(191),
                        TextInput::make('bet_size')
                            ->label('Bet Size')
                            ->placeholder('Bet Size')
                            ->maxLength(191),
                        TextInput::make('bet_level')
                            ->label('Bet Level')
                            ->placeholder('Bet Level')
                            ->maxLength(191),
                        TextInput::make('base_bet')
                            ->label('Base Bet')
                            ->placeholder('Base Bet')
                            ->maxLength(191),
                    ])->columns(2),
                FileUpload::make('attachmentEn')
                    ->label('Upload File EN'),
                FileUpload::make('attachmentEs')
                    ->label('Upload File Es'),

            ])
            ->statePath('data');
    }

    private function uploadFile($array)
    {
        if (!empty($array) && is_array($array) || !empty($array) && is_object($array)) {
            foreach ($array as $k => $temporaryFile) {
                if ($temporaryFile instanceof TemporaryUploadedFile) {
                    $path = \Helper::upload($temporaryFile);
                    if ($path) {
                        // dd($path);
                        return $path['path'];
                    }
                } else {
                    return $temporaryFile;
                }
            }
        }
    }

    public function submit(): void
    {
        $folder = null;
        $name = null;
        $fileNameEn = isset($this->data['attachmentEn']) ? $this->data['attachmentEn'] : "";
        $fileNameEs = isset($this->data['attachmentEs']) ? $this->data['attachmentEs'] : "";
        if ($fileNameEn) {
            $this->extractFile($fileNameEn, "en");
        }
        if ($fileNameEs) {
            $this->extractFile($fileNameEs, "es");
        }
        try {
            // dd($this->data);
            $setting = SlotgenAztecConfig::first();
            if (!empty($setting)) {
                if ($setting->update($this->data)) {
                    Notification::make()
                        ->title('Setting change')
                        ->body('Your setting have been changed successfully!')
                        ->success()
                        ->send();
                }
            } else {
                // dd($this->data);
                if (SlotgenAztecConfig::create($this->data)) {
                    Notification::make()
                        ->title('Setting add')
                        ->body('Your setting already added')
                        ->success()
                        ->send();
                }
            }
        } catch (Halt $exception) {
            Notification::make()
                ->title('Error changing data')
                ->body('Error changing data')
                ->danger()
                ->send();
        }
    }

    public function extractFile($fileName, $language = "en")
    {
        if (is_array($fileName) || is_object($fileName)) {
            if (!empty($fileName)) {
                $folder = $this->uploadFile($fileName);
                // dd(($folder));
                $folderArr = explode('/', $folder);
                $fileZip = explode('.', $folderArr[count($folderArr) - 1]);
                $name = $fileZip[0];
                $this->data['game_name'] = $name;
                $bb[] = $name;

                $gameFolder = storage_path('app/public/' . $folder);
            }
        }
        // $this->data['game_name'] = $bb;
        if ($folder != null) {
            // $slotgen = new SlotgenGame;
            // $data = [
            //     'game_name'        => $name,
            //     'game_class'     => "Slotgen\\SlotgenAztec\\SlotgenAztec",
            // ];
            // $slotgen->fill($data);
            // $slotgen->save();
            $gamePrivateFolder = storage_path('app/private/aztec');
            $localtionStorage = 'app/private/aztec';
            $locationStorageArr = strpos($localtionStorage, '/') !== false ? preg_split("/[\/]+/", $localtionStorage) : [$localtionStorage];
            $storagePath = storage_path();
            if (!File::exists($gamePrivateFolder)) {
                foreach ($locationStorageArr as $folder) {
                    $storagePath = $storagePath . '/' . $folder;
                    if (!file_exists($storagePath)) {
                        if (!mkdir($storagePath, 0777)) {
                            // return response()->json([
                            //     'status' => 'FAILED',
                            //     'message' => 'Can not create new folder!',
                            // ]);
                        }
                    }
                }
                if (!File::exists($gamePrivateFolder)) {
                    File::makeDirectory($gamePrivateFolder, 0777);
                }
            }
            $configGameFolder = __DIR__ . '/../../../resources/private';
            $time = time();
            $gameName = 'aztec' . '-' . $time;



            $locationPub = 'uploads/games/' . $language . '/' . $gameName;
            $locationPubArr = strpos($locationPub, '/') !== false ? preg_split("/[\/]+/", $locationPub) : [$locationPub];
            $publicPath = public_path();
            if (!File::exists($locationPub)) {
                foreach ($locationPubArr as $folder) {
                    $publicPath = $publicPath . '/' . $folder;
                    if (!file_exists($publicPath)) {
                        if (!mkdir($publicPath, 0777)) {
                            // return response()->json([
                            //     'status' => 'FAILED',
                            //     'message' => 'Can not create new folder!',
                            // ]);
                        }
                    }
                }
                // if (! File::exists($gamePrivateFolder)) {
                //     File::makeDirectory($gamePrivateFolder, 0777);
                // }
            }

            $gamePublicFolder = public_path('uploads/games/' . $language . '/' . $gameName);
            $symbolPublicFolder = $gamePublicFolder . '/symbols';
            $symbolGameFolder = __DIR__ . '/../../../resources/symbols';
            if (!File::exists($symbolPublicFolder)) {
                File::makeDirectory($symbolPublicFolder, 0777);
                File::copyDirectory($symbolGameFolder, $symbolPublicFolder);
            }

            if (File::exists($gamePrivateFolder)) {
                File::deleteDirectory($gamePrivateFolder);
            }
            File::copyDirectory($configGameFolder, $gamePrivateFolder);

            $gameFile = $gamePrivateFolder . '/ncashgame.json';
            $game_file = File::get($gameFile);
            $game = (object) json_decode($game_file);
            $game->game_folder = $gameName;
            File::put($gameFile, json_encode($game));

            $gamePublicFolder = public_path('uploads/games/' . $language . '/' . $gameName);
            $zip = new ZipArchive();
            // dd($gameFolder);
            $zip->open($gameFolder);
            $zip->extractTo("$gamePublicFolder");
            $zip->close();
            $api_url = route('api.aztec.v1.root');
            $playerDataFile = $locationPub . '/data.json';
            $player = File::get($playerDataFile);
            $game_file = File::get($gamePrivateFolder . '/ncashgame.json');
            $gameData = (object) json_decode($game_file, true);
            $newPlayerData = str_replace($gameData->api_orgi, $api_url, $player);
            File::replace($playerDataFile, $newPlayerData);
            //File::copy(__DIR__ . '/../../../resources/games/aztec-logo.png', $gamePublicFolder . '/aztec-logo.png');
        } 
    }
}
