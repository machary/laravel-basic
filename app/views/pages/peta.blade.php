@extends('layouts.scaffold')
<br>
@section('main')

<div id="map"></div>

<br>
Latitude  :<span id="latspan">...</span> &nbsp; &nbsp; | &nbsp; &nbsp;
Longitude :<span id="longspan">...</span>
<h1>New Coordinate</h1>

{{ Form::open(array('id'=>'coordinate')) }}
<ul>
    <li>
        {{ Form::label('lat', 'Latitude:') }}
        {{ Form::text('lat',null,array('id'=>'lat')) }}
    </li>

    <li>
        {{ Form::label('long', 'Longitude :') }}
        {{ Form::text('long',null, array('id'=>'long')) }}
    </li>

    <li>
        {{ Form::label('title', 'Location Title :') }}
        {{ Form::text('title', null,array('id'=>'title')) }}
    </li>

    <li>
        {{ Form::label('info', 'Detail Information :') }}
        {{ Form::text('info', null,array('id'=>'info')) }}
    </li>

    <li>
        {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
    </li>
</ul>
{{ Form::close() }}



@stop