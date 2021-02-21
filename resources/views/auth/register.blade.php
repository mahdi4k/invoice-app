@include('layouts.header')

<style>
    .form-group span {
        margin-bottom: 7px;
        margin-right: 6px;
        display: flex;
        color: #4a4a4a;
    }

    body {
        background: #F3F7FA;
    }
</style>
<div class="container position-relative">
    <div class="row content_box justify-content-center">


        <div class="col-md-6">
            <div class="text-center">
                 

            </div>

             <img class="d-xs-none" style="max-width: 500px;margin-top: 100px;" src="{{url('img/undraw_add_user_ipe3.svg')}}">
        </div>
        <div class="col-md-6 col-md-offset-3">

            <h3 class="registerHTag">ثبت نام در آب پلاست</h3>

            <div class="register_form">
                <form id="register" class="text-right" method="post" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group mt-5">
                        <span>شماره همراه</span>
                        <input required type="text" value="{{ old('phone') }}" class="form-control"
                               name="phone"
                        >
                        @if($errors->has('phone'))
                            <span class="has-error">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>


                    <div class="form-group mt-5">
                        <span>نام </span>
                        <input required lang="fa" dir="rtl" type="text" value="{{ old('name') }}" class="form-control"
                               name="name"
                        >
                        @if($errors->has('name'))
                            <span class="has-error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mt-5">
                        <span>کلـــمه عبــور</span>
                        <input required type="password" class="form-control" name="password">
                        @if($errors->has('password'))
                            <span class="has-error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group mt-5">
                        <span>تکرار کلمه عبور</span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">
                        @if($errors->has('password'))
                            <span class="has-error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>


                    <div class="form-group text-center">
                        <button class="btn btn-success  ">ثبت نام

                        </button>
                    </div>


                </form>
            </div>


        </div>

    </div>


</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>

    $('#register input ').on('change invalid', function() {
        var textfield = $(this).get(0);

        // 'setCustomValidity not only sets the message, but also marks
        // the field as invalid. In order to see whether the field really is
        // invalid, we have to remove the message first
        textfield.setCustomValidity('');

        if (!textfield.validity.valid) {
            textfield.setCustomValidity('لطفا این قسمت رو پر کنید');
        }
    });

</script>

