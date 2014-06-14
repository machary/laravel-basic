@extends('layouts.master')
@section('main')
<section id="map"></section>
<div class="bs-callout bs-callout-info">
    <h4>Information :</h4>
    <div class="pull-left">
        Latitude  :<span id="latspan">...</span> &nbsp; &nbsp; | &nbsp; &nbsp;
        Longitude :<span id="longspan">...</span>
    </div>
    <span class="pull-right">Click on Map to Add New Spot</span>

</div>

<!-- Modal Form Input Coordinate -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Create New Coordinate</h4>
            </div>
            {{ Form::open(array('id'=>'coordinate','class' => 'form-horizontal')) }}
            <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">Lat</span>
                        {{ Form::text('lat',null,array('id'=>'lat','class'=>'form-control')) }}
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">Lon</span>
                        {{ Form::text('long',null, array('id'=>'long','class'=>'form-control')) }}
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">Title</span>
                        {{ Form::text('title', null,array('id'=>'title','class'=>'form-control')) }}
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">Info</span>
                        {{ Form::text('info', null,array('id'=>'info','class'=>'form-control')) }}
                    </div>
            </div>
            <div class="modal-footer">
                <button id='modal-batal' type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="{{ URL::asset('js/peta.js') }}"></script>

@stop