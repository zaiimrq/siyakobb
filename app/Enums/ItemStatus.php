<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ItemStatus: string implements HasColor, HasLabel
{
    // case BAIK = 'baik';
    // case RUSAK = 'rusak';
    // case SEBAGIAN = 'baik / sebagian rusak';
    case BAIK = 'BAIK';
    case RUSAK = 'RUSAK';
    case SEBAGIAN = 'BAIK / SEBAGIAN RUSAK';

    public function getLabel(): string
    {
        return match ($this) {
            self::BAIK => 'BAIK',
            self::RUSAK => 'RUSAK',
            self::SEBAGIAN => 'BAIK / SEBAGIAN RUSAK',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::BAIK => 'success',
            self::RUSAK => 'danger',
            self::SEBAGIAN => 'warning',
        };
    }
}
