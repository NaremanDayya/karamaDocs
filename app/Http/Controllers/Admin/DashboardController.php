<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Faq;
use App\Models\ProjectGuide;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'articles' => Article::count(),
            'faqs' => Faq::count(),
            'project_guides' => ProjectGuide::count(),
        ];

        return view('admin.dashboard', compact('counts'));
    }
}
