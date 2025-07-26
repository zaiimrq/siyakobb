<?php

namespace App\Filament\Resources;

use App\Enums\ExecutionStatus;
use App\Filament\Resources\ItemResource\Pages;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DateTimePicker::make('lelang_at')
                    ->label('Tanggal Lelang')
                    ->default(now()->addMonth(6))
                    ->minDate(now())
                    ->native(false)
                    ->required()
                    ->columnSpanFull(),
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nomor_register')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_register')
                            ->default(now())
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
                        Forms\Components\Select::make('category_id')
                            ->label('Golongan')
                            ->native(false)
                            ->options(
                                \App\Models\Category::pluck('name', 'id')
                            )
                            ->required(),
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
                            ->image(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('tersangka')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_tindak_pidana')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Golongan')
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
                SelectFilter::make('kondisi_awal')
                    ->placeholder('Pilih kondisi')
                    ->options(\App\Enums\ItemStatus::class)
                    ->native(false)
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('eksekusi')
                        ->label('Eksekusi')
                        ->icon('heroicon-o-check-circle')
                        ->color('primary')
                        ->form([
                            Forms\Components\Select::make('eksekusi')
                                ->label('Eksekusi')
                                ->options(ExecutionStatus::class)
                                ->native(false)
                                ->searchable()
                                ->required(),
                        ])
                        ->action(function (Item $record, array $data) {
                            $record->update([
                                'eksekusi' => $data['eksekusi'],
                            ]);

                            return Notification::make()
                                ->title('Eksekusi Berhasil')
                                ->success()
                                ->body('Status eksekusi item telah diperbarui.')
                                ->send();
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Eksekusi Item')
                        ->modalDescription('Pilih status eksekusi untuk item ini.'),
                ]),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->deferLoading();
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

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->where('eksekusi', null);
    }
}
