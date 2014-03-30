@extends('layouts.scaffold')

@section('main')

<h1>Create Province</h1>

{{ Form::open(array('route' => 'provinces.store')) }}
	<ul>
        <li>
            {{ Form::label('province', 'Province:') }}
            {{ Form::text('province') }}
        </li>

        <li>
            {{ Form::label('id_island', 'Located On what Island ?') }}
            {{ Form::select('id_island', $island_options, Input::old('island_options')) }}
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


