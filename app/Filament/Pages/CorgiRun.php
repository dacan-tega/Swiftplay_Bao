<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CorgiRun extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.corgi-run';
    
    public $content;

    public function isContentUrl()
    {
        $this->content = "0";
        // check to see if the content is a url
        return filter_var($this->content, FILTER_VALIDATE_URL);
    }
}
