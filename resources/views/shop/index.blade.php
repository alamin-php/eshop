@extends('frontend.master')

@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card card-primary">
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('shop.cart.index') }}">Home</a></li>
				<li class="breadcrumb-item active">Shopping Cart</li>
			</ul>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-12">
						<!-- ------------table------------ -->
						<table class="table table-borderless table-condensed">
							<tbody>
								@foreach($carts as $cart)
								<tr>
									<td>
										<img src="{{ asset('image/products/'.$cart->model->image) }}" style="width: 100px; height: 100px;">
									</td>
									<td>
										<p>
											<strong>{{$cart->model->product_name}}</strong>
											<br>
											{!!$cart->model->description!!}
										</p>
									</td>
									<td>
										<!-- -------------select to update qty------------ -->
										<form action="{{ route('cart.update') }}" method="post" id="frm_update{{$cart->rowId}}">
											@csrf
											<input type="hidden" name="rowId" value="{{ $cart->rowId }}">
											<div class="from-group">
												<select name="qty" class="form-control" onchange="document.getElementById('frm_update{{$cart->rowId}}').submit();" >
													@for($i=1; $i<=100; $i++)
													<option value="{{$i}}" {{$i==$cart->qty ? 'selected' : null }}>{{$i}}</option>
													@endfor
												</select>
											</div>
										</form>
										<!-- ------------------------- -->
									</td>
									<td>{{$cart->total}}</td>
									<td><a href="{{ route('cart.remove',$cart->rowId) }}"><i class="fa fa-remove"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<!-- ------------table------------ -->
					</div>

					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="form-group">
							
						<ul class="list-group">
							<li class="list-group-item">
							Subtotal
							<span class="badge badge-primary pull-right">{{ Cart::subtotal() }}</span>
						</li>							
						<li class="list-group-item">
							Tax
							<span class="badge badge-primary pull-right">{{ Cart::tax() }}</span>
						</li>							
						<li class="list-group-item">
							Total
							<span class="badge badge-primary pull-right">{{ Cart::total() }}</span>
						</li>
						</ul>

						</div>
						<div class="form-group">
							{{-- <button class="btn btn-info btn-sm"><i class="fa fa-shopping-bag"></i> Checkout</button> --}}
							<a href="{{ route('checkout.index') }}" class="btn btn-info btn-sm"><i class="fa fa-shopping-bag"></i> Checkout</a>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>




@endsection