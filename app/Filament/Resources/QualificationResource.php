<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QualificationResource\Pages;
use App\Filament\Resources\QualificationResource\RelationManagers;
use App\Models\Prerequisite;
use App\Models\Qualification;
use App\Models\QualificationCategory;
use App\Models\QualificationLevel;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QualificationResource extends Resource
{
    protected static ?string $model = Qualification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                    Forms\Components\Select::make('qualification_category_id')
                    ->label('Qualification Category')
                    ->relationship(name: 'categories', titleAttribute: 'name')
                        ->required()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)]),
                    Forms\Components\Select::make('qualification_level_id')
                    ->relationship(name: 'levels', titleAttribute: 'name')
                    ->label('Qualification Level')
                        ->required()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)]),
                    Forms\Components\Select::make('prerequisite_id')
                        ->label('Prereuisites')
                    ->relationship(name: 'prerequisites', titleAttribute: 'name')

                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)]),
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('code')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\Select::make('status')
                    ->options(['Current'=>'Current','Superseeded'=>'Superseeded'])
                        ->required(),
                        Forms\Components\Toggle::make('show_on_list')
                        ->required()
                        ->default(true),
                        Forms\Components\Textarea::make('comment')
                    ->maxLength(65535)
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title')
                ->searchable(),
            Tables\Columns\TextColumn::make('code')
                ->searchable(),
            Tables\Columns\ToggleColumn::make('show_on_list')
                ->searchable(),
            Tables\Columns\TextColumn::make('status')
                ->searchable(),
            Tables\Columns\TextColumn::make('categories.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('levels.name'),
            Tables\Columns\TextColumn::make('prerequisites.name')
                ->searchable(),
                Tables\Columns\TextColumn::make('comment'),

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
            'index' => Pages\ListQualifications::route('/'),
            'create' => Pages\CreateQualification::route('/create'),
            'edit' => Pages\EditQualification::route('/{record}/edit'),
        ];
    }
}
