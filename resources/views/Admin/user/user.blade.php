@extends('Admin.master')
@section('content')
    <div class="container-fluid">


        <div class="page-header ">
            <h2>مدیریت کاربران</h2>
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>شماره همراه کاربر</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>


                @foreach($user as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>

                        <td>

                            <a class="btn btn-info btn-circle "
                               href="{{ url('admin/user/edit').'/'.$item['id'] }}"><i class="fa fa-edit"></i>
                            </a>

                       <a class="btn btn-secondary "  href="{{ url('admin/user').'/deactivate'.'/'.$item['id'] }}"> غیر فعال کردن کاربر </a>
                       <a class="btn btn-danger "  href="{{ url('admin/user').'/remove'.'/'.$item['id'] }}"> حذف کاربر </a>


                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>


    </div>



@endsection
