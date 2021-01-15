<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPackage;

class UserPackageController extends Controller
{
    public function create(){
        $user = auth()->user();
        $data = [
            'user_id' => $user->id,
        ];
        $userpackage = UserPackage::create($data);
        return $userpackage;
    }
    public function add(Request $request){
        $user = auth()->user();
        if (UserPackage::where('user_id', $user->id)->get() == null) {
            $data = [
                'user_id' => $user->id,
            ];
            $newuserpackage = UserPackage::create($data);
        }
        $normal_num = UserPackage::where('user_id', $user->id)->value('normal_job_number');
        $special_num = UserPackage::where('user_id', $user->id)->value('special_job_number');
        if ($normal_num + $special_num == 0) {
            $data = [
                'user_id' => $user->id,
            ];
            $newuserpackage = UserPackage::create($data);
        }
        if ($request->type == '0') {
            $userpackage = UserPackage::where('user_id', $user->id)
                                    ->update(['normal_job_number' => $request->job_number + $normal_num]);
        }
        else{
            $userpackage = UserPackage::where('user_id', $user->id)
                                    ->update(['special_job_number' => $request->job_number + $special_num]);
        }
        
        return $userpackage;
    }

    public function discount(Request $request){
        $user = auth()->user();
        if ($request->type == 'normal') {
            $normal_num = UserPackage::where('user_id', $user->id)->normal_job_number;
            $userpackage = UserPackage::where('user_id', $user->id)
                                    ->update(['normal_job_number' => $normal_num + 1]);
        }
        else{
            $special_num = UserPackage::where('user_id', $user->id)->special_job_number;
            $userpackage = UserPackage::where('user_id', $user->id)
                                    ->update(['special_job_number' => $special_num + 1]);
        }
        return $userpackage;
    }
}
