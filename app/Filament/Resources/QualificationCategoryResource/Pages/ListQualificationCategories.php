<?php

namespace App\Filament\Resources\QualificationCategoryResource\Pages;

use App\Filament\Resources\QualificationCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQualificationCategories extends ListRecords
{
    protected static string $resource = QualificationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
