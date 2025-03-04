<?php

namespace App\Models;

use App\Observers\ItemObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(ItemObserver::class)]
class Item extends Model
{
    use HasUuids;

    protected $table = 'items';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'tanggal_register' => 'datetime',
            'kondisi_awal' => \App\Enums\ItemStatus::class
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Add accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->image !== null) {
            return Storage::url($this->image);
        }

        // Fallback to Picsum
        return 'https://picsum.photos/800/800?random='.$this->id;
    }
}
