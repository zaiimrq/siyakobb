<?php

namespace App\Filament\Resources\OfficeResource\Pages;

use App\Filament\Resources\OfficeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOffice extends CreateRecord
{
    protected static string $resource = OfficeResource::class;
    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $this->record = static::$resource::getModel()::first() ?? null;

        if ($this->record) {
            $this->redirectRoute('filament.admin.resources.offices.edit', $this->record->getKey());
        }

        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();
    }
}
