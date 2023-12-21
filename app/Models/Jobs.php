<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'instagram_handle',
        'email',
        'location',
        'why_ambassador',
        'experience_or_skills',
        'how_promote_brand',
        'additional_comments',
    ];
}
