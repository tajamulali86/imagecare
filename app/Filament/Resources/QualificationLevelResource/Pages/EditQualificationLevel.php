<?php

namespace App\Filament\Resources\QualificationLevelResource\Pages;

use App\Filament\Resources\QualificationLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQualificationLevel extends EditRecord
{
    protected static string $resource = QualificationLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
