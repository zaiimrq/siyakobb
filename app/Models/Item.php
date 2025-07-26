<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasUuids;

    protected $table = 'items';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'tanggal_register' => 'date',
            'kondisi_awal' => \App\Enums\ItemStatus::class,
            'lelang_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::updated(function (Item $item) {
            $original = $item->getOriginal('image');
            if (
                $item->isDirty('image') &&
                $original !== null &&
                Storage::disk('public')->exists($original)
            ) {
                Storage::disk('public')->delete($original);
            }
        });

        static::deleted(function (Item $item) {
            if ($item->image !== null) {
                Storage::disk('public')->delete($item->image);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Add accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->image === null && app()->environment('local')) {
            return "https://picsum.photos/800/800?random=$this->id";
        }

        return Storage::url($this->image);
    }
}
