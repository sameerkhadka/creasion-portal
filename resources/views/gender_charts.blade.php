@extends('voyager::master')


@section('content')
<div class="page-content browse container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <?php $item = \App\Models\ChartData::where('id',3)->first(); ?>
                <form action="{{ route('chart.update', $item->id) }}" method="POST">
                @csrf
                <div class="panel-body">
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label> 
                        <textarea name="description" id="" class="form-control"  rows="10">{{$item->description ? $item->description : ""}}</textarea>
                    </div>
                </div>

                <div class="panel-footer">
                        <Input type=submit class="btn btn-primary save" value="save">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@stop