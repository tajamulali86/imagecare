<?php

namespace App\Filament\Resources\AgentTypeResource\Pages;

use App\Filament\Resources\AgentTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgentType extends EditRecord
{
    protected static string $resource = AgentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
