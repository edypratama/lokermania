<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'age',
        'gender',
        'cv'
    ];

    public function applied_jobs() 
    {
        return $this->hasMany(Applied_job::class);
    }


}
