<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{


    public function orders()
    {
        
        return $this->belongsToMany(Order::class,'order_package',  'order_id','package_id')->withPivot(['qty','promotion_code','used']);

    }


}
