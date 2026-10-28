<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'duration',
        'fee_amount',
    ];

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}