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


<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Daftar Request</h4>
                    <div class="table-responsive dash-social">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tgl input</th>


                                <th>Diminta Oleh</th>

                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Selesai Oleh</th>
                                <th>Selesai Pada</th>

                                <th>Action</th>
                                <th>Check</th>

                            </tr><!--end tr-->
                            </thead>

                            <tbody>
                                    @foreach ($request as $req)
                                    <tr>
                                        @if ($req->request_done_at == NULL)
                                        <td><i class="mdi mdi-close-box text-danger mr-1 font-18"></i>{{ $req->request_id }}</td>

                                        @else
                                        <td><i class="mdi mdi-check-all text-success mr-1 font-18"></i>{{ $req->request_id }}</td>
                                        @endif

                                            <td>{{ $req->created_at }}</td>
                                            <td>{{ $req->request_oleh  }}</td>
                                            <td>{{ $req->request_desc }}</td>
                                            <td>
                                                    @if ($req->request_done_at == NULL)
                                                    Belum Selesai


                                                    @else
                                                    Selesai
                                                    @endif
                                            </td>
                                            <td>{{ $req->request_done_by }}</td>
                                            <td>{{ $req->request_done_at }}</td>

                                            <td>



                                                <div style="display:inline-block;">
                                                        <form action="{{ route('dashboard.destroy', $req->request_id)}}" method="post">
                                                        <a href="{{ route('dashboard.edit',$req->request_id)}}" ><i class="mdi mdi-pencil text-success mr-1 font-18"></i>

                                                        </a>


                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="link"
                                                                style="  background:none!important;
                                                                color:inherit;
                                                                border:none;
                                                                padding:0!important;
                                                                font: inherit;

                                                                cursor: pointer;"
                                                                type="submit"><i class="mdi mdi-delete text-warning mr-1 font-18"></i> </button>
                                                        </form>
                                                </div>

                                            </td>
                                            <td>
                                                    @if ($req->request_done_at == NULL)
                                                    <a href="dashboard/act_done/{{ $req->request_id }}"><i class="mdi mdi-check-all text-success mr-1 font-18"></i></a>


                                                    @else
                                                    <a href="dashboard/act_cancel/{{ $req->request_id }}"><i class="mdi mdi-close text-danger mr-1 font-18"></i></a>
                                                    @endif
                                            </td>


                                    </tr><!--end tr-->

                                    @endforeach




                            </tbody>
                        </table>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->

@endsection
