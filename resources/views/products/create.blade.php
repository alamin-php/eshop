@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Product
            </h3>
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body pad">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Create a New Product</h3>
                            <a href="{{ route('products.index') }}" class="btn btn-primary pull-right"><i class="fa fa-eye"> View</i></a>
                        </div>
                        {{-- box-header close --}}
                    </div>
{{-- =========================================== --}}
                        <div class="box-body">
                            <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="InputName">Category Name</label>
											<select name="category_id" id="category_id" class="form-control">
												<option value="">-----Select Category-----</option>
												@foreach($categories as $key => $c)
												<option value="{{ $key }}">{{ $c }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="product_name">Product Name</label>
											<input type="text" name="product_name" class="form-control" id="product_name" value="{{ old('product_name') }}" placeholder="Enter product name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="qty">Quantity</label>
											<input type="number" name="qty" class="form-control" id="qty" value="{{ old('qty') }}" placeholder="Enter product Quantity">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="price">Price</label>
											<input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" placeholder="Enter product Price">
										</div>
									</div>
								</div>
                                  
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Description"></textarea>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Product Image</label>
                                        <input type="file" name="image" id="image" value="{{old('image')}}">
                                        <p class="help-block">Upload your product image</p>
                                    </div>   
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="imageGalleris">Gallery Image</label>
                                        <input type="file" name="imageGalleris[]" id="image" multiple id="imageGalleris">
                                        <p class="help-block">Upload your gallery image</p>
                                    </div>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

{{-- =========================================== --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
