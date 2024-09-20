<?php

namespace App\Models;

use App\Observers\ItemObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ItemObserver::class)]
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
