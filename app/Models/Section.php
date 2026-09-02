<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    const KEY_HOME = 'home';
    const KEY_GETTING_STARTED = 'getting-started';
    const KEY_FAQ = 'faq';
    const KEY_ESSENTIALS = 'essentials';
    const KEY_QUALITY = 'quality';
    const KEY_QUALITY_CHARTER = 'quality-charter';
    const KEY_LEARN_TASKS = 'learn-tasks';
    const KEY_PROJECT_GUIDES = 'project-guides';
    const KEY_RESOURCES = 'resources';
    const KEY_UPDATES = 'updates';

    protected $fillable = [
        'key', 'title_ar', 'description_ar', 'icon', 'sort_order',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class)->orderBy('sort_order');
    }

    public function publishedArticles(): HasMany
    {
        return $this->articles()->whereNotNull('published_at');
    }

    public static function findByKey(string $key): ?self
    {
        return static::where('key', $key)->first();
    }
}
