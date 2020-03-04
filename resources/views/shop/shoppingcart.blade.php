@extends('frontend.master')

@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12">
		{{$products->render()}}
		<div class="card">
			<ul class="breadcrumb">
				<li class="breadcrumb-item active">Showroom</li>
			</ul>
			<div class="card-body">
				<div class="row">

					@foreach($products as $key => $p)
					<div class="col-lg-3 col-md-3 col-sm-12 mt-2">
						<form action="{{ route('cart.add', $p->id) }}" method="GET">
							<div class="card">
								<h6 class="card-title bg-info text-white p-2 text-uppercase text-center">{{$p->product_name}}</h6>
								<div class="card-body">
									<img src="{{ asset('image/products/'.$p->image) }}" alt="phone" class="img-fluid mb-2" style="width:100%; height: 150px;">
									<hr>
									<h6>
										&#2547; {{$p->price}}
										<span>({{$p->discount}}% OFF)</span>
									</h6>
									<h6 class="badge badge-success"> 4.4 <i class="fa fa-star"></i></h6>
								</div>
								<div class="btn-group d-flex">
									<button class="btn btn-success flex-fill">Add to cart</button>
									<button class="btn btn-warning flex-fill text-white">Like</button>
								</div>
							</div>
						</form>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>




@endsection