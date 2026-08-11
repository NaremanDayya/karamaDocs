<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'category', 'question_ar', 'answer_ar', 'sort_order',
    ];
}
