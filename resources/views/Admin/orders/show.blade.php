@extends('Admin.master')
@section('content')
    <h1 class="page-header">
         مشاهده سفارش
    </h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام کالا</th>
            <th scope="col">نام کارخانه</th>
            <th scope="col">واحد</th>
            <th scope="col">مقدار</th>
            <th scope="col">نوع</th>
            <th scope="col">فی(ریال)</th>
            <th scope="col">جمع(ریال)</th>
        </tr>
        </thead>
        <tbody>
         <?php
         $getOrders =  json_decode($SingleOrder->order_value);

         $Total_Price = 0
         ?>
        @foreach($getOrders as $key=>$value)
            <?php  ?>


            <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$value->title}}</td>
                <td>{{$value->factory}}</td>
                <td>{{$value->unit}}</td>
                <td>{{!empty($value->quantity) ? $value->quantity : 'بدون نوع'  }}</td>
                <td>{{!empty($value->inch) ? $value->inch : 'بدون نوع'  }}</td>
                <td>{{$value->price}}</td>
                <td class="totalPrice">{{$value->price * $value->quantity}}</td>
            </tr>
            <?php $Total_Price += $value->price * $value->quantity ?>
        @endforeach

        </tbody>
    </table>
    <div style="width: 90%;font-weight: bolder; display: flex; justify-content: flex-end"><span> جمع کل: </span><span>{{$Total_Price}}</span></div>



@endsection



