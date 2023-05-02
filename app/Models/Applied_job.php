<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applied_job extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'job_id',
        'user_id'
    ];

    public function applicant() 
    {
        return $this->belongsTo(Applicant::class);    
    }

    public function job() 
    {
        return $this->belongsTo(Job::class);    
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
