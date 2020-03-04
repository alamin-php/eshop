<div class="modal-dialog">

    <div class="modal-content">
        <div class="modal-body">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
					@foreach($imageGalleris as $key => $image)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : null}}"></li>
					@endforeach
                </ol>
                <div class="carousel-inner">
					@foreach($imageGalleris as $key => $image)
                    <div class="item {{ $key == 0 ? 'active' : null }}">
                        <img src="{{ asset('image/galleris/'.$image->gallery_image) }}" alt="First slide">
                    </div>
                    @endforeach

                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->