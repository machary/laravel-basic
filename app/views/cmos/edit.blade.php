@extends('layouts.scaffold')

@section('main')

<h1>Edit Cmo</h1>
{{ Form::model($cmo, array('method' => 'PATCH', 'route' => array('cmos.update', $cmo->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('cmos.show', 'Cancel', $cmo->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
