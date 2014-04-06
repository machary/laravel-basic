@extends('layouts.scaffold')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
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
            {{ Form::select('status', array('0' => 'Active', '1' => 'Blacklist')) }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
