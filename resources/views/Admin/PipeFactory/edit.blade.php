@extends('Admin.master')
@section('script')

@endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        <div class="page-header mb-4 ">
            <h2>ویرایش کارخانه</h2>
        </div>
        <form action="{{url('/admin/factoryPipe').'/'.$factoryPipe->id }}  " method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            @include('Admin.section.errormassage')
            <div class="form-group col-md-6">
                <label for="title" class="control-label">نام کارخانه</label>
                <input type="text"  class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{$factoryPipe->name}}" >
            </div>


            <div class="form-group">
                <img style="width: 15%;" src="{{url('uploads/logos/'.$factoryPipe->img) }}">
            </div>

            <div class="form-group">
                <span style="cursor: pointer" class="file-input btn btn-primary btn-file mt-4 mr-2">
                   <i class="fas fa-upload"></i>    انتخاب  لوگو  کارخانه  <input id="file_input" name="logo_factory" type="file">
                 </span>

                <span style="display:inline-block;position:relative;top:15px" id="imageName" ></span>


            </div>


            <div class="form-group">

                <button type="submit" class="btn btn-success btn-block w-25 mt-5">ارسال</button>
            </div>
        </form>
    </div>

@endsection
