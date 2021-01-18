@extends('layouts.theme')

@section('head')
<style>
    
    * {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

#sq-ccbox {
  float:left;
  margin:5px;
  padding:10px;
  vertical-align: top;
  font-weight: bold;
}

#nonce-form {
  padding: 25px;
  text-align: right;
}

.sq-input {
  display: inline-block;
  border: 1px solid #E0E2E3;
  border-radius: 4px;
}

.sq-input--focus {
  border: 1px solid #4A90E2;
  box-shadow: 0 0 2px 0 rgba(0,0,0,0.10), 0 2px 2px 0 rgba(0,0,0,0.10);
}

.sq-input--error {
  border: 1px solid red;
}

.label {
  font-size: 18px;
  font-weight: bold;
  line-height: 24px;
  padding-right: 16px;
}

#sq-creditcard {
  display: block;
  width: 100%;
  height: 56px;
  padding: 15px;
  margin-top: 10px;
  background: #0EB00E;
  box-shadow: 0 0 2px 0 rgba(0,0,0,0.10), 0 2px 2px 0 rgba(0,0,0,0.10);
  border-radius: 4px;
  cursor:pointer;
  color: #FFFFFF;
  font-size: 16px;
  line-height: 24px;
  text-align: center;
  outline: none;
}
</style>
@endsection
@section('content')

    <div class="advertise-section pb-5 pt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="advertise-section-heading mt-4">

                        <h1>  Items in Your Cart                        </h1>
                        <h5 class="text-muted"></h5>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 bg-white card p-sm-4 shadow">   
                            @if($cartItem)
                                <h3>30 day Job Postings</h3>
                                <hr>

                                    <table class="table text-center cel-nostyle">  
                                        <tr >      
                                            <th >
                                                <div class="form-group" style="width: 80px; margin: -8 auto;">
                                                    <form method="POST" action="{{ route('cart.update',["id" => $cartItem->id ]) }}">
                                                            {{ csrf_field() }}

                                                            <select  class="form-control" name="quantity" id="quantity" onchange="submit()">
                                                                @for($i = 1; $i <= 10; $i++)
                                                                    @if($i != 4)
                                                                        <option value="{{$i}}" {{ $cartItem->attributes->job_number == $i ? 'selected' : "" }}>{{$i}}</option>
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                        </form>
                                                    </div>   
                                            </th>
                                            <td>
                                               Job Postings  {!! get_amount($cartItem->attributes->single_price ) !!} each
                                            </td>
                                            
                                        </tr>
                                        <tr class="border-bottom">
                                            <th>Jobs for : </th>
                                            <td>
                                                
                                                @if($cartItem->attributes->type == 0)
                                                    Non-management bar staff, waiting staff and barista vacancies
                                                @else
                                                     Management, Professional and Skilled Worker Job Ad
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th >Total price : </th>
                                            <td id='total'> {!! get_amount(Cart::getTotal()  ) !!}</td>
                                        </tr>
                                        <tr>
                                            <th >
                                                Total Payment :    
                                            </th>
                                            <td>
                                                <b></b> {!! get_amount(Cart::getTotal()  ) !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div id="form-container">
                                                    <input type="hidden" id="card-nonce">
                                                    <div id="sq-card-number"></div>
                                                    <div id="sq-expiration-date"></div>
                                                    <div id="sq-cvv"></div>
                                                    <div id="sq-postal-code"></div>
                                                    <button id="sq-creditcard" 
                                                          onclick="onGetCardNonce(event)">Pay</button>
                                                  </div> 
                                            </td>
                                        </tr>
                                    </table>
                                    
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="no data-wrap py-5 my-5 text-center">
                                            <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
                                            <h1>Cart is Empty</h1>
                                        </div>
                                    </div>
                                </div>
                            @endif         
                        </div>
                        <div class="col-md-4"> 
                            <h3>Buy in bulk and save</h3>
                            <h4>Price per 30 day job posting</h4>
                            <ul class="list-group">
                                @if($cartItem->attributes->type == 0)
                                    <li class="list-group-item"><span>1</span><span class="float-right"> {!! get_amount(10) !!} each</span></li>
                                    <li class="list-group-item"><span>2</span><span class="float-right"> {!! get_amount(8) !!} each</span></li>
                                    <li class="list-group-item"><span>3</span><span class="float-right"> {!! get_amount(6) !!} each</span></li>
                                    <li class="list-group-item"><span>5-10</span><span class="float-right"> {!! get_amount(5) !!} each</span></li>
                                @elseif($cartItem->attributes->type == 1)
                                <li class="list-group-item"><span>1</span><span class="float-right"> {!! get_amount(20) !!} each</span></li>
                                <li class="list-group-item"><span>2</span><span class="float-right"> {!! get_amount(16) !!} each</span></li>
                                <li class="list-group-item"><span>3</span><span class="float-right"> {!! get_amount(14 ) !!} each</span></li>
                                <li class="list-group-item"><span>5-10</span><span class="float-right"> {!! get_amount(10) !!} each</span></li>
                                @endif

                              </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('page-js')
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<!-- <script type="text/javascript" src="https://connect.squareup.com/v2/payments"></script> -->
<!-- <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script> -->
<!-- needchange -->
<script type="text/javascript" src="https://js.squareupsandbox.com/v2/paymentform"></script>
<script type="text/javascript">


var paymentForm = new SqPaymentForm({
  // Initialize the payment form elements
  applicationId: "{!! env('SQUARE_APPLICATION_ID') !!}",
  locationId: "{!! env('SQUARE_LOCATION') !!}",
  inputClass: 'sq-input',
  // Initialize the credit card inputTargets
  cardNumber: {
    elementId: 'sq-card-number',
    placeholder: '• • • •  • • • •  • • • •  • • • •'
  },
  cvv: {
    elementId: 'sq-cvv',
    placeholder: 'CVV'
  },
  expirationDate: {
    elementId: 'sq-expiration-date',
    placeholder: 'MM/YY'
  },
  postalCode: {
    elementId: 'sq-postal-code',
    placeholder: 'Post Code'
  },
  // Customize the CSS for SqPaymentForm iframe elements
  inputStyles: [{
    fontSize: '18px',
    fontFamily: 'Helvetica Neue',
    padding: '15px',
    color: '#373F4A',
    lineHeight: '24px',
    placeholderColor: '#BDBFBF'
  }],

  // SqPaymentForm callback functions
    callbacks: {

    /*
    * callback function: cardNonceResponseReceived
    * Triggered when: SqPaymentForm completes a card nonce request
    */
        cardNonceResponseReceived: function (errors, nonce, cardData) {
            if (errors) {
                // Log errors from nonce generation to the browser developer console.
                console.error('Encountered errors:');

                var template = '';
                errors.forEach((error, index) => {
                        template += (index+1) + '. ' + error.message+'\n'
                });

                alert(template)
                return;
            }
            //   alert(`The generated nonce is:\n${nonce}`);
            //TODO: Replace alert with code in step 2.1
            var t = document.getElementById("total").innerText.toString();
            var total = t.slice(1);
            alert(total);
            // post_to_url('/cart/pay', JSON.stringify({
            //         nonce: nonce, 
            //         location_id: paymentForm.options.locationId, 
            //         _token: "{{ csrf_token() }}"
            // }));
            var form = document.createElement('form');
            form.action = '/cart/pay';
            form.method = 'POST';

            var input_token = document.createElement('input');
            var input_lo_id = document.createElement('input');
            var input_nonce = document.createElement('input');
            
            input_token.type = 'hidden';
            input_token.name = '_token';
            input_lo_id.type = 'hidden';
            input_lo_id.name = 'location_id';
            input_nonce.type = 'hidden';
            input_nonce.name = 'nonce';

            input_token.value = "{{ csrf_token() }}";
            input_lo_id.value = paymentForm.options.locationId;
            input_nonce.value = nonce;

            // document.body.appendChild(input_token);
            // document.body.appendChild(input_lo_id);
            // document.body.appendChild(input_nonce);
            form.appendChild(input_token);
            form.appendChild(input_lo_id);
            form.appendChild(input_nonce);
            document.body.appendChild(form);
            form.submit();

            // fetch('/cart/pay', {
            //     method: 'POST',
            //     headers: {
            //         'Accept': 'application/json',
            //         'Content-Type': 'application/json'
            //     },
            //     body: JSON.stringify({
            //         nonce: nonce, 
            //         idempotency_key: '{{uniqid()}}',
            //         total:total,
            //         location_id: paymentForm.options.locationId, 
            //         _token: "{{ csrf_token() }}"
            //     })   
            // });
            // .catch(err => {
            //     alert('Network error: ' + err);
            // })
            // .then(response => {
            //     if (!response.ok) {
            //         return response.json().then(
            //         errorInfo => Promise.reject(errorInfo));
            //     }
            //     return response.json();
            // })
            // .then(data => {
            //     console.log(data);
            //     alert('Payment complete successfully!\nCheck browser developer console for more details');
            //     fetch('pay_success_email', {
            //         method: 'POST',
            //         headers: {
            //             'Accept': 'application/json',
            //             'Content-Type': 'application/json'
            //         },
            //         body: JSON.stringify({
            //             amount: data.amount,
            //             created_at: data.created_at,
            //             currency: data.currency,
            //             payment_service_type: data.payment_service_type,
            //             _token: "{{ csrf_token() }}"
            //         })
            //     })
            //     .catch(err => {
            //         console.log(err);
            //     })
            //     .then(response => {
            //         if (!response.ok) {
            //             return response.json().then(
            //             errorInfo => Promise.reject(errorInfo));
            //         }
            //         return response.json();
            //     })
            // })
            // .catch(err => {
            //     console.error(err);
            //     alert('Payment failed to complete!\nCheck browser developer console for more details');
            //     // alert(err);
            // });  
        }

    },

    /*
     * callback function: paymentFormLoaded
     * Triggered when: SqPaymentForm is fully loaded
     */
    paymentFormLoaded: function () {
      var text = $('#payment-form-loaded').text();
      $('#payment-form-loaded').text(text + ' - loaded');
    }
});

function onGetCardNonce(event) {
    // Don't submit the form until SqPaymentForm returns with a nonce
    event.preventDefault();
    // Request a nonce from the SqPaymentForm object
    paymentForm.requestCardNonce();
}
   //     $(function() {
// 	var $a = $(".tabs li");
// 	$a.click(function() {
// 		$a.removeClass("active");
// 		$(this).addClass("active");
// 	});
// });

function CheckOption(item){
    input = item.getElementsByTagName("input")[0];
    input.checked = true;
};
 </script>
@endsection