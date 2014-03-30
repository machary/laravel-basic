@extends('layouts.scaffold')

@section('main')

<h1>Show Island</h1>

<p>{{ link_to_route('islands.index', 'Return to all islands') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Island</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $island->island }}}</td>
                    <td>{{ link_to_route('islands.edit', 'Edit', array($island->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('islands.destroy', $island->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
