<?php

namespace App\Models;

use App\Models\Concerns\HasSlugFromTitle;
use App\Support\Markdown;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ProjectGuide extends Model
{
    use HasSlugFromTitle;

    protected $fillable = [
        'title_ar', 'slug', 'summary_ar', 'overview_ar', 'foundations_ar',
        'foundation_breakdown_ar', 'checklist_ar', 'reviewer_criteria_ar',
        'evaluation_rubric_ar', 'examples_edge_cases_ar', 'non_evaluated_guidance_ar',
        'published_at',
    ];

    protected $casts = [
        'checklist_ar' => 'array',
        'published_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }

    protected function overviewHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->overview_ar));
    }

    protected function foundationsHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->foundations_ar));
    }

    protected function foundationBreakdownHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->foundation_breakdown_ar));
    }

    protected function reviewerCriteriaHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->reviewer_criteria_ar));
    }

    protected function evaluationRubricHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->evaluation_rubric_ar));
    }

    protected function examplesEdgeCasesHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->examples_edge_cases_ar));
    }

    protected function nonEvaluatedGuidanceHtml(): Attribute
    {
        return Attribute::get(fn () => Markdown::toHtml($this->non_evaluated_guidance_ar));
    }
}
