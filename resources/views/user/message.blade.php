@include('layouts.header')

<div class="container ">
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    @endif
    <h3 class="text-center mb-5">ارسال پیام</h3>
    <p class="text-center">در صورتی که هرگونه سوالی دارید میتوانید با استفاده از فرم زیر آن را با ما در میان بگذارید</p>
     <form method="post" action="{{url('user/send')}}" >
         @csrf
        <div class="form-group">
            <label class="pull-right" for="ّInputName">ارسال پیام</label>
            <textarea required name="message" class="form-control text-right" id="ّInputName" rows="3"></textarea>
            <input   type="hidden" name="user_id" value="{{ $user->id }}"    >
            <input class="btn btn-success text-right pull-right mt-4" type="submit"  value="ثبت" >
        </div>
    </form>
</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>

    $(' textarea ').on('change invalid', function() {
        var textfield = $(this).get(0);

        // 'setCustomValidity not only sets the message, but also marks
        // the field as invalid. In order to see whether the field really is
        // invalid, we have to remove the message first
        textfield.setCustomValidity('');

        if (!textfield.validity.valid) {
            textfield.setCustomValidity('لطفا پیام خود را وارد کنید');
        }
    });

</script>
