<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Section;

class ArticleSectionController extends Controller
{
    public function index(string $sectionKey)
    {
        $section = Section::findByKey($sectionKey);
        $articles = $section->publishedArticles()->get();

        return view('pages.section-index', compact('section', 'articles'));
    }

    public function show(Article $article, string $sectionKey)
    {
        abort_unless($article->section->key === $sectionKey, 404);

        $section = $article->section;
        $related = $section->publishedArticles()
            ->where('id', '!=', $article->id)
            ->limit(4)
            ->get();

        return view('pages.article-show', compact('article', 'section', 'related'));
    }
}
