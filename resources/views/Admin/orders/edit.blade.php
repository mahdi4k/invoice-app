@extends('Admin.master')
@section('script')

@endsection
@section('content')

     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        <div class="page-header mb-4 ">
            <h2> ویرایش   {{$Pipe->name}}</h2>
        </div>
        <form action="{{url('/admin/Pipe').'/'.$Pipe->id }}  " method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            @include('Admin.section.errormassage')
            <div class="form-group col-md-6">
                <label for="title" class="control-label">نام کالا</label>
                <input  type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{$Pipe->name}}" >
            </div>
                <input type="hidden" name="pipeId" value="{{$Pipe->id}}">
            <div class="form-group">
                <label for="title">تعداد کالا</label>
                <input type="text" name="count" class="form-control" id="title" placeholder="لطفا تعداد کالا را وارد کنید">
            </div>
            <div class="form-group">
                <label for="title">قیمت</label>
                <input type="text" name="price" class="form-control" id="title" placeholder="لطفا قیمت  کالا را وارد کنید">
            </div>

            <div class="form-group">
                <label for="title">واحد</label>
                <input type="text" name="price" class="form-control" id="title" placeholder="واحد کالا انتخاب کنید">
            </div>



            <div class="form-group">
                <label for="category">انتخاب کارخانه</label>
                <select  name="factory[]" class="form-control text-right" id="factory" title=" کارخانه های مورد نظر خود را انتخاب کنید..." multiple>
                    @foreach( \App\FactoryPipe::all() as $item )

                        <option value="{{$item->id}}" {{ in_array($item->id , $item->pipe()->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">

                <button type="submit" class="btn btn-success btn-block w-25 mt-5">ارسال</button>
            </div>
        </form>
    </div>

@endsection
@section('styles')
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/js/bootstrap-select.js"></script>

    <script>
        $('#factory').selectpicker();
    </script>
@endsection
