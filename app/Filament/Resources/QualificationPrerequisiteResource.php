<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QualificationPrerequisiteResource\Pages;
use App\Filament\Resources\QualificationPrerequisiteResource\RelationManagers;
use App\Models\QualificationPrerequisite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QualificationPrerequisiteResource extends Resource
{
    protected static ?string $model = QualificationPrerequisite::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQualificationPrerequisites::route('/'),
            'create' => Pages\CreateQualificationPrerequisite::route('/create'),
            'edit' => Pages\EditQualificationPrerequisite::route('/{record}/edit'),
        ];
    }    
}
