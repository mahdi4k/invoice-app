@include('layouts.header')

<div class="container-fluid">


     <div class="table-responsive">
        <table style="direction: rtl" class="table table-striped table-bordered text-center" >
            <thead>
            <tr>
                <th>شماره سفارش</th>
                <th> تاریخ سفارش</th>
                <th>مشاهده</th>
            </tr>
            </thead>
            <tbody>


            @foreach($Order as $item)

                <?php $getOrders =  json_decode($item->order_value); ?>
                <tr>
                    <td>  {{$getOrders[0]->unique_key}} </td>
                    <td> {{jdate($item->created_at)->format('%A, %d %B %y')}} </td>

                    <td>




                        <a class="btn btn-info btn-circle"
                           href="{{ url('/orders').'/'.  $item->id  }} ">
                            مشاهده
                        </a>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
</div>
