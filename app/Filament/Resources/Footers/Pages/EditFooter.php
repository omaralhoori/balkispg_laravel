<?php

namespace App\Filament\Resources\Footers\Pages;

use App\Filament\Resources\Footers\FooterResource;
use Filament\Resources\Pages\EditRecord;

class EditFooter extends EditRecord
{
    protected static string $resource = FooterResource::class;

    protected static ?string $title = 'تعديل التذييل';

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

    public static function getUrl(array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?\Illuminate\Database\Eloquent\Model $tenant = null, bool $shouldGuessMissingParameters = false): string
    {
        if (empty($parameters['record'])) {
            $parameters['record'] = \App\Models\HomePage::getCurrent()->getKey();
        }

        return parent::getUrl($parameters, $isAbsolute, $panel, $tenant, $shouldGuessMissingParameters);
    }
}
