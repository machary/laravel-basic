@extends('layouts.scaffold')

@section('main')

<h1>All Islands</h1>

<p>{{ link_to_route('islands.create', 'Add new island') }}</p>

@if ($islands->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Island</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($islands as $island)
				<tr>
					<td>{{{ $island->island }}}</td>
                    <td>{{ link_to_route('islands.edit', 'Edit', array($island->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('islands.destroy', $island->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no islands
@endif

@stop
