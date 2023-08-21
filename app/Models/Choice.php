<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'university',
        'major',
        'study_level',
        'course_mode',
        'candidate_id',
        'tuition',
    ];
}
