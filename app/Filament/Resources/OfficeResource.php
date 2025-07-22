<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfficeResource\Pages;
use App\Models\Office;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class OfficeResource extends Resource
{
    protected static ?string $model = Office::class;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Office';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('leader_name'),
                        Forms\Components\TextInput::make('nip')
                            ->integer(),
                        Forms\Components\TextInput::make('email')
                            ->email(),
                        Forms\Components\TextInput::make('phone')
                            ->tel(),
                        Forms\Components\TextInput::make('address')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('signature_head')
                            ->disableAllToolbarButtons()
                            ->label('Header TTD'),
                        RichEditor::make('kop_name')
                            ->disableAllToolbarButtons(),
                        Forms\Components\FileUpload::make('logo')
                            ->columnSpanFull()
                            ->directory('offices')
                            ->image()
                            ->imageEditor(),
                    ]),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\CreateOffice::route('/'),
            'edit' => Pages\EditOffice::route('/{record}/edit'),
        ];
    }
}
