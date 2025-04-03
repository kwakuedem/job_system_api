<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];


    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function job_application()
    {
        $this->hasMany(JobApplication::class);
    }
}
