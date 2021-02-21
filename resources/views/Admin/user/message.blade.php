@extends('Admin.master')
@section('content')
    <div class="container-fluid">


        <div class="page-header ">
            <h2>مشاهده نظرات کاربران</h2>
        </div>


        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>نام کاربر</th>
                <th>شماره همراه کاربر</th>
                <th>نظر کاربر</th>
             </tr>
            </thead>
            <tbody>


            @foreach($message as $item)
                <tr>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->user->phone}}</td>
                    <td>{{$item->message}}</td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
@endsection
