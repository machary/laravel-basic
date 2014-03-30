@extends('layouts.scaffold')

@section('main')

<h1>Create Cmo</h1>

{{ Form::open(array('route' => 'cmos.store')) }}
	<ul>
        <li>
            {{ Form::label('nama', 'Nama:') }}
            {{ Form::text('nama') }}
        </li>

        <li>
            {{ Form::label('perusahaan', 'Perusahaan:') }}
            {{ Form::text('perusahaan') }}
        </li>

        <li>
            {{ Form::label('jabatan', 'Jabatan:') }}
            {{ Form::text('jabatan') }}
        </li>

        <li>
            {{ Form::label('alamat', 'Alamat:') }}
            {{ Form::text('alamat') }}
        </li>

        <li>
            {{ Form::label('telepon', 'Telepon:') }}
            {{ Form::text('telepon') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
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


