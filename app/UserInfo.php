<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'home_phone',
        'allow_contact',
        'website_link1',
        'website_link2',
        'employer_type',
        'experience_year',
        'current_job',
        'current_salary',
        'languages',
        'summary',
        'desired_job',
        'desired_location',
        'deisred_salary',
        'job_type',
        'eligibility_uk',
        'eligibility_eu',
        'visiable_cv',
        'cover_letter',
        'onCLick_apply'
    ];

    protected $table = 'info_users';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
