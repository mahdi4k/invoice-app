@extends('Admin.master')
@section('content')
    <div class="container-fluid">


        <div class="page-header ">
            <h2>مدیریت کالا ها</h2>
            <a href="{{route('Pipe.create')}}" class="btn btn-primary btn-sm mb-3">افزودن کالا</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">نام کالا</th>
                    <th class="text-center"> عکس کالا</th>
                    <th class="text-center"> کارخانه های مرتبط به کالا</th>
                    <th class="text-center">تنظیمات</th>
                </tr>
                </thead>
                <tbody>


                @foreach($Pipe as $item)

                    <tr>
                        <td>  {{$item['name']}} </td>
                        <td style="width: 359px;text-align: center;"> <img style="width:25%" src="{{url('uploads/logos/'.$item['img']) }}"> </td>
                        <td>@foreach($item['factory_pipe'] as $factoryName) {{$factoryName['name']}} @endforeach</td>

                        <td>

                            <a onclick="del_row('<?= $item['id'] ?>','<?= url('admin/Pipe') ?>','<?= Session::token() ?>')"
                               class="btn btn-danger btn-circle pointer-hover  "><i class="fas fa-trash"></i></a>


                            <a class="btn btn-info btn-circle "
                               href="{{ url('admin/Pipe').'/'.$item['id'].'/edit' }}"><i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>


    </div>



@endsection
