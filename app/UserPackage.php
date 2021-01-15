<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $table = 'userpackages';
    protected $fillable = ['user_id', 'normal_job_number', 'special_job_number'];
}
