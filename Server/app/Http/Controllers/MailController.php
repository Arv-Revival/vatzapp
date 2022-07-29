<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\NotifyMail;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{

    public function index(Request $request)
    {
        $date = date_create(date("Y-m-d"));
        date_sub($date, date_interval_create_from_date_string('7 days'));
        $subscriptionexpiry  = DB::table("clients")->select("clients.id", "users.email")->whereNotNull("clients.to")->whereDate("clients.to", "=", date_format($date, 'Y-m-d'))->join("users", "users.id", "=", "clients.user_id")->get();
        for ($i = 0; $i < count($subscriptionexpiry); $i++) {
            Mail::to($subscriptionexpiry[$i]->email)->send(new NotifyMail());
            if (Mail::failures()) {
                return $this->send_response('Sorry! Please try again latter',null,400);
            }
            // else {
            //     return $this->send_response(
            //         'Dashboard data sent.',
            //         $payload,
            //         200
            //     );
            // }
            // return $subscriptionexpiry[$i];
        }
        return;
    }
}
