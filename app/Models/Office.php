<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'leader_name',
        'email',
        'phone',
        'address',
        'logo',
        'nip'
    ];

    protected static function booted(): void
    {
        static::updated(function ($office) {
            if ($office->isDirty('logo')) {
                $oldLogo = $office->getOriginal('logo');
                if ($oldLogo && file_exists(public_path($oldLogo))) {
                    unlink(public_path($oldLogo));
                }
            }
        });

        static::deleted(function ($office) {
            if ($office->logo && file_exists(public_path($office->logo))) {
                unlink(public_path($office->logo));
            }
        });
    }
}
