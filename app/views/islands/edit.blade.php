@extends('layouts.scaffold')

@section('main')

<h1>Edit Island</h1>
{{ Form::model($island, array('method' => 'PATCH', 'route' => array('islands.update', $island->id))) }}
	<ul>
        <li>
            {{ Form::label('island', 'Island:') }}
            {{ Form::text('island') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('islands.show', 'Cancel', $island->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
