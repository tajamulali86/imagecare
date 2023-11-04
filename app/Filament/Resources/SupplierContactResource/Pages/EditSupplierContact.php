<?php

namespace App\Filament\Resources\SupplierContactResource\Pages;

use App\Filament\Resources\SupplierContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplierContact extends EditRecord
{
    protected static string $resource = SupplierContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
