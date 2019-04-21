<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControler extends Controller
{
    //
    public function home()
    {
        $data_hobi=[
            'diem',
            'baca',
            'ngapain kek'

        ];
        return view('welcome',[
            'hobi' => $data_hobi
        ]);
    }


    public function about()
    {
        $data_hobi=[
            'data2',
            'asdasdas',
            'asdsadas'

        ];
        return view('welcome',[
            'hobi' => $data_hobi
        ]);
    }
}
