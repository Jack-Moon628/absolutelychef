<?php

namespace App\Http\Controllers;

use App\Enums\OrderPaymentStatusEnum;
use App\Enums\OrderStatusEnum;
use App\Enums\PackageTypeEnums;
use App\Order;
use App\Package;
use Illuminate\Http\Request;
use Nikolag\Square\Facades\Square;
use SquareConnect\ApiException;

class CartController extends Controller
{
    
    public function index()
    {

        $cartItem = \Cart::getContent()->first();
        if(!$cartItem){
            return redirect()->route('advertise');
        }
        return view('cart',compact('cartItem'));
    }

    public function addToCart($id)
    {
        $package = Package::find($id);
        \Cart::clear();
        \Cart::add([
            'id'        => $package->id,
            'name'      => $package->name,
            'price'     => $package->price * $package->job_number,
            'quantity'  => 1,
            'attributes'    => [
                'type'      => $package->type,
                'single_price' => $package->price,
                'job_number' => $package->job_number
            ]
            
        ]);
        return redirect()->route('cart.index'); 
    }

    public function delete($id)
    {
        
        \Cart::remove($id);

        return redirect()->route('cart.index'); 

    }

    public function update(Request $request,$id)
    {   
        
        $qty = $request->input('quantity');
        $item = \Cart::getContent($id)->first();
        $att_type = $item->attributes->type;
        $per_price = calculatePrice($qty, $item->attributes->type);
        // echo($per_price);
        \Cart::update($id, array(
            'type'      => $att_type,
            'price' => $qty * $per_price , 
            'attributes'    => [
                'type' => $att_type,
                'single_price'  => $per_price,
                'job_number'  => $qty 
            ]
        ));

        return redirect()->route('cart.index');
    }


    public function payment(Request $request,$nonce,$token)
    {   
        $user = auth()->user();

        $cartItem = \Cart::getContent()->first();

        $location_id = 'WDX1WFYN7TBWD'; //$location_id is id of a location from Square

        // optional, default=USD
        $currency = 'GBP'; //available currencies => https://docs.connect.squareup.com/api/connect/v2/?q=currency#type-currency

        // optional
        $note = 'Advertise payment'; //note about this charge

        //optional
        $reference_id = $cartItem->id; //some kind of reference id to an object or resource

        $options = [
            'amount' => \Cart::getTotal() * 100 ,
            'source_id' => $nonce,
            'verification_token'    =>  $token,
            'location_id' => $location_id,
            'currency' => $currency,
            'note' => $note,
            'reference_id' => $reference_id,
            "idempotency_key" => "4935a656-a929-4792-b97c-8848be85c27c",
        ];
        try{
            $square = Square::charge($options); // Simple charge
        }catch(\Exception  $e){
            // return response($e) ;
            return  redirect()->back()->with('error' ,$e->getMessage() );
        }
            

        $square->status == "PAID" ?  $payment_status =  OrderPaymentStatusEnum::SUCCESS   : $payment_status =  OrderPaymentStatusEnum::FAILED;
        $promotion = str_random(7);
        $order = $user->orders()->create([
            'transaction_id'    => $square->payment_service_id,
            'amount'            => \Cart::getTotal(),
            'job_qty'           => $cartItem->attributes->job_number,
            'package_type'      => $cartItem->attributes->type,
            'status'            => OrderStatusEnum::PROCCESS,
            'payment_status'    => $payment_status,
            'promotion_code'    => $promotion
        ]);
        
        $payment = $order->payment()->create([
            'user_id'   => $user->id,
            'transaction_id' =>  $square->payment_service_id,
            'amount'    => \Cart::getTotal(),
            'status'    => 'success',
            'jobs'    =>  $cartItem->attributes->job_number,
            'package_name'    => PackageTypeEnums::getKey($cartItem->attributes->type),
        ]);
            
        \Cart::clear();
        return redirect()->route('employer_orders')->with('message','Package was added successfully.');

    }
    public function Postpayment(Request $request)
    {   
        
        $user = auth()->user();

        $cartItem = \Cart::getContent()->first();


        // optional, default=USD
        $currency = 'USD'; //available currencies => https://docs.connect.squareup.com/api/connect/v2/?q=currency#type-currency

        // optional
        $note = 'Advertise payment'; //note about this charge

        try{
            $square = Square::charge([
                'amount' => \Cart::getTotal() * 100,
                'currency' => $currency,
                'card_nonce' => $request->nonce,
                'location_id' => env('SQUARE_LOCATION'),
            ]);
        }catch(\Exception  $e){
            error_log('error----------------------------------------------------');
            //return redirect()->back()->with('error' ,$e->getMessage() );
            return redirect(route('advertise'))->with('error' , "Failed to add Package." );
        }
        error_log('ths is front of log squaare');
        error_log($square);
        $square->status == "PAID" ?  $payment_status =  OrderPaymentStatusEnum::SUCCESS   : $payment_status =  OrderPaymentStatusEnum::FAILED;
        $promotion = str_random(7);
        $order = $user->orders()->create([
            'transaction_id'    => $square->payment_service_id,
            'amount'            => \Cart::getTotal(),
            'job_qty'           => $cartItem->attributes->job_number,
            'package_type'      => $cartItem->attributes->type,
            'status'            => OrderStatusEnum::PROCCESS,
            'payment_status'    => $payment_status,
            'promotion_code'    => $promotion
        ]);
        
        $payment = $order->payment()->create([
            'user_id'   => $user->id,
            'transaction_id' =>  $square->payment_service_id,
            'amount'    => \Cart::getTotal(),
            'status'    => 'success',
            'jobs'    =>  $cartItem->attributes->job_number,
            'package_name'    => PackageTypeEnums::getKey($cartItem->attributes->type),
        ]);
        error_log('ths is front of log payment');
        error_log($payment);
        \Cart::clear();
        return redirect(route('employer_orders'))->with('message','Package was added successfully.');

    }
}
