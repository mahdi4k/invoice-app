<?php

namespace App\Listeners;

use App\Events\UserActivation;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSMSNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Handle the event.
     *
     * @param  UserActivation  $event
     * @return void
     */
    public function handle(UserActivation $event)
    {
        $client = new Client([
            'verify'=>false
        ]);

        $response = $client->request('POST','https://api.kavenegar.com/v1/6345425978763356682B65556431346855544B374E6D78516C35366A306D784A/sms/send.json',[
            'form_params'=>[
                'receptor' =>$event->user->phone,
                'message' =>'لینک فعال سازی اکانت آب پلاست'.route('activation.account',$event->activationCode)

            ]
        ]);
    }
}
