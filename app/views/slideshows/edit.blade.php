@extends('layouts.scaffold')

@section('main')

<h1>Edit Slideshow</h1>
{{ Form::model($slideshow, array('method' => 'PATCH', 'route' => array('slideshows.update', $slideshow->id))) }}
	<ul>
        <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::file('image') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('slideshows.show', 'Cancel', $slideshow->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
