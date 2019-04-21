@extends('dashboard.master',
[
    'users'=>$users,
    'breadcrumbs'=>$breadcrumbs,
    'greet' =>  $greet,
    'req_total' => $req_total,
    'req_belum' => $req_belum,
    'req_selesai' => $req_selesai

]
)

@section('content')

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif


<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Ganti Password</h4>
                    <form method="post" action="password/update">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                     <div class="form-group">
                            <label for="username">Password Baru</label>
                            <input type="password" class="form-control" id="username" required="" name="p1"  >
                     </div>

                     <div class="form-group">
                            <label for="message">Password Konfirmasi</label>
                            <input type="password" class="form-control" id="username" required="" name="p2" >

                     </div>

                     <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary px-5 py-2">Submit</button>
                            </div>
                    </div>

                    </form>


                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->

@endsection
