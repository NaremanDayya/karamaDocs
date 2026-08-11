<?php

namespace App\Http\Controllers;

use App\Models\Section;

class GettingStartedController extends Controller
{
    public function index()
    {
        $section = Section::findByKey(Section::KEY_GETTING_STARTED);
        $steps = $section->publishedArticles()->get();

        return view('pages.getting-started', compact('section', 'steps'));
    }
}
