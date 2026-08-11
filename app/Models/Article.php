<?php

namespace App\Models;

use App\Models\Concerns\HasSlugFromTitle;
use App\Support\Markdown;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasSlugFromTitle;

    protected $fillable = [
        'section_id', 'title_ar', 'slug', 'excerpt_ar', 'body_ar', 'sort_order', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    protected function bodyHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->body_ar));
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }
}
