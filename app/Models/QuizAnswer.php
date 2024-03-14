<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'quiz_answers';

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('answer_text', 'like', '%' . $search . '%')
            ->orWhere('point', 'like', '%' . $search . '%')
            ->orWhere('is_correct', 'like', '%' . $search . '%');
        });
        $query->when($filters['question'] ?? false, function ($query, $question) {
            return $query->whereHas('question', function ($query) use ($question) {
                $query->where('question', $question);
            }
            );
        });
    }
}
