@extends('Admin.master')
@section('content')
    <div class="container-fluid">


        <div class="page-header ">
            <h2>مدیریت کارخانه ها</h2>
            <a href="{{route('factoryPipe.create')}}" class="btn btn-primary btn-sm mb-3">افزودن کارخانه</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام کار خانه</th>
                    <th>عکس کارخانه</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>


                @foreach($factoryPipe as $facpipe)
                    <tr>
                        <td><a href="#"> {{$facpipe->name}}</a></td>
                        <td> <img width="50" src="{{url('uploads/logos/'.$facpipe->img) }}"> </td>

                        <td>

                            <a onclick="del_row('<?= $facpipe->id ?>','<?= url('admin/factoryPipe') ?>','<?= Session::token() ?>')"
                               class="btn btn-danger btn-circle pointer-hover  "><i class="fas fa-trash"></i></a>



                            <a class="btn btn-info btn-circle "
                               href="{{ url('admin/factoryPipe').'/'.$facpipe->id.'/edit' }}"><i class="fa fa-edit"></i> </a>


                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
        <div style="text-align: center">
            {!! $factoryPipe->render() !!}
        </div>

    </div>



@endsection
