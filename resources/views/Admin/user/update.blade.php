@extends('Admin.master')
@section('content')
<div class="container">
    <h3 class="text-center mb-5">فرم ویرایش کاربری</h3>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    @endif
    <form method="post" action="{{url('user/update').'/'.$user->id}}" class="col-md-8 mx-auto">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
            <label class="pull-right" for="ّInputName">نام</label>
            <input type="text" name="name" class="form-control text-right" id="ّInputName" value="{{ $user->name }}" aria-describedby="emailHelp"  >
        </div>
        <div class="form-group">
            <label class="pull-right" for="InputNumber">شماره تلفن</label>
            <input name="phone" type="number" class="form-control text-right" value="{{ $user->phone }}"  id="InputNumber" placeholder="Password">
        </div>

        <div class="form-group">
            <label class="pull-right" for="InputPassword">رمز عبور</label>
            <input name="password" type="password" class="form-control text-right" id="InputPassword"  >
        </div>

        <div class="form-group">
            <label class="pull-right" for="InputPassword2">تکرار رمز عبور</label>
            <input name="password_confirmation" type="password" class="form-control text-right" id="InputPassword2"  >
        </div>

        <button type="submit" class="btn btn-success">ثبت</button>
    </form>
</div>
@endsection
