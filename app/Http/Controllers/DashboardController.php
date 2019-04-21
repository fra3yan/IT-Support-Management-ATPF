<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Req;
class DashboardController extends Controller
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

    public function index()
    {

        $this->dashboard_data($greet,$req_total,$req_belum,$req_selesai,$users);


        $breadcrumbs=[

            'dashboard'
        ];




        $request = Req::all();

        return view('dashboard.main',[
            'users'=>$users,
            'breadcrumbs'=>$breadcrumbs,
            'greet' =>  $greet,
            'req_total' => $req_total,
            'req_belum' => $req_belum,
            'req_selesai' => $req_selesai,
            'request' => $request

        ]);


    }

    public function act_done($id)
    {
        $ar_user = \auth()->user();
        $users = DB::select('select * from users where id='.$ar_user->id);

        $request = Req::find($id);
        $request->request_done_at=now();
        $request->request_done_by= $users[0]->name;
        $request->save();

        Session::flash('message', 'Request Sudah Di Ceklist');
        Session::flash('alert-class', 'alert-info');

        return \Redirect::to('dashboard');


    }

    public function act_cancel($id)
    {

        $request = Req::find($id);
        $request->request_done_at=null;
        $request->request_done_by='';
        $request->save();


        Session::flash('message', 'Request Sudah Di Cancel');
        Session::flash('alert-class', 'alert-danger');

		return \Redirect::to('dashboard');
    }



    public function create()
    {
        $this->dashboard_data($greet,$req_total,$req_belum,$req_selesai,$users);


        $breadcrumbs=[

            'dashboard', 'new request'
        ];






        return view('dashboard.create',[
            'users'=>$users,
            'breadcrumbs'=>$breadcrumbs,
            'greet' =>  $greet,
            'req_total' => $req_total,
            'req_belum' => $req_belum,
            'req_selesai' => $req_selesai


        ]);
    }

    public function edit($id)
    {
        $this->dashboard_data($greet,$req_total,$req_belum,$req_selesai,$users);


        $breadcrumbs=[

            'dashboard', 'edit request'
        ];



        $req = Req::find($id);




        return view('dashboard.edit',[
            'users'=>$users,
            'breadcrumbs'=>$breadcrumbs,
            'greet' =>  $greet,
            'req_total' => $req_total,
            'req_belum' => $req_belum,
            'req_selesai' => $req_selesai,
            'req' => $req


        ]);
    }





    public function store(Request $request)
    {


          $ar_user = \auth()->user();
          $users = DB::select('select * from users where id='.$ar_user->id);

          $Req = new Req([
            'request_oleh' => $request->get('request_oleh'),
            'request_desc'=> $request->get('request_desc'),
            'request_submit_by'=> $users[0]->name
          ]);
          $Req->save();

          Session::flash('message', 'Request Sudah Tambahkan');
        Session::flash('alert-class', 'alert-info');

		return \Redirect::to('dashboard');

    }

    public function destroy($id)
    {
        //
        $req = Req::find($id);
        $req->delete();

        Session::flash('message', 'Request Sudah Di Hapus');
        Session::flash('alert-class', 'alert-danger');

        return \Redirect::to('dashboard');

    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'request_oleh'=>'required',
        'request_desc'=> 'required'
      ]);

      $req = Req::find($id);
      $req->request_oleh = $request->get('request_oleh');
      $req->request_desc = $request->get('request_desc');
      $req->save();

      Session::flash('message', 'Request Sudah Di Update');
      Session::flash('alert-class', 'alert-info');

      return \Redirect::to('dashboard');
    }

}
