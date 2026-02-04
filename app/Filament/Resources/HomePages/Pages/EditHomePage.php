<?php

namespace App\Filament\Resources\HomePages\Pages;

use App\Filament\Resources\HomePages\HomePageResource;
use Filament\Resources\Pages\EditRecord;

class EditHomePage extends EditRecord
{
    protected static string $resource = HomePageResource::class;

    protected static ?string $title = 'تعديل الصفحة الرئيسية';

    public function mount(int|string $record = null): void
    {
        $homePage = \App\Models\HomePage::getCurrent();
        $this->record = $homePage->getKey();
        
        parent::mount($this->record);
    }

    protected function getRedirectUrl(): string
    {
        return static::getUrl();
    }

    public function getBreadcrumbs(): array
    {
        return [
            static::getUrl() => static::getTitle(),
        ];
    }
}
