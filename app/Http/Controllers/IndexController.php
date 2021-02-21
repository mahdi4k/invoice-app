<?php

namespace App\Http\Controllers;

use App\ActivationCode;
use App\Pipe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $mainPipe = Pipe::with('factoryPipe')->where('mainPipe',1)->get()->toArray();
        return view('index',compact('mainPipe'));
    }

    public function activation($token)
    {
        $activationCode = ActivationCode::whereCode($token)->first();

        if (!$activationCode) {
            dd('not exist');

            return redirect('/');
        }

        if ($activationCode->expire < Carbon::now()) {
            dd('expire');
            return redirect('/');
        }

        if ($activationCode->used == true) {
            dd('used');
            return redirect('/');
        }

        $activationCode->user()->update([
            'active' => 1
        ]);

        $activationCode->update([
            'used' => true
        ]);

        auth()->loginUsingId($activationCode->user->id);
        return redirect('/');
    }
}
