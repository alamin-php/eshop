@extends('layouts.app')

@section('content')

<style type="text/css">
    .modal.and.carousel{
        position: fixed;
    }
</style>

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
                            <h3 class="box-title">Product Information</h3>
                            <a href="{{ route('products.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create</a>
                        </div>
                        {{-- box-header close --}}
                    </div>
                        @if (session('status'))
                            <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                        @endif
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Active</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Last Updated</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $key => $p)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $p->category->category_name }}</td>
                                    <td>{{ $p->product_name }}</td>
                                    <td>{{ $p->qty }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->is_active }}</td>
                                    <td>{{ Str::limit($p->description, 25) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($p->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($p->updated_at)) }}</td>
                                    <td><img src="{{ asset('image/products/'.$p->image) }}" width="80" height="50" alt=""></td>
                                    <td>
                                        <a href="#lightbox" data-toggle="modal" data-id="{{ $p->id }}"  class="btn btn-info btn-sm view_image"><i class="fa fa-eye"> Image</i></a>                                        

                                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                        <a href="{{ route('products.destroy', $p->id) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('product_frm_delete').submit();"><i class="fa fa-trash"></i></a>

                                        <form action="{{ route('products.destroy', $p->id) }}" id="product_frm_delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $p->id }}">
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

    </div>
</section>
<div class="modal fade and carousel slide" id="lightbox">
    
</div>
@endsection

@section('script')
    <script>
        $('.view_image').on('click', function() {
            product_id = $(this).data('id');

            $.get("{{ route('products.index') }}", {product_id:product_id}, function(data){
                $('#lightbox').html(data);
            });
        });
    </script>
@endsection()