@extends('layouts.app')


@section('title')
    العقارين
@stop


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>العقارين</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    {{-- <a href="{{ route('user.create') }}" class="btn btn-success mt-2 ml-2 mt-xl-0">إضافة جديد </a> --}}
                    {{--  <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>  --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم الكامل</th>
                                <th>البريد الالكتروني</th>
                                <th>الهاتف</th>
                                <th>المؤسسة</th>
                                <th>الصفة</th>
                                <th>تاريخ الاضافة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->facility_name }}</td>
                                    <td>{{ $user->adjective }}</td>
                                    <td dir="ltr" >{{ $user->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" dir="ltr" aria-label="Basic example">
                                            <a href="#" title="حذف" class="btn btn-danger delete"><i class="mdi mdi-delete-forever" ></i></a>
                                            <a href="#" title="تعديل" class="btn btn-success"><i class="mdi mdi-lead-pencil" ></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
                </div>
            </div>
            </div>
    </div>
@stop


@section('script')
    

<script>
    @if(Session::has('success'))
        $.notify({
            // options
            icon: 'fa fa-check-circle',
            title: '<strong > تنبية  </strong> ... ',
            message: ' تم تحديث جدول العقارين '
        },{
            // settings
            type: "success",
            allow_dismiss: false,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "left"
            },
            offset: 20,
            spacing: 50,
            z_index: 9999,
            delay: 1000,
            timer: 2000,
            mouse_over: "pause",
            animate: {
                enter: 'animated fadeInLeft',
                exit: 'animated fadeOutLeft'
            }
        });
    @endif

    @if(Session::has('error'))
        $.notify({
            // options
            icon: 'fa fa-check-circle',
            title: '<strong > تنبية  </strong> ... ',
            message: ' هذا الدواء غير مؤمن من قبل هذه الشركة ! '
        },{
            // settings
            type: "warning",
            allow_dismiss: false,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "left"
            },
            offset: 20,
            spacing: 50,
            z_index: 9999,
            delay: 5000,
            timer: 2000,
            mouse_over: "pause",
            animate: {
                enter: 'animated fadeInLeft',
                exit: 'animated fadeOutLeft'
            }
        });
    @endif

</script>
@endsection
