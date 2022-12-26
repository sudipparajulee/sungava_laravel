@extends('layouts.master')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
<div class="my-5">
    <h2 class="font-bold text-center">Our Products</h2>
    <div class="grid grid-cols-3 px-16">
       
    </div>
 </div>
 
 <button id="payment-button">Pay with Khalti</button>

 <script>
   var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_99697f8fd7fc41e8b922cb5f84cf4e82",
            "productIdentity": "1234567890",
            "test" : "hello",
            "productName": "Watch",
            "productUrl": "http://gameofthrones.wikia.com/wiki/",
            "paymentPreference": [
                "KHALTI",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    console.log(payload);
                    if(payload.idx)
                    {
                     $.ajaxSetup({
                        headers: {
                           'X-CSRF-TOKEN' : '{{csrf_token()}}',
                        }
                     });

                     $.ajax({
                        method: 'POST',
                        url: "{{route('khalti.verify')}}",
                        data: payload,

                        success: function(response)
                        {
                           console.log('successfully paid');
                        },
                        error: function(data)
                        {
                           console.log(data.message);
                        }
                     });
                    }
                    
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
 </script>
 
@endsection