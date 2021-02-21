<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanelController extends Controller
{
    public function index()
    {
          return view('Admin.panel'  );
    }

    public function ManageUsers()
    {
       $user = User::all();
       return view('Admin/user/user',compact('user'));
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

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function message()
    {

      $message = message::with('user')->get();

       return view('Admin.user.message',compact('message'));
    }



    public function AdminLogin()
    {
        return view('AdminLogin');
    }




}
