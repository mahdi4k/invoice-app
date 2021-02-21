@include('layouts.header')
     <h1 class="page-header">
        مشاهده سفارش
    </h1>
<div class="container">

    <table  class="table direction-right">
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
                <td>{{$value->product_name}}</td>
                <td>{{$value->product_desc}}</td>
                <td>{{$value->product_unit}}</td>
                <td>{{$value->product_quantity}}</td>
                <td>{{!empty($value->product_color) ? $value->product_color : 'بدون نوع'  }}</td>
                <td>{{$value->product_price}}</td>
                <td class="totalPrice">{{$value->product_price * $value->product_quantity}} </td>
            </tr>
            <?php $Total_Price += $value->product_price * $value->product_quantity ?>
        @endforeach

        </tbody>
    </table>
    <div style="width: 92%;font-weight: bolder; display: flex; justify-content: flex-start"><span> جمع کل: </span><span class="mx-1"> ریال </span><span> {{$Total_Price}} </span></div>



</div>






