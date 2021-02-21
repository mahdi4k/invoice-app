@extends('Admin.master')
@section('content')
    <div class="container-fluid">


        <div class="page-header ">
            <h2>مدیریت سفارش ها</h2>

        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>شماره سفارش</th>
                    <th> تاریخ سفارش</th>
                    <th>مشاهده</th>
                </tr>
                </thead>
                <tbody>


                @foreach($orders as $item)

                 <?php $getOrders =  json_decode($item->order_value); ?>
                     <tr>
                        <td class="text-center">  {{$item->numberFactor}}  </td>
                        <td> {{jdate($item->created_at)->format('%A, %d %B %y')}} </td>

                        <td>




                            <a class="btn btn-info btn-circle"
                               href="{{ url('admin/orders').'/'.  $item->id  }} "><i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>


    </div>



@endsection
