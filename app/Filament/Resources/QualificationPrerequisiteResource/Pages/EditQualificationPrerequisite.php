<?php

namespace App\Filament\Resources\QualificationPrerequisiteResource\Pages;

use App\Filament\Resources\QualificationPrerequisiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQualificationPrerequisite extends EditRecord
{
    protected static string $resource = QualificationPrerequisiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
