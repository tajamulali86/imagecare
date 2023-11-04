<?php

namespace App\Filament\Resources\AgentTypeResource\Pages;

use App\Filament\Resources\AgentTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgentTypes extends ListRecords
{
    protected static string $resource = AgentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
