<?php

namespace App\Filament\Resources\HomePages\Pages;

use App\Filament\Resources\HomePages\HomePageResource;
use App\Filament\Translatable\Actions\LocaleSwitcher;
use App\Filament\Translatable\Resources\Pages\EditRecord\Concerns\Translatable;
use Filament\Resources\Pages\EditRecord;

class EditHomePage extends EditRecord
{
    use Translatable;

    protected static string $resource = HomePageResource::class;

    protected static ?string $title = 'تعديل الصفحة الرئيسية';

    public function mount(int|string|null $record = null): void
    {
        if ($record === null) {
            $homePage = \App\Models\HomePage::getCurrent();
            $this->record = $homePage->getKey();
        } else {
            $this->record = $record;
        }

        parent::mount($this->record);
    }

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
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
