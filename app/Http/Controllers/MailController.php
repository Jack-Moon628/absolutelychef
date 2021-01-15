<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    public function pay_success_email(Request $request) {

        $user = auth()->user();
        $data = array
        (
            'amount' => $request->amount,
            'created_at' => $request->created_at,
            'currency' => $request->currency,
            'payment_service_type' => $request->payment_service_type,
            "name" => $user->name,
            "email" => $user->email,
        );
        
        Mail::send('mail.pay-success', $data, function($message) use ($data) {
            $message->from('needchange');
            $message->to($data['email']);
        });
        return($request);
    }
    public function membership_email(Request $request) {
        $user = auth()->user();
        $data = array
        (
            'amount' => $request->amount,
            'created_at' => $request->created_at,
            'currency' => $request->currency,
            'payment_service_type' => $request->payment_service_type,
            "name" => $user->name,
            "email" => $user->email,
        );
        
        Mail::send('mail.membership', $data, function($message) use ($data) {
            $message->from('needchange');
            $message->to($data['email']);
        });
        return($request);
    }

}