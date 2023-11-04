<?php

namespace App\Filament\Resources\PriceListTargetResource\Pages;

use App\Filament\Resources\PriceListTargetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceListTarget extends EditRecord
{
    protected static string $resource = PriceListTargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
