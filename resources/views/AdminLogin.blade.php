@include('layouts.header')
<div class="container  ">

    {{--<form method="POST"  class="text-right d-flex flex-column" action="{{ route('login') }}">
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
    </form>--}}
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <p style="font-size:16pt;padding-top: 20px" class="text-center">ورود به پنل مدیریت</p>
    <form id="AdminLogin" method="POST"  class="text-right d-flex flex-column" action="{{ route('login') }}">
        @csrf
        <div style="flex-direction: column" class="d-flex w-100  justify-content-center">
            <input type="text" id="login" name="phone" placeholder="شماره همراه"  class="fadeIn w-75 mt-3 mx-auto second ">
            <input type="password" name="password" id="password" placeholder="رمز عبور" class="fadeIn w-75 mt-3 mx-auto third" name="login" >
            <button style="height: 50px" type="submit" class=" btn btn-info fadeIn mt-4 w-75 mx-auto fourth"  >ورود</button>
         </div>



    </form>
        </div>
    </div>
</div>
