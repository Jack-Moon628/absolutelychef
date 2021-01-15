<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    
    protected $table = 'experiences';


    public function users()
    {
        return $this->hasMany(User::class,'user_id','experience_id');
    }
}
