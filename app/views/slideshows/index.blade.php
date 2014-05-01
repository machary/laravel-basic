@extends('layouts.scaffold')

@section('main')

<h1>All Slideshows</h1>

<p>{{ link_to_route('slideshows.create', 'Add new image for slideshow') }}</p>

@if ($slideshows->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Thumbnail</th>
                <th>Location</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($slideshows as $slideshow)
				<tr>
                    <td> <img src="{{{ URL::to('uploads/images/thumbs/'.$slideshow->image) }}}" /></td>
					<td>{{{ $slideshow->image }}}</td>
                    <td>{{ link_to_route('slideshows.edit', 'Edit', array($slideshow->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('slideshows.destroy', $slideshow->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no slideshows
@endif

@stop
