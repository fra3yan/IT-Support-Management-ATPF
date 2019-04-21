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
                    <h4 class="header-title mt-0">New Request</h4>
                    <form method="post" action="{{ route('dashboard.store') }}">
                     @csrf
                     <div class="form-group">
                            <label for="username">Diminta Oleh</label>
                            <input type="text" class="form-control" id="username" required="" name="request_oleh">
                     </div>

                     <div class="form-group">
                            <label for="message">Deskripsi</label>
                            <textarea class="form-control" rows="5" id="message" required="" name="request_desc" ></textarea>

                     </div>

                     <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary px-5 py-2">Tambah</button>
                            </div>
                    </div>

                    </form>


                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->

@endsection
