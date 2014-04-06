@extends('layouts.scaffold')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store')) }}
	<ul>
        <li>
            {{ Form::label('role_id', 'Select Role') }}
            {{ Form::select('role_id', $role_options, Input::old('role_options')) }}
        </li>
        <li>
            {{ Form::label('id', 'Username:') }}
            {{ Form::text('id') }}
        </li>

        <li>
            {{ Form::label('fullname', 'Fullname:') }}
            {{ Form::text('fullname') }}
        </li>

        <li>
            {{ Form::label('email', 'E-mail:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}
        </li>

        <li>
            {{ Form::label('status', 'User Status:') }}
            {{ Form::select('status', array('TRUE' => 'Active', 'FALSE' => 'Blacklist')) }}
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


