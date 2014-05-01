@extends('layouts.scaffold')

@section('main')

<h1>Show Slideshow</h1>

<p>{{ link_to_route('slideshows.index', 'Return to all slideshows') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Image</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $slideshow->image }}}</td>
                    <td>{{ link_to_route('slideshows.edit', 'Edit', array($slideshow->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('slideshows.destroy', $slideshow->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
