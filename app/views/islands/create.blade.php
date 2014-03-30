@extends('layouts.scaffold')

@section('main')

<h1>Create Island</h1>

{{ Form::open(array('route' => 'islands.store')) }}
	<ul>
        <li>
            {{ Form::label('island', 'Island:') }}
            {{ Form::text('island') }}
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


