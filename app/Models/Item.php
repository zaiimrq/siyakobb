<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasUuids;

    protected $table = 'items';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'tanggal_register' => 'datetime',
        ];
    }
}
