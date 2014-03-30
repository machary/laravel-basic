@extends('layouts.scaffold')

@section('main')

<h1>All Cmos</h1>

<p>{{ link_to_route('cmos.create', 'Add new cmo') }}</p>

@if ($cmos->count())

	<table id="datatables" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Perusahaan</th>
				<th>Jabatan</th>
				<th>Alamat</th>
				<th>Telepon</th>
                <th>Email</th>
                <th>Operations</th>


			</tr>
		</thead>

		<!--<tbody>
			@foreach ($cmos as $cmo)
				<tr>

                    <td>{{ link_to_route('cmos.edit', 'Edit', array($cmo->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('cmos.destroy', $cmo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody> -->
	</table>


@else
	There are no cmos
@endif

@stop
