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
                            <h3 class="box-title">Create a New Category</h3>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary pull-right"><i class="fa fa-eye"> View</i></a>
                        </div>
                        {{-- box-header close --}}
                    </div>
{{-- =========================================== --}}
                        <div class="box-body">
                            <form role="form" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label for="InputName">Name</label>
                                        <input type="text" name="category_name" class="form-control" id="InputName" placeholder="Enter category name">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputDescription">Description</label>
                                        <textarea name="description" class="form-control" id="InputDescription" placeholder="Description"></textarea>
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
