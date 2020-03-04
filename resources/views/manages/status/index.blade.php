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
                            <h3 class="box-title">Color Information</h3>
                            <a href="{{ route('status.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create</a>
                        </div>
                        {{-- box-header close --}}
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status Name</th>
                                    <th>Created</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                @foreach($statuses as $key=>$s)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$s->status}}</td>
                                    <td>{{ date('d-m-Y', strtotime($s->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($s->updated_at)) }}</td>
                                    <td>                                      
                                        <a href="{{ route('status.destroy', $s->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></a>
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
