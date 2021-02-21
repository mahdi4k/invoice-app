<?php

namespace App\Http\Controllers;

use App\message;
use App\order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    public function userOrder()
    {
         $getUserID =  Auth::user()->id;
         $Order = order::where('user_id',$getUserID)->get();
         return view('user.order',compact('Order'));
    }
    public function show($id)
    {
        $order = order::find($id);
        $SingleOrder = json_decode($order);
        return view('user.showOrder',compact('SingleOrder'));
    }
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->phone = request('phone');
        $user->password = bcrypt(request('password'));

        $user->save();
        Session::flash('success', 'کاربری شما با موفقیت ثبت شد');
        return redirect()->back();

    }


    public function messageForm(User $user)
    {
        $user = Auth::user();
        return view('user.message', compact('user'));
    }

    public function messageSend(Request $request)
    {
        $this->validate(request(), [
            'message' => 'required',
         ]);

        message::create([
            'user_id'=>$request->user_id,
            'message'=> $request->message
        ]);
        Session::flash('success', 'نظر شما با موفقیت ثبت شد');
        return redirect()->back();

    }

    public function saveOrder(Request $request)
    {
            order::create([
                'order_value'=>$request->products,
                'user_id' => '1',
                'numberFactor'=>$request->factorNumber
            ]);
    }

}
