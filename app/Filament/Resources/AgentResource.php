<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgentResource\Pages;
use App\Filament\Resources\AgentResource\RelationManagers;
use App\Models\Agent;
use App\Models\AgentContact;
use App\Models\AgentType;
use App\Models\CompanyType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_type_id')
                ->options(CompanyType::pluck('name','id'))
                    ->required(),
                Forms\Components\Select::make('agent_type_id')
                ->options(AgentType::pluck('name','id'))
                    ->required(),
                Forms\Components\Select::make('agent_contact_id')
                    ->options(AgentContact::pluck('name','id')),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('position')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rto_provider_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cricos_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_abn')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('company_address')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('company_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_landline')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_fax')
                    ->maxLength(255),
                Forms\Components\Textarea::make('comment')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('special_price')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('added_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('agent_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('agent_contact_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rto_provider_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cricos_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_abn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_landline')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_fax')
                    ->searchable(),
                Tables\Columns\TextColumn::make('special_price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('added_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAgents::route('/'),
            'create' => Pages\CreateAgent::route('/create'),
            'edit' => Pages\EditAgent::route('/{record}/edit'),
        ];
    }
}
