<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    //

    protected $fillable = [
        'user_id',
        'job_id',
        'cover_letter',
        'resume',
        'status'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function job()
    {
        $this->belongsTo(JobPost::class);
    }
}
