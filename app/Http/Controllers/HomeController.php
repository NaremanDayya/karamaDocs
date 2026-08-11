<?php

namespace App\Http\Controllers;

use App\Models\Section;

class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::whereNot('key', Section::KEY_HOME)
            ->orderBy('sort_order')
            ->get();

        return view('pages.home', compact('sections'));
    }
}
