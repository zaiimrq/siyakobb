<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nomor_register')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_register')
                            ->maxDate(now())
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('jenis_tindak_pidana')
                            ->required(),
                        Forms\Components\TextInput::make('jenis')
                            ->required(),
                    ])->columns(2),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('jumlah')
                            ->required()
                            ->numeric()
                            ->default(1),
                        Forms\Components\TextInput::make('gudang')
                            ->required(),
                        Forms\Components\TextInput::make('tersangka')
                            ->required(),
                    ])->columns(2),

                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nilai_perkiraan_awal')
                            ->required()
                            ->numeric(),

                        Forms\Components\Select::make('kondisi_awal')
                            ->native(false)
                            ->options(\App\Enums\ItemStatus::class)
                            ->required(),
                        Forms\Components\TextInput::make('status_tingkat_pemeriksaan')
                            ->required(),
                        Forms\Components\TextInput::make('jaksa_penitip')
                            ->required(),
                    ])->columns(2),
                Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('tersangka')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_tindak_pidana')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gudang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kondisi_awal')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_tingkat_pemeriksaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jaksa_penitip')
                    ->searchable(),
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
