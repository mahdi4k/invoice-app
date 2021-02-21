@extends('Admin.master')
@section('script')


@endsection
@section('content')
    <div class="container-fluid">
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        <div class="page-header mb-5 ">
            <h2>ایجاد کارخانه</h2>
        </div>
        <form action="{{route('factoryPipe.store')}}  " method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('Admin.section.errormassage')
            <div class="form-group col-md-6">
                <label for="title" class="control-label">نام کارخانه</label>
                <input type="text" class="form-control mt-2" name="factory_name" id="title"
                       placeholder="عنوان را وارد کنید" value="{{old('factory_name')}}">
            </div>

            <div class="form-group">
                <div class="col-sm 6">

                 <span style="cursor: pointer" class="file-input btn btn-primary btn-file mt-4">
                   <i class="fas fa-upload"></i>    انتخاب  لوگو  کارخانه  <input id="file_input" name="logo_factory" type="file">

                 </span>
                    <span style="display:inline-block;position:relative;top:15px" id="imageName" ></span>


                </div>
                <br>
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-success btn-block w-25 mt-5">ارسال</button>
            </div>
        </form>
    </div>

@endsection
