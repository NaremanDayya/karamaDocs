<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_guides', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('slug')->unique();
            $table->text('summary_ar')->nullable();
            $table->longText('overview_ar')->nullable();
            $table->longText('foundations_ar')->nullable();
            $table->longText('foundation_breakdown_ar')->nullable();
            $table->json('checklist_ar')->nullable();
            $table->longText('reviewer_criteria_ar')->nullable();
            $table->longText('evaluation_rubric_ar')->nullable();
            $table->longText('examples_edge_cases_ar')->nullable();
            $table->longText('non_evaluated_guidance_ar')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_guides');
    }
};
