@extends('layouts.scaffold')

@section('main')

<h1>Show Province</h1>

<p>{{ link_to_route('provinces.index', 'Return to all provinces') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Province</th>
				<th>Id_island</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $province->province }}}</td>
					<td>{{{ $province->id_island }}}</td>
                    <td>{{ link_to_route('provinces.edit', 'Edit', array($province->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('provinces.destroy', $province->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
