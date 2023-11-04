<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Qualification;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                    Forms\Components\Select::make('company_type_id')
                    ->label('Company Type')
                    ->relationship(name: 'companyType', titleAttribute: 'name')
                        ->required()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)]),
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
                Forms\Components\TextInput::make('company_abn')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rto_provider_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cricos_no')
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
                Forms\Components\DatePicker::make('added_date')
                    ->required(),
                    Forms\Components\Select::make('supplier_type_id')
                    ->label('Supplier Type')
                    ->relationship(name: 'supplierType', titleAttribute: 'name')
                        ->required()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)]),
                Forms\Components\Textarea::make('comment')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('show_on_list')
                    ->required()
                    ->default(1),
                    Forms\Components\Repeater::make('supplierPrices')
                    ->required()
                    ->relationship('supplierPrices')
                    ->label('Price List')
                     ->schema([

                        Forms\Components\Select::make('qualification_id')
                        ->label('Select Qualification')
                        ->options(Qualification::all()->pluck('title','id'))
                        ->searchable()
                        ->required(),
                        Forms\Components\TextInput::make('price')
                        ->required()
                        ->maxLength(255),
                     ])
                 ->columns(2),

        Forms\Components\Repeater::make('supplierContacts')
       ->relationship('supplierContacts')->label('Supplier Contacts')
        ->schema([

            Forms\Components\TextInput::make('name')
            ->required()
            ->maxLength(255),
            Forms\Components\TextInput::make('position')
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

        ])
    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_type_id')
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
                // Tables\Columns\TextColumn::make('supplier_contact_id')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_abn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rto_provider_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cricos_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_landline')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_fax')
                    ->searchable(),
                Tables\Columns\TextColumn::make('added_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier_price_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('show_on_list')
                    ->boolean(),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }

}

// Forms\Components\Select::make('supplier_contact_id')
// ->label('Supplier Contacts')
// ->relationship(name: 'supplierContacts', titleAttribute: 'name')
//     ->required()
//     ->createOptionForm([
//         Forms\Components\Select::make('supplier_id')
// ->relationship('supplier', 'name')
// ->required(),
// Forms\Components\TextInput::make('name')
// ->required()
// ->maxLength(255),
// Forms\Components\Textarea::make('address')
// ->required()
// ->maxLength(65535)
// ->columnSpanFull(),
// Forms\Components\TextInput::make('email')
// ->email()
// ->required()
// ->maxLength(255),
// Forms\Components\TextInput::make('number')
// ->required()
// ->maxLength(255),
// Forms\Components\TextInput::make('position')
// ->required()
// ->maxLength(255),
//         ]),
