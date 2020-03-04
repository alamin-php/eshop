@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Color
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
                            <h3 class="box-title">Color Information</h3>   
                            <a href="{{ route('color.restore') }}" class="btn btn-danger pull-right"><i class="fa fa-recycle"></i> Restore(s)</a>
                            <a href="{{ route('color.create') }}" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-plus"></i> Create</a>  
                        </div>
                        {{-- box-header close --}}
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Color Name</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                @foreach($colors as $key=>$color)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$color->color_name}}</td>
                                    <td>{{ Str::limit( $color->description, 30)}}</td>
                                    <td>{{ date('d-m-Y', strtotime($color->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($color->updated_at)) }}</td>
                                    <td>                                     

                                        <a href="{{ route('color.destroy', $color->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            footer
        </div>
    </div>
</section>
@endsection
