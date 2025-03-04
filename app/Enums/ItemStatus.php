<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ItemStatus: string implements HasLabel, HasColor
{
    case BAIK = "baik";
    case RUSAK = "rusak";
    case SEBAGIAN = "baik / sebagian rusak";

    public function getLabel(): string
    {
        return match ($this) {
            self::BAIK => 'Baik',
            self::RUSAK => 'Rusak',
            self::SEBAGIAN => 'Baik / Sebagian Rusak',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::BAIK => 'green',
            self::RUSAK => 'red',
            self::SEBAGIAN => 'yellow',
        };
    }


}
