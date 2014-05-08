@extends('layouts.scaffold')

@section('main')

    <h1>Import Island</h1>
<form enctype="multipart/form-data" accept-charset="UTF-8"action="{{ URL::to('islands/port') }}" method="POST">
	<ul>
        <li>
            {{ Form::label('excel', 'Excel File:') }}
            {{ Form::file('excel') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
</form>

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


