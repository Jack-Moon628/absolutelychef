<?php

namespace App;

use App\Enums\OrderPaymentStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Nikolag\Square\Traits\HasProducts;

class Order extends Model
{
    use HasProducts;
    protected $fillable = [
        'transaction_id',
        'amount',
        'job_qty',
        'package_type',
        'promotion_code',
        'job_posted',
        'status',
        'payment_status',
    ];

    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class,'order_package',  'order_id','package_id')->withPivot(['qty','promotion_code','used']);
    }

    public function hasJobToPost()
    {
    
        return $this->job_qty > $this->job_posted ? true : false;

    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


}
