<?php

namespace App\Filament\Resources\AboutPages\Pages;

use App\Filament\Resources\AboutPages\AboutPageResource;
use Filament\Resources\Pages\EditRecord;

class EditAboutPage extends EditRecord
{
    protected static string $resource = AboutPageResource::class;

    protected static ?string $title = 'تعديل صفحة عن المجموعة';

    public function mount(int|string $record = null): void
    {
        if ($record === null) {
            $aboutPage = \App\Models\AboutPage::getCurrent();
            $this->record = $aboutPage->getKey();
        } else {
            $this->record = $record;
        }
        
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

    protected function getHeaderActions(): array
    {
        return [];
    }
}
