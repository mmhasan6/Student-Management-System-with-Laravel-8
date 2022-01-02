<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'first_name',
        'last_name',
        'roll_id',
        'email',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'password',
        'profile_picture'
    ];
    /**
     * Get the parents that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parents()
    {
        return $this->belongsTo(StudentParent::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_students');
    }

}
