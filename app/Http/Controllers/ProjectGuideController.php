<?php

namespace App\Http\Controllers;

use App\Models\ProjectGuide;

class ProjectGuideController extends Controller
{
    public function index()
    {
        $guides = ProjectGuide::published()->orderBy('title_ar')->get();

        return view('pages.project-guides-index', compact('guides'));
    }

    public function show(ProjectGuide $projectGuide)
    {
        return view('pages.project-guide-show', ['guide' => $projectGuide]);
    }
}
