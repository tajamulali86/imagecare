<?php

namespace App\Filament\Resources\QualificationLevelResource\Pages;

use App\Filament\Resources\QualificationLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQualificationLevels extends ListRecords
{
    protected static string $resource = QualificationLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
