<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'degree',
        'major',
        'start_date',
        'graduation_year',
        'gpa',
        'honors',
        'description'
    ];

    protected $dates = [
        'start_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
