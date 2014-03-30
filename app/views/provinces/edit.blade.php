@extends('layouts.scaffold')

@section('main')

<h1>Edit Province</h1>
{{ Form::model($province, array('method' => 'PATCH', 'route' => array('provinces.update', $province->id))) }}
	<ul>
        <li>
            {{ Form::label('province', 'Province:') }}
            {{ Form::text('province') }}
        </li>

        <li>
            {{ Form::label('id_island', 'Id_island:') }}
            {{ Form::text('id_island') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('provinces.show', 'Cancel', $province->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
