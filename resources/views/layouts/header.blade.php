<html lang="fa">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/css/all.min.css">
    <!--    <script src="js/main.js"></script>-->
    <title>سامانه پیش فاکتور آب پلاست</title>

</head>

<body>
<div
    class="navbar main-navbar navbar-expand-md d-flex flex-column flex-md-row align-items-center p-0  px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <nav class="navbar navbar-expand-md w-100  p-0  navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="/img/logo.png" width="250" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-content-end navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav align-items-center  ">

                @if(!auth()->check())

                <li class="nav-item login-user mr-2">
                    <a class="  btn btn-primary ml-md-2 color-white"  data-toggle="modal" data-target="#UserLogin" href="#">ورود به سایت</a>
                </li>
                 <li class="nav-item register-user mr-5">
                    <a  class="  btn btn-success  ml-md-2 color-white" href="{{url('register')}}">ثبت نام</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link  " href="#" tabindex="-1" aria-disabled="true">راهنمای سایت</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  " href="{{url('/')}}" tabindex="-1" aria-disabled="true">صفحه نخست</a>
                </li>
                {{--<li class="nav-item">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span
                            class="total-count"></span>) </button>
                    <button class="clear-cart btn btn-danger">Clear Cart</button>
                </li>--}}
            </ul>

        </div>
    </nav>


</div>
@if(auth()->check())
    <div class="container-fluid">
        <div class="userLogged my-4">
            <div class="d-flex justify-content-start flex-row-reverse position-relative">
                <a href="{{url('user/edit').'/'.auth()->user()->id}}" class="btn btn-outline-info ml-5 mr-4">ویرایش پروفایل<i class="fas fa-user-edit ml-1"></i></a>
                <a href="{{url('/UserOrder')}}" class="btn btn-outline-success ml-5">فاکتورها<i class="fas fa-file-invoice ml-1"></i></a>
                <a href="{{url('user/message')}}" class="btn btn-outline-secondary ml-5">ارسال پیام<i class="far fa-envelope ml-1"></i></a>
                <a class="btn btn-outline-danger ml-5" href="{{ url('/logout') }}"> خروج <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
@endif
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
                <form method="POST"  class="text-right d-flex flex-column" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="UserNumber">شماره همراه</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="Password">رمز عبور</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    <button type="submit" class="btn btn-success">
                        {{ __('ورود') }}
                    </button>
                </form>
            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="{{url('test')}}">
                @csrf
                 <div class="modal-body">

                        <table class="show-cart table">
                            <thead>
                            <tr>
                                <th scope="col">نام کالا</th>
                                <th scope="col">کارخانه</th>
                                <th scope="col">واحد</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">فی</th>
                            </tr>
                            </thead>
                        </table>
                        <div>Total price: $<span class="total-cart"></span></div>
                        <input name="totalPrice" class="totalPrice" type="hidden" value="">

                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Order now</button>
                </div>
            </form>
        </div>
    </div>
</div>
