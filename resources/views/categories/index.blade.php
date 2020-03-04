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
                            <h3 class="box-title">Category Information</h3>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create</a>
                        </div>
                        {{-- box-header close --}}
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Active</th>
                                    <th>Created</th>
                                    <th>Last Updated</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $c)
                                    {{-- expr --}}
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $c->category_name }}</td>
                                    <td>{{ Str::limit($c->description, 25) }}</td>
                                    <td>{{ $c->is_active }}</td>
                                    <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($c->updated_at)) }}</td>
                                    <td><img src="{{ asset('image/categories/'.$c->image) }}" width="80" height="50" alt=""></td>
                                    <td>
                                        <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                        <a href="{{ route('categories.destroy', $c->id) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('category_frm_delete').submit();"><i class="fa fa-trash"></i></a>

                                        <form action="{{ route('categories.destroy', $c->id) }}" id="category_frm_delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $c->id }}">
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
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
