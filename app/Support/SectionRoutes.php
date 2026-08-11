<?php

namespace App\Support;

use App\Models\Section;

class SectionRoutes
{
    public static function indexRoute(string $key): string
    {
        return match ($key) {
            Section::KEY_GETTING_STARTED => route('getting-started'),
            Section::KEY_FAQ => route('faq'),
            Section::KEY_ESSENTIALS => route('essentials.index'),
            Section::KEY_QUALITY => route('quality.index'),
            Section::KEY_LEARN_TASKS => route('learn-tasks.index'),
            Section::KEY_PROJECT_GUIDES => route('project-guides.index'),
            Section::KEY_RESOURCES => route('resources.index'),
            Section::KEY_UPDATES => route('updates.index'),
            default => route('home'),
        };
    }

    public static function showRoute(string $key, string $slug): string
    {
        return match ($key) {
            Section::KEY_ESSENTIALS => route('essentials.show', $slug),
            Section::KEY_QUALITY => route('quality.show', $slug),
            Section::KEY_LEARN_TASKS => route('learn-tasks.show', $slug),
            Section::KEY_RESOURCES => route('resources.show', $slug),
            Section::KEY_UPDATES => route('updates.show', $slug),
            default => route('home'),
        };
    }
}
