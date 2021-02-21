@include('layouts.header')

<h1 style="font-family:'abplast';">سامانه پیش فاکتور لوله و اتصالات - آب پلاست</h1>
<section class="m-md-5 product-section">
    <div class="container-fluid">

        <div class="Product-index d-flex flex-fill justify-content-around align-content-center">

            @foreach($mainPipe as $indexKey => $item)

                <?php $factoryValue  = \Illuminate\Support\Arr::pluck($item['factory_pipe'],'name','img');

                      $factoryName =implode(',',array_values($factoryValue));
                      $factoryImg = implode(',',array_keys($factoryValue));
                      $factoryID= implode(',',array_values(\Illuminate\Support\Arr::pluck($item['factory_pipe'],'id')));
                      $PipeID= implode(',',array_values(\Illuminate\Support\Arr::pluck($item['factory_pipe'],'id')));

                ?>
                <div class="col product-shadow @if($loop->first) @else ml-3 @endif" data-toggle="modal" data-whatever1="{{$factoryName}}" data-whatever="{{$factoryImg}}" data-whatever3="{{$item['id']}}"  data-whatever2="{{$factoryID}}" data-target="#exampleModal">
                    <img class="product-image" src="{{url('uploads/logos/'.$item['img'])}}" alt="image">
                    <h4>{{$item['name']}}</h4>
                </div>

            @endforeach

        </div>

    </div>


    <!--    modal Section-->

    <div class="container-fluid">
        <!--        first modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header w-100">
                        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">انتخاب کارخانه</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body select-factory d-flex my-4 justify-content-center">
                        <div class="row w-100  ">

                            <div class="dataFacInsert">

                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--        second modal-->
         <!--        third modal-->
         <!--        fourth modal-->
         <!--        fifth modal-->
     </div>


</section>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/cart.js"></script>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var facImg = button.data('whatever').split(',');
        var facName = button.data('whatever1').split(',');
        var facId = button.data('whatever2').toString().split(',');
        var PipeId = button.data('whatever3').toString().split(',');
            console.log(typeof facId);
        //console.log(facName ,  facImg);
        var i  ;
             for (i=0 ; i < facName.length ;  i++){
                $('.dataFacInsert').append( `
            <a href="{{url('/pipes')}}/${facId[i]}/${PipeId}" class="col-sm-12 col-md-3 text-center p-3 factories">

                                <img src="{{asset('uploads/logos')}}/${facImg[i]}" alt="">
                                <p>${facName[i]}</p>

             </a>

            `);
            }
     });

     $('#exampleModal').on('hidden.bs.modal', function () {
        $('.dataFacInsert').children().remove();
    });

    $('#form2 input[type=text]').on('change invalid', function() {
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
</body>

</html>
