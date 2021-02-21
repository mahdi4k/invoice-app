@include('layouts.header')



<!-- product section -->

<div class="invoice-section">
    <div class="container-fluid">
        <p class="text-center font-weight-bold ">صدور فاکتور</p>
        <aside class="col-md-12">

            <!-- Cart submit form -->
            <form action="/showOrder" method="GET">

                <!-- SmartCart element -->
                <input type="hidden" name="UserID" value="{{auth()->check() ? auth()->user()->id : '' }}">

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
                    <div class="w-100 d-flex justify-content-center">
                        <a href="{{url('showOrder')}}" class="btn btn-primary btn-purchase" type="button">ثبت فاکتور</a>

                    </div>
                </section>
            </form>
        </aside>
    </div>
</div>
<section id="singleProduct">
    <div class="container-fluid">
        <div class="row justify-content-around">
            <!-- BEGIN PRODUCTS -->

            <?php $i = 1 ?>
            @foreach($Pipes as $pipe)


                <?php
                $RemoveLastComma =ltrim($pipe->property,',') ;
                $props = explode(",", $RemoveLastComma)  ;
                ?>

                <div class="col-md-12">
                    <div class="row flex-row-reverse shadow-around">

                        <div class="col-md-12 d-flex justify-content-around flex-row-reverse align-items-center">
                            <img class="product-img" data-name="product_image" src="{{url('uploads/logos'.'/'.$pipe->img)}}" alt="...">

                                <h4 class="text-center   direction-right shop-item-title " data-name="product_name">{{$pipe->name}}</h4>
                                <span style="display: none; position:absolute;" class="Value-id">{{$pipe->id}}</span>

                                <p class="text-center shop-item-factory mb-0 " data-name="product_desc">{{$factory->name}}</p>







                                        <strong class="price d-inline-flex flex-row-reverse">

                                            <span  class="mx-1 shop-item-price ">{{$pipe->price}} </span><span>تومان</span>

                                        </strong>
                            <span  class="mx-5 inch-cart ">{{$pipe->count}}</span>
                                        <input value="1" type="number" style="position: unset !important;"   class="quantity-cart-section">


                                    <span  data-name="product_unit" class="unitPipe  ">({{$pipe->unit}})</span>
                                    <button class=" shop-item-button btn btn-outline-primary btn-sm pull-right">
                                        اضافه به فاکتور
                                    </button>
                                    <div class="clearfix"></div>


                        </div>
                    </div>
                </div>
        @endforeach
        <!-- END PRODUCTS -->
        </div>
    </div>
</section>

<!--UserLogin modal-->
<div class="modal fade" id="UserLogin" tabindex="-1" role="dialog" aria-labelledby="UserLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="UserLoginLabel">ورود به پنل کاربری</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="text-right d-flex flex-column" action="#">
                    <div class="form-group">
                        <label for="UserNumber">شماره همراه</label>
                        <input class="form-control" id="UserNumber" type="text" name="UserNumber">
                    </div>
                    <div class="form-group">
                        <label for="Password">رمز عبور</label>
                        <input class="form-control" id="Password" type="text" name="UserNumber">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">ورود به سایت</button>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="w-100 d-flex justify-content-center footer-section p-2  ">
        <span>راهکار های شرکت وب زاگرس</span>
    </div>
</footer>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
{{--<script src="/js/jquery.smartCart.min.js" type="text/javascript"></script>--}}
<script src="/js/main.js"></script>
<script src="/js/sweetalert2@9.js"></script>
<script src="/js/store.js"></script>



</body>

</html>


