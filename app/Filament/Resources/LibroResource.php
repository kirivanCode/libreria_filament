<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LibroResource\Pages;
use App\Models\Libro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LibroResource extends Resource
{
    protected static ?string $model = Libro::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('autor_id')
                ->relationship('autor', 'nombres')
                ->required()  // Asegura que este campo sea requerido
                ->searchable()
                ->preload(),
            Forms\Components\Select::make('editorials_id') // Asegúrate de que el nombre sea correcto
                ->relationship('editorial', 'nombre')
                ->required()  // Hacerlo requerido
                ->searchable()
                ->preload(),
            Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->searchable(),
            Tables\Columns\TextColumn::make('autor.nombres')
                ->label('Autor')
                ->sortable(),
            Tables\Columns\TextColumn::make('editorial.nombre')
                ->label('Editorial')
                ->sortable(),
            Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLibros::route('/'),
            'create' => Pages\CreateLibro::route('/create'),
            'edit' => Pages\EditLibro::route('/{record}/edit'),
        ];
    }
}
