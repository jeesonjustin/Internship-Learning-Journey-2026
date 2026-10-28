<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students_t17';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
    
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}