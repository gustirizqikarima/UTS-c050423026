<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WilayahResource\Pages;
use App\Filament\Resources\WilayahResource\RelationManagers;
use App\Models\Wilayah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class WilayahResource extends Resource
{
    protected static ?string $model = Wilayah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Wilayah';
    
    protected static ?string $pluralLabel = 'Wilayah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_wilayah')
                    ->required()
                    ->label('Nama Wilayah'),
                  
                
                Forms\Components\TextInput::make('latitude')
                    ->nullable()
                    ->label('Latitude')
                    ->numeric(),
                    
                
                Forms\Components\TextInput::make('longitude')
                    ->nullable()
                    ->label('Longitude')
                    ->numeric(),
                  
                
                Forms\Components\TextInput::make('populasi')
                    ->nullable()
                    ->label('Populasi')
                    ->numeric(),
                
                Forms\Components\TextInput::make('luas_area')
                    ->nullable()
                    ->label('Luas Area (km²)')
                    ->numeric(),
                   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_wilayah')->label('ID'),
                Tables\Columns\TextColumn::make('nama_wilayah')->label('Nama Wilayah'),
                Tables\Columns\TextColumn::make('latitude')->label('Latitude'),
                Tables\Columns\TextColumn::make('longitude')->label('Longitude'),
                Tables\Columns\TextColumn::make('populasi')->label('Populasi'),
                Tables\Columns\TextColumn::make('luas_area')->label('Luas Area (km²)'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Diperbarui')->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWilayahs::route('/'),
            'create' => Pages\CreateWilayah::route('/create'),
            'edit' => Pages\EditWilayah::route('/{record}/edit'),
        ];
    }
}