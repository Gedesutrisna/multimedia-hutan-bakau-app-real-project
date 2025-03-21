<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'quiz_results';

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('point', 'like', '%' . $search . '%');
        });
    }

}
