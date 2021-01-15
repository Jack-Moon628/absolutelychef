<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nikolag\Square\Facades\Square;
use Nikolag\Square\Models\Customer;


class ChargeController extends Controller
{
    //
    public function createCustomer()
    {
        $customerArr = [
            'first_name' => 'Nikola',
            'last_name' => 'Gavric',
            'company_name' => 'The Testing Company - ttc',
            'nickname' => 'gavra',
            'email' => 'test@xxx.com',
            'phone' => '+382939494',
            'note' => 'some note',
        ];
        $customer = new Customer($customerArr);
        $customer->save();

        return response()->json(compact('customer'));
    }

    public function charge(Request $request)
    {
        // $output = implode(',', $request);
        // echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        // error.log($request);
        $transaction = Square::charge([
            'amount' => $request->total*100,
            'currency' => 'USD',
            'card_nonce' => $request->nonce,
            'location_id' => env('SQUARE_LOCATION'),
            // 'currency' => 'GBP'
        ]);
        return $transaction;
    }

    public function chargeWithMerchant(User $merchant)
    {
        $transaction = Square::setMerchant($merchant)
        ->charge([
            'amount' => 500,
            'card_nonce' => $request->nonce,
            'location_id' => env('SQUARE_LOCATION'),
            'currency' => 'GBP'
        ]);
        return response()->json(compact('transaction'));
    }

    public function chargeWithCustomer(Customer $customer)
    {
        $transaction = Square::setCustomer($customer)
        ->charge([
            'amount' => 500,
            'card_nonce' => $request->nonce,
            'location_id' => env('SQUARE_LOCATION'),
            'currency' => 'GBP'
        ]);
        return response()->json(compact('transaction'));
    }

    public function chargeWithMerchantAndUser(User $merchant, Customer $customer)
    {
        $transaction = Square::setMerchant($merchant)
        ->setCustomer($customer)
        ->charge([
            'amount' => 500,
            'card_nonce' => $request->nonce,
            'location_id' => env('SQUARE_LOCATION'),
            'currency' => 'GBP'
        ]);
        return response()->json(compact('transaction'));
    }
    // public function order(Request $request)
    // {
    //     return env('SQUARE_LOCATION');
    //     $order = new Order;
    //     $user = Auth::user();
    //     $order->total = $request->total;
    //     $square = Square::setOrder($order, env('SQUARE_LOCATION'));
    //     $square->charge([
    //         'amount' => $order->total,
    //         'card_nonce' => $request->nonce,
    //         'location_id' => env('SQUARE_LOCATION')
    //     ]);
    //     $order = $square->getOrder();
    //     //return view('new_register', compact('title'));
    //     return response()->json(compact('order'));
    // }
}
