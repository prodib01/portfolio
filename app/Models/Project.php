<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public static function create(array $array)
    {
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
