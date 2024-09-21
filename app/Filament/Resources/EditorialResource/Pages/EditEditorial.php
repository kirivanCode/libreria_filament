<?php

namespace App\Filament\Resources\EditorialResource\Pages;

use App\Filament\Resources\EditorialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEditorial extends EditRecord
{
    protected static string $resource = EditorialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
