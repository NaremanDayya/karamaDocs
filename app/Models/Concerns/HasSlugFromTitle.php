<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasSlugFromTitle
{
    public static function bootHasSlugFromTitle(): void
    {
        static::creating(function ($model) {
            if (blank($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->title_ar);
            }
        });
    }

    protected static function generateUniqueSlug(string $title): string
    {
        $base = Str::slug($title, '-', 'ar');

        if (blank($base)) {
            $base = 'item-'.Str::lower(Str::random(6));
        }

        $slug = $base;
        $i = 2;

        while (static::where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
