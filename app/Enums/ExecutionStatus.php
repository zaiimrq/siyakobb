<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ExecutionStatus: string implements HasLabel
{
    case Dimusnahkan = 'dimusnahkan';
    case Dibakar = 'dibakar';
    case Ditenggelamkan = 'ditenggelamkan';
    case Ditanam = 'ditanam';
    case Dirusakkan = 'dirusakkan';
    case Dilelang = 'dilelang';
    case Diserahkan = 'diserahkan';
    case Disimpan = 'disimpan';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Dimusnahkan => 'Dimusnahkan',
            self::Dibakar => 'Dibakar sampai habis',
            self::Ditenggelamkan => 'Ditenggelamkan ke dasar laut sehingga tidak bisa diambil lagi',
            self::Ditanam => 'Ditanam di dalam tanah',
            self::Dirusakkan => 'Dirusakkan sampai tidak dapat dipergunakan lagi',
            self::Dilelang => 'Dilelang untuk Negara',
            self::Diserahkan => 'Diserahkan kepada instansi yang ditetapkan untuk dimanfaatkan',
            self::Disimpan => 'Disimpan di Rupbsan untuk barang bukti dalam perkara lain',
        };
    }
}
