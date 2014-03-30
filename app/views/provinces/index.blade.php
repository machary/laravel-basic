@extends('layouts.scaffold')

@section('main')

<h1>All Provinces</h1>

<p>{{ link_to_route('provinces.create', 'Add new province') }}</p>

@if ($provinces->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Province</th>
				<th>Id_island</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($provinces as $province)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no provinces
@endif

@stop
