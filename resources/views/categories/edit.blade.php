@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Category
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
                            <h3 class="box-title">Edit Category</h3>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary pull-right btn-sm">Back</a>
                        </div>
                        {{-- box-header close --}}
                    </div>
{{-- =========================================== --}}
                        <div class="box-body">
                            <form role="form" action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="form-group">
                                        <label for="InputName">Name</label>
                                        <input type="text" name="category_name" class="form-control" id="InputName" value="{{ $category->category_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputDescription">Description</label>
                                        <textarea name="description" class="form-control" id="InputDescription" >{{ $category->description }}</textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="is_active">Active</label>
                                        <input type="checkbox" name="is_active" id="is_active" class="checkbox" {{ $category->is_active!=0? 'checked' : null }} value="{{ $category->is_active }}">
                                        <p class="help-block">Active or Inactive</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputImage">Image</label>
                                        <input type="file" name="image" id="inputImage">
                                        <p class="help-block">Upload your image</p>
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
