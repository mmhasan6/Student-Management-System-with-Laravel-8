<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    /**
     * Get the courses that owns the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
>>>>>>> 184f23f (Course & subject relationonal db create, edit, Update)
}
