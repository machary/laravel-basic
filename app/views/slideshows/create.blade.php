@extends('layouts.scaffold')

@section('main')

<h1>Add Slideshow Image</h1>

{{ Form::open(array('route' => 'slideshows.store','enctype' => 'multipart/form-data','files' => true, 'method' => 'post')) }}
	<ul>
        <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::file('image',array('name'=>'image[]','multiple'=>'')) }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
@stop


