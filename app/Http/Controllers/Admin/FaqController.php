<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('category')->orderBy('sort_order')->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.form', ['faq' => new Faq()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['sort_order'] ??= 0;

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('status', 'تم إضافة السؤال بنجاح.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $this->validated($request);
        $data['sort_order'] ??= 0;

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('status', 'تم تحديث السؤال بنجاح.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('status', 'تم حذف السؤال.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'question_ar' => ['required', 'string', 'max:500'],
            'answer_ar' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
