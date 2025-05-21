<?php

namespace App\Filament\Resources\FileUploadResource\Pages;

use App\Filament\Resources\FileUploadResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFileUpload extends CreateRecord
{
    protected static string $resource = FileUploadResource::class;
}
