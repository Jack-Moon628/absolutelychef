<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function transactionDetail()
    {
        $transaction = DB::table('nikolag_transactions')->where('payment_service_id',$this->transaction_id)->first();
        return $transaction;
    }

    public function addJobBalance(){
        $user = User::find($this->user_id);
        $user->premium_jobs_balance = $user->premium_jobs_balance + $this->premium_job;
        $user->save();
    }

    public function scopeSuccess($query){
        return $query->where('status', '=', 'success');
    }

}
