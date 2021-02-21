@extends('Admin.master')
@section('content')
    <h1 class="page-header">
        ثبت کالا
    </h1>
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    @endif
    @if(count($errors))

        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav>
        <div class="nav my-3 mr-3 " id="nav-tab" role="tablist">
            <a class=" btn btn-outline-primary ml-5  active" id="nav-home-tab" data-toggle="tab" href="#nav-sub-product" role="tab"
               aria-controls="nav-sub-product" aria-selected="true">ثبت محصول زیر دسته</a>
            <a class=" btn btn-outline-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-product" role="tab"
               aria-controls="nav-product" aria-selected="false">ثبت محصول سر دسته</a>
        </div>
    </nav>
    <div class="tab-content col-md-6" id="nav-tabContent">
        <div style="margin-bottom: 25px; padding: 10px; background: white; box-shadow: 1px 1px 20px #cccccc54;" class="tab-pane fade show active" id="nav-sub-product" role="tabpanel" aria-labelledby="nav-home-tab">
            <form class="mt-1" action="{{ route('subPipe')}}"  method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="title">نام کالا</label>
                    <input type="text" name="name" class="form-control" id="title"
                           placeholder="لطفا نام کالا را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="count">نوع و اینچ کالا</label>
                    <input type="text" name="count" class="form-control" id="count">
                </div>
                <div class="form-group">
                    <label for="price">قیمت</label>
                    <input type="text" name="price" class="form-control" id="price"
                           placeholder="لطفا قیمت  کالا را وارد کنید">
                </div>

                <div class="form-group">
                    <label for="unit">واحد</label>
                    <input type="text" name="unit" class="form-control" id="unit" placeholder="واحد کالا انتخاب کنید">
                </div>

                {{--<div class="form-group">
                    <label>افزودن ویژگی های کالا</label>
                    <input type="text" name="tag_list" id="tag_list" class="form-control">
                    <div class="btn btn-outline-primary add_product_tag" onclick="add_tag()">افزودن</div>
                    <input type="hidden" name="keywords" id="keywords">
                </div>
                <div id="tag_box"></div>--}}


                <div class="form-group">
                    <div class="col-sm 6 pr-0">

                             <span style="cursor: pointer" class="file-input btn btn-primary btn-file mt-4">
                               <i class="fas fa-upload"></i>    انتخاب  عکس کالا  <input class="file_input" name="img"
                                                                                         type="file">

                             </span>
                        <span style="display:inline-block;position:relative;top:15px" id="imageName"></span>
                    </div>
                    <br>
                </div>






                <div class="form-group">
                    <label for="category">انتخاب کالا سر دسته</label>
                    <select name="parentPipe" class="form-control text-right" id="MainPipe"
                            title=" کالا سردسته  را انتخاب کنید...">
                        @foreach( $MainPipe as $id => $name )
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">ثبت کالا</button>
            </form>
        </div>
        <div style=" margin-bottom: 24px; padding: 10px; background: white; box-shadow: 1px 1px 20px #cccccc54;" class="tab-pane fade" id="nav-product" role="tabpanel" aria-labelledby="nav-profile-tab">
            <form class="mt-1" action="{{ route('Pipe.store')}}"  method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="title">نام کالا</label>
                    <input type="text" name="name" class="form-control" id="title"
                           placeholder="لطفا نام کالا را وارد کنید">
                </div>




                <div class="form-group  ">
                    <label for="category">انتخاب کارخانه</label>
                    <select name="factory[]" class="form-control text-right" id="factory"
                            title=" کارخانه های مورد نظر خود را انتخاب کنید..." multiple>
                        @foreach( $factoryPipe as $id => $name )
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="col-sm 6 pr-0">

                             <span style="cursor: pointer" class="file-input btn btn-primary btn-file mt-4">
                               <i class="fas fa-upload"></i>    انتخاب  عکس کالا  <input class="file_input1" name="img"
                                                                                         type="file">

                             </span>
                        <span style="display:inline-block;position:relative;top:15px" id="imageName1"></span>
                    </div>
                    <br>
                </div>

                <button type="submit" class="btn btn-primary">ثبت کالا</button>
            </form>
        </div>

    </div>






@endsection

@section('styles')
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/js/bootstrap-select.js"></script>
    <script>
        $('#MainPipe').selectpicker();

        $('#factory').selectpicker();

        //check checkbox checked


        // property

        add_tag = function () {
            var tag_list = document.getElementById('tag_list').value;
            var t = tag_list.split(',');
            var keywords = document.getElementById('keywords').value;
            var string = keywords;
            var count = document.getElementsByClassName('tag_div').length + 1;
            for (var i = 0; i < t.length; i++) {
                if (t[i].trim() != '') {
                    var n = keywords.search(t[i]);
                    if (n == -1) {
                        var r = "'" + t[i] + "'";
                        string = string + "," + t[i];
                        var tag = '<div class="tag_div" id="tag_div_' + count + '">' +
                            '<span class="fas fa-eraser" onclick="remove_tag(' + count + ',' + r + ')"></span>' + t[i];
                        '</div>';
                        $("#tag_box").append(tag);

                        count++;
                    }
                }
            }
            document.getElementById('keywords').value = string;
            document.getElementById('tag_list').value = '';
        };
        remove_tag = function (id, text) {

            $("#tag_div_" + id).hide();
            var keywords = document.getElementById('keywords').value;
            var t = text + ",";
            var t2 = "," + text;
            var a = keywords.replace(t, '');
            var b = a.replace(t2, '');
            document.getElementById('keywords').value = b;
        }

    </script>




@endsection
