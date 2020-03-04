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
                            <h3 class="box-title">Edit Product</h3>
                            <a href="{{ route('products.index') }}" class="btn btn-primary pull-right btn-sm">View Product</a>
                        </div>
                        {{-- box-header close --}}
                    </div>
{{-- =========================================== --}}
                <div class="box-body">
                    <form role="form" action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="InputName">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">-----Select Category-----</option>
                                        @foreach($categories as $key => $c)
                                        <option value="{{ $key }}" {{ $product->category_id==$key ? 'selected' : null}}>{{ $c }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name" value="{{ $product->product_name }}" placeholder="Enter product name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" name="qty" class="form-control" id="qty" value="{{ $product->qty }}" placeholder="Enter product Quantity">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" placeholder="Enter product Price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputDescription">Description</label>
                            <textarea name="description" class="form-control" id="InputDescription" rows="5">{{$product->description }}</textarea>
                        </div>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="is_active">Active</label>
                                <input type="checkbox" name="is_active" id="is_active" class="checkbox" {{ $product->is_active!=0? 'checked' : null }} value="{{ $product->is_active }}">
                                <p class="help-block">Active or Inactive</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputImage">Upload</label>
                                <input type="file" name="image" id="inputImage">
                                <p class="help-block">Upload your image</p>
                            </div>
                        </div>                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <img src="{{ asset('image/products/'.$product->image) }}" width="150" height="120" alt="">
                                <label for="inputImage">Product Image</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="imageGalleris">Gallery Image</label>
                                <input type="file" name="imageGalleris[]" id="image" multiple id="imageGalleris">
                                <p class="help-block">Upload your gallery image</p>
                            </div>
                        </div>
                        </div>                       

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title pad">Gallery of Products</h3>
                                {{-- box-header close --}}
                                <div class="box-body">
                                    <div class="col-md-12">
                                        @foreach($imageGalleris as $key => $image)
                                            <img src="{{ asset('image/galleris/'.$image->gallery_image) }}" class="img-thumdnil" width="100" height="80" alt="">
                                        @endforeach
                                    </div>
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
