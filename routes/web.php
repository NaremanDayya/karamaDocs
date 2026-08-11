<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ProjectGuideController as AdminProjectGuideController;
use App\Http\Controllers\ArticleSectionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GettingStartedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectGuideController;
use App\Models\Section;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/getting-started', [GettingStartedController::class, 'index'])->name('getting-started');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

foreach ([
    Section::KEY_ESSENTIALS => 'essentials',
    Section::KEY_QUALITY => 'quality',
    Section::KEY_LEARN_TASKS => 'learn-tasks',
    Section::KEY_RESOURCES => 'resources',
    Section::KEY_UPDATES => 'updates',
] as $sectionKey => $uri) {
    Route::get("/{$uri}", [ArticleSectionController::class, 'index'])
        ->name("{$uri}.index")
        ->defaults('sectionKey', $sectionKey);

    Route::get("/{$uri}/{article:slug}", [ArticleSectionController::class, 'show'])
        ->name("{$uri}.show")
        ->defaults('sectionKey', $sectionKey);
}

Route::get('/project-guides', [ProjectGuideController::class, 'index'])->name('project-guides.index');
Route::get('/project-guides/{projectGuide:slug}', [ProjectGuideController::class, 'show'])->name('project-guides.show');

Route::get('/admin', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('articles', AdminArticleController::class)->except('show');
        Route::resource('faqs', AdminFaqController::class)->except('show');
        Route::resource('project-guides', AdminProjectGuideController::class)->except('show');
    });
});

require __DIR__.'/auth.php';
