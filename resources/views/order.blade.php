<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        @font-face {
            font-family: 'vazir';
            src: url("../fonts/vazir/Farsi-Digits/Vazir-Medium-FD.woff");
        }
        body{

            font-family: 'vazir' !important;
        }





        .cart-quantity-input-print{
            height: 34px;
            width: 50px;
            border-radius: 5px;
            color: #333;
            padding: 0;
            text-align: center;
            font-size: 1.2em;
            margin-right: 25px;
            position: relative;
            left: 15%;
        }
        @media print {

            .no-print, .no-print *
            {
                display: none !important;
            }

        }
    </style>
    <title>چاپ فاکتور</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="/css/main.css">

</head>

<body>


<div class="header">
    <div class="d-flex mt-3 mr-4 w-75 mx-auto align-items-center  ">
        <img style="width: 25%"  src="{{url('img/logo.png')}}">
        <p style="font-size: 2em;
      width: 100%;text-align: right;
    ">پــــیش فاکتـــــور</p>
    </div>
     <div class="col-md-8 mx-auto justify-content-around align-items-center d-flex mt-4">



        <p>
            <span>تاریخ ثبت سفارش : </span>
            <span> {{jdate('today')->format('%A, %d %B %y')}} </span>

        </p>
        <p>
            <span>شماره فاکتور : </span>
            <span id="factorNumber">{{mt_rand(100000,999999)}}</span>
        </p>

        <p>
            <span>
                @if(auth()->check())
                 {{auth()->user()->name}}
                 @else
                 -------------
                @endif
            </span>
            <span> : نام مشتری</span>
         </p>
    </div>




        <!-- SmartCart element -->


        <section class="container content-section">

            <div class="table-responsive">
                <table class=" table-hover table cart-row first-row">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center"   >فی</th>
                        <th    >قیمت</th>
                        <th    >تعداد</th>
                        <th    >واحد</th>
                        <th    >نوع و اینچ</th>
                        <th   >نام کارخانه</th>
                        <th    >نام کالا</th>
                        <th   >#ا</th>
                    </tr>
                    </thead>
                    <tbody class="cart-items">

                    </tbody>
                </table>
            </div>


            <div class="cart-total">
                <strong class="cart-total-title"> : جمع فاکتور </strong>
                <span class="cart-total-price">0</span>
            </div>
            <div class="w-100   justify-content-center d-none position-absolute">
                <a href="{{url('showOrder')}}" class="btn btn-primary btn-purchase" type="button">ثبت فاکتور</a>

            </div>
        </section>

    <div class="d-table mx-auto mt-4">
        <a href="javascript:window.print();"   class="btn no-print btn-outline-primary">چاپ فاکتور</a>
        <a id="sendData"   class="btn no-print btn-outline-primary">ثبت فاکتور</a>
    </div>
</div>


<div style="width:100%;float:right;margin-top:20px">




</div>

<?php
 $url = url('order/save');
?>
<script src="/js/storeOrder.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
     $('#sendData').click(function (e) {
          e.preventDefault();
          var products = localStorage.getItem('products') ;
            var factorNumber = document.getElementById('factorNumber').innerHTML;
            console.log(factorNumber);
                    $.ajaxSetup(
                        {
                            'headers': {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    $.ajax({
                        url: '{{ $url}}',
                        type: 'POST',
                        data: 'products=' + products + '&factorNumber='+ factorNumber ,
                        success: function (data) {

                        }
                    });

            });

</script>
</body>
</html>
