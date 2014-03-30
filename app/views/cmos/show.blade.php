@extends('layouts.scaffold')

@section('main')

<h1>Show Cmo</h1>

<p>{{ link_to_route('cmos.index', 'Return to all cmos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Perusahaan</th>
			<th>Jabatan</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Email</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $cmo->nama }}}</td>
					<td>{{{ $cmo->perusahaan }}}</td>
					<td>{{{ $cmo->jabatan }}}</td>
					<td>{{{ $cmo->alamat }}}</td>
					<td>{{{ $cmo->telepon }}}</td>
					<td>{{{ $cmo->email }}}</td>
                    <td>{{ link_to_route('cmos.edit', 'Edit', array($cmo->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('cmos.destroy', $cmo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
