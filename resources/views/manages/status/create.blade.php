@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Status
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
                            <h3 class="box-title">Create a New Color</h3>
                            <a href="{{ route('status.index') }}" class="btn btn-primary pull-right"><i class="fa fa-eye"> View</i></a>
                        </div>
                        {{-- box-header close --}}
                    </div>
{{-- =========================================== --}}
                        <div class="box-body">
                            <form role="form" action="{{ route('status.store') }}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <label for="status">Status Name</label>
                                        <input type="text" name="status" class="form-control" id="status" placeholder="Enter color name">
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
