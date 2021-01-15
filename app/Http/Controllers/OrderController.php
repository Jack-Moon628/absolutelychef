<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Nikolag\Square\Facades\Square;
use Nikolag\Square\Models\Customer;


class OrderController extends Controller
{
    public function add(Request $request){
        $user = auth()->user();
        $order = Order::where('user_id', $user->id)
                ->where('package_type', $request->package_type)->get();
        if ($order == 0) {
            $data = [
                'user_id' => $user->id,
                'amount' => $request->amount,
                'job_qty' => $request->job_qty,
                'package_type' => $request->package_type,
                'payment_status' => $request->payment_status,
            ];
            $neworder = Order::create($data);
            return $neworder;
        }
        $job_num = $order->job_qty;
        if ($request->package_type == '0') {
            $order->update(['job_qty' => $request->job_qty + $job_num]);
        }
        else{
            $order->update(['job_qty' => $request->job_qty + $job_num]);
        }
        return $order;
    }

    public function discount(Request $request){
        $order = Order::where('user_id', $user->id)
        ->where('package_type', $request->package_type)
        ->update(['job_qty' => $request->job_qty - 1]);
        return $userpackage;
    }
}

