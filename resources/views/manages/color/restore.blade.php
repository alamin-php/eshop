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
                            <h3 class="box-title">Deleted color restore</h3>   

                            <a href="{{ route('color.restore.info') }}" onclick="event.preventDefault();document.getElementById('frm_restore').submit();" class="btn btn-danger pull-right"><i class="fa fa-recycle"></i> Restore(s)</a>

                            <a href="{{ route('color.index') }}" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-undo"></i> Back</a>  
                        </div>
                        {{-- box-header close --}}
                    </div>
                    <div class="box-body">
                        <form action="{{ route('color.restore.info') }}" method="GET" id="frm_restore">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="chk"></th>
                                    <th>#</th>
                                    <th>Color Name</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colors as $key=>$color)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="{{ $color->id }}" class="id">
                                    </td>
                                    <td>{{++$key}}</td>
                                    <td>{{$color->color_name}}</td>
                                    <td>{{ Str::limit( $color->description, 30)}}</td>
                                    <td>{{ date('d-m-Y', strtotime($color->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($color->updated_at)) }}</td>
                                    <td>                                     
                                        <a href="{{ route('color.restore.info', $color->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-download"> Restore</i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </form>
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

@section('script')
    <script>
        $('#chk').on('change',function() {
            $('input[class=id]').not(this).prop('checked', this.checked);
        }); 

        // >>>>>>>>>>>>>>>>>>>>>>>>>>>

            $('input[class=id]').on('change',function(e) {
                
            $('input[id=chk]').not(this).prop('checked', this.checked);
        }); 
    </script>
@endsection
