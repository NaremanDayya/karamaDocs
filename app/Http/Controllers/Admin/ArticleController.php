<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Section;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected function articleSections()
    {
        return Section::whereIn('key', [
            Section::KEY_GETTING_STARTED,
            Section::KEY_ESSENTIALS,
            Section::KEY_QUALITY,
            Section::KEY_LEARN_TASKS,
            Section::KEY_RESOURCES,
            Section::KEY_UPDATES,
        ])->orderBy('sort_order')->get();
    }

    public function index()
    {
        $articles = Article::with('section')->orderBy('section_id')->orderBy('sort_order')->get();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $sections = $this->articleSections();

        return view('admin.articles.form', [
            'article' => new Article(),
            'sections' => $sections,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] ??= 0;
        $data['published_at'] = $request->boolean('published') ? now() : null;

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('status', 'تم إنشاء المقالة بنجاح.');
    }

    public function edit(Article $article)
    {
        $sections = $this->articleSections();

        return view('admin.articles.form', compact('article', 'sections'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $this->validated($request, $article);

        if (blank($data['slug'])) {
            unset($data['slug']);
        }

        $data['sort_order'] ??= 0;
        $data['published_at'] = $request->boolean('published') ? ($article->published_at ?? now()) : null;

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('status', 'تم تحديث المقالة بنجاح.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')->with('status', 'تم حذف المقالة.');
    }

    protected function validated(Request $request, ?Article $article = null): array
    {
        return $request->validate([
            'section_id' => ['required', 'exists:sections,id'],
            'title_ar' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'alpha_dash', 'unique:articles,slug,'.$article?->id],
            'excerpt_ar' => ['nullable', 'string', 'max:500'],
            'body_ar' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
