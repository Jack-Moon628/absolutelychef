<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Nikolag\Square\Traits\HasCustomers;

class User extends Authenticatable
{
    use HasCustomers;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function jobs(){
        return $this->hasMany(Job::class)->orderBy('id', 'desc');
    }
    public function is_user(){
        return $this->user_type === 'user';
    }
    public function is_admin(){
        return $this->user_type === 'admin';
    }
    public function is_employer(){
        return $this->user_type === 'employer';
    }
    public function is_agent(){
        return $this->user_type === 'agent';
    }

    public function scopeEmployer($query){
        return $query->whereUserType('employer');
    }
    public function scopeAgent($query){
        return $query->whereUserType('agent');
    }
    public function isEmployerFollowed($employer_id = null){
        if ( ! $employer_id || ! Auth::check()){
            return false;
        }

        $user = Auth::user();
        $isFollowed = UserFollowingEmployer::whereUserId($user->id)->whereEmployerId($employer_id)->first();

        if($isFollowed){
            return true;
        }
        return false;
    }

    public function getFollowersAttribute(){
        $followersCount = UserFollowingEmployer::whereEmployerId($this->id)->count();
        if ($followersCount){
            return number_format($followersCount);
        }
        return 0;
    }

    public function getFollowableAttribute(){
        if ( ! Auth::check()){
            return true;
        }

        $user = Auth::user();
        return $this->id !== $user->id;
    }

    public function getLogoUrlAttribute(){
        if ($this->logo){
            return asset('storage/uploads/images/logos/'.$this->logo);
        }
        return asset('assets/images/company.png');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function getPremiumJobsBalanceAttribute($value){
        return $value;
    }

    public function checkJobBalace(){
        $totalPremiumJobsPaid = $this->payments()->success()->sum('premium_job');
        $totalPosted = $this->jobs()->whereIsPremium(1)->count();
        $balance = $totalPremiumJobsPaid - $totalPosted;

        $this->premium_jobs_balance = $balance;
        $this->save();
    }

    public function signed_up_datetime(){
        $created_date_time = $this->created_at->timezone(get_option('default_timezone'))->format(get_option('date_format_custom').' '.get_option('time_format_custom'));
        return $created_date_time;
    }
    public function status_context(){
        $status = $this->active_status;

        $context = '';
        switch ($status){
            case '0':
                $context = 'Pending';
                break;
            case '1':
                $context = 'Active';
                break;
            case '2':
                $context = 'Block';
                break;
        }
        return $context;
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function totalJobs()
    {
        $orders = $this->orders;
        $totalJobs = 0;
        foreach($orders as $order){ 
            $totalJobs += $order->job_qty;
        }
        return $totalJobs;

    }


    public function jobOverLeft()
    {
        
        return $this->totalJobs() - $this->jobPosted();

    }

    public function jobOverLeftByType($type)
    {
        $orders = $this->orders;
        $totalJobs = 0;
        if($type == 0){
            foreach($orders as $order){ 
                if($order->package_type == 0){
                    $totalJobs += $order->job_qty;
                }
            }
            return $totalJobs;
        }elseif($type == 1){  
            foreach($orders as $order){
                if($order->package_type == 1){
                    $totalJobs += $order->job_qty;
                }
            }
            return $totalJobs;
        }
    }



    public function jobPosted()
    {
        $orders = $this->orders;
        $JobPosted = 0;
        foreach($orders as $order){ 
            $JobPosted += $order->job_posted;
        }
        return $JobPosted;
    }

    public function activeJobs()
    {
        $jobs = $this->jobs;
        $activeJobs = 0;
        foreach($jobs as $job){ 
            if($job->status == 1 && $job->activeDays() >= 0){
                $activeJobs += 1;
            }
        }
        return $activeJobs;
    }

    public function expiredJobs()
    {
        $jobs = $this->jobs;
        $expiredJobs = 0;
        foreach($jobs as $job){ 
            if($job->activeDays() <= 0){
                $expiredJobs += 1;
            }
        }
        return $expiredJobs;
    }

    public function packages()
    {
        $i = 0;
        $orders = Order::where('user_id', $this->id)->get();
        foreach($orders as $order){ 
          foreach($order->packages as $p){
            $i++;
            $packages[] = $p;
          };
        }
        return [
            'list'  => $packages,
            'count' => $i
        ];
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }


    public function experiences()
    {
        return $this->belongsToMany(Experience::class,'experience_user','user_id');

    }

}
