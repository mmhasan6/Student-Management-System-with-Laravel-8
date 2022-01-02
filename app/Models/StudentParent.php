<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $table = 'student_parents';
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'profile_image',
        'address',
        'student_id'
    ];
    /**
     * Get all of the child_student for the StudentParent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child_student()
    {
        return $this->hasMany(Student::class);
    }

}
