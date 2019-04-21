<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Req;
use App\User;

class PasswordController extends Controller
{
    //
    public function dashboard_data(&$greet,&$req_total,&$req_belum,&$req_selesai,&$users)
    {
        if (!\Auth::user()) {   // Check is user logged in
            return Redirect::to('login');

        }

            /* This sets the $time variable to the current hour in the 24 hour clock format */
            $time = date("H");
            /* Set the $timezone variable to become the current timezone */
            /* If the time is less than 1200 hours, show good morning */
            if ($time < "12") {
            $greet =  "Selamat Pagi";
            } else
            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "17") {
                $greet = "Selamat Sore";
            } else
            /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
            if ($time >= "17") {
                $greet = "Selamat Malam";
            }


            $qr = DB::select('select count(*) as total from req');
            $req_total = $qr[0]->total;
            $qr = DB::select('select count(*) as total from req where request_done_at  IS NULL');
            $req_belum = $qr[0]->total;
            $qr = DB::select('select count(*) as total from req where request_done_at  IS NOT NULL');
            $req_selesai = $qr[0]->total;





            $ar_user = \auth()->user();
            $id = $ar_user->id;
            $users = DB::select('select * from users where id='.$id);

    }

    public function edit()
    {
        $this->dashboard_data($greet,$req_total,$req_belum,$req_selesai,$users);


        $breadcrumbs=[

            'dashboard', 'settings'
        ];





        return view('dashboard.editpass',[
            'users'=>$users,
            'breadcrumbs'=>$breadcrumbs,
            'greet' =>  $greet,
            'req_total' => $req_total,
            'req_belum' => $req_belum,
            'req_selesai' => $req_selesai,


        ]);
    }

    public function update(Request $request)
    {
      $request->validate([
        'p1'=>'required',
        'p2'=>'required'
      ]);

      $ar_user = \auth()->user();
            $id = $ar_user->id;
      $user = User::find($id);
      $user->password = bcrypt($request->get('p1'));
      $user->save();

      Session::flash('message', 'Password sudah di ganti');
      Session::flash('alert-class', 'alert-info');

      return \Redirect::to('dashboard');
    }


}
