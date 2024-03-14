<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'quiz_questions';

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('question', 'like', '%' . $search . '%');
        });
        $query->when($filters['quiz'] ?? false, function ($query, $quiz) {
            return $query->whereHas('quiz', function ($query) use ($quiz) {
                $query->where('slug', $quiz);
            }
            );
        });
    }
}
