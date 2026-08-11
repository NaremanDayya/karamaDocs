<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectGuide;
use Illuminate\Http\Request;

class ProjectGuideController extends Controller
{
    public function index()
    {
        $guides = ProjectGuide::orderBy('title_ar')->get();

        return view('admin.project-guides.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.project-guides.form', ['guide' => new ProjectGuide()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['checklist_ar'] = $this->parseChecklist($request->input('checklist_ar', ''));
        $data['published_at'] = $request->boolean('published') ? now() : null;

        ProjectGuide::create($data);

        return redirect()->route('admin.project-guides.index')->with('status', 'تم إنشاء دليل المشروع بنجاح.');
    }

    public function edit(ProjectGuide $projectGuide)
    {
        return view('admin.project-guides.form', ['guide' => $projectGuide]);
    }

    public function update(Request $request, ProjectGuide $projectGuide)
    {
        $data = $this->validated($request, $projectGuide);

        if (blank($data['slug'])) {
            unset($data['slug']);
        }

        $data['checklist_ar'] = $this->parseChecklist($request->input('checklist_ar', ''));
        $data['published_at'] = $request->boolean('published') ? ($projectGuide->published_at ?? now()) : null;

        $projectGuide->update($data);

        return redirect()->route('admin.project-guides.index')->with('status', 'تم تحديث دليل المشروع بنجاح.');
    }

    public function destroy(ProjectGuide $projectGuide)
    {
        $projectGuide->delete();

        return redirect()->route('admin.project-guides.index')->with('status', 'تم حذف دليل المشروع.');
    }

    protected function parseChecklist(?string $raw): array
    {
        return collect(explode("\n", $raw ?? ''))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    protected function validated(Request $request, ?ProjectGuide $guide = null): array
    {
        return $request->validate([
            'title_ar' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'alpha_dash', 'unique:project_guides,slug,'.$guide?->id],
            'summary_ar' => ['nullable', 'string', 'max:500'],
            'overview_ar' => ['nullable', 'string'],
            'foundations_ar' => ['nullable', 'string'],
            'foundation_breakdown_ar' => ['nullable', 'string'],
            'reviewer_criteria_ar' => ['nullable', 'string'],
            'evaluation_rubric_ar' => ['nullable', 'string'],
            'examples_edge_cases_ar' => ['nullable', 'string'],
            'non_evaluated_guidance_ar' => ['nullable', 'string'],
        ]);
    }
}
