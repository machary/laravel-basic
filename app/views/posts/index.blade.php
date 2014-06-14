@extends('layouts.scaffold')

@section('main')

<div class="page-header">
    <h1>Posts <small>Displays existing post</small></h1>
</div>

<p>{{ link_to_route('posts.create', 'Add new post') }}</p>

@if ($posts->count())
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
                <th>Title</th>
				<th>Author</th>
				<th>Status</th>
                <th>Last Update</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{{ $post->title }}}</td>
                    <td>{{{ $post->author }}}</td>
					<td>{{{ $post->status }}}</td>
                    <td>{{{ $post->updated_at }}}</td>
                    <td>{{ link_to_route('posts.edit', 'Edit', array($post->slug), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->slug))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
	There are no posts
@endif

@stop
