<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\{Charge,Customer};
use App\product;

class PurchasesController extends Controller
{
   public function store(){


      $product = Product::findOrFail(request('product'));


      /*
       * Create a new customer
       */
      $customer = Customer::create([

         'email' => request('stripeEmail'),
         'source' => request('stripeToken')

      ]);

      /*
       * Charge the user but good practice is get the value from the database
       */
      Charge::create([
         'customer' => $customer->id,
         'amount' => $product->price,
          "currency" => "cad",
      ]);

      return response()->json([
          'success' => 1
      ]);

   }
}
