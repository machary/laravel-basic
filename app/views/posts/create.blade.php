@extends('layouts.scaffold')

@section('main')

<h1>Create Post</h1>

{{ Form::open(array('route' => 'posts.store','files' => true, 'method' => 'post')) }}
	<ul>
        <li>
            {{ Form::label('author', 'Author:') }}
            {{ Form::text('author') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('image_path', 'Post Image:') }}
            {{ Form::file('image_path') }}
        </li>

        <li>
            {{ Form::label('content', 'Content:') }}
            {{ Form::textarea('content') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::select('status', array('draft' => 'Draft', 'published' => 'Published')) }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


