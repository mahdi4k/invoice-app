<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function deactivate($id)
    {
        User::where('id',$id)->update([
           'deActive' =>1
        ]);
        Session::flash('success', 'کاربر با موفقیت غیر فعال شد');
        return redirect()->back();
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
        Session::flash('success', 'کاربر مورد نظر با موفقیت آپدیت شد');
        return redirect()->back();

    }

    public function edit(User $user)
    {


        return view('Admin.user.update', compact('user'));
    }

    public function remove($id)
    {
            User::where('id',$id)->delete();
        Session::flash('success', 'کاربر با موفقیت حذف شد');
            return redirect()->back();
    }
}
