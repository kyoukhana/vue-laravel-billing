<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
        <meta id="stripekey" name="stripekey" content="{{config('services.stripe.key')}}">

        <title>VueJS Laravel Stripe</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>




    <div id="app">
        <checkout-form :products="{{$products}}"></checkout-form>
    </div>

    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="/js/app.js"></script>



    </body>
</html>
