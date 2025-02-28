<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jenis_tindak_pidana')
                    ->required(),
                Forms\Components\TextInput::make('nomor_register')
                    ->required(),
                Forms\Components\TextInput::make('tanggal_register')
                    ->required(),
                Forms\Components\Textarea::make('jenis')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('golongan')
                    ->required(),
                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('gudang')
                    ->required(),
                Forms\Components\TextInput::make('tersangka')
                    ->required(),
                Forms\Components\TextInput::make('nilai_perkiraan_awal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kondisi_awal')
                    ->required(),
                Forms\Components\TextInput::make('status_tingkat_pemeriksaan')
                    ->required(),
                Forms\Components\TextInput::make('jaksa_penitip')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_tindak_pidana')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_register')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_register')
                    ->searchable(),
                Tables\Columns\TextColumn::make('golongan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gudang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tersangka')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai_perkiraan_awal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kondisi_awal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_tingkat_pemeriksaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jaksa_penitip')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
