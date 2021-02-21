<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = order::all();
        $ordermain = json_decode($orders);
        
        return view('Admin.orders.all',compact('orders','ordermain'));

     }

    public function show($id)
    {
           $order = order::find($id);
          $SingleOrder = json_decode($order);
            return view('Admin.orders.show',compact('SingleOrder'));
     }
}
