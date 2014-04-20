@extends('layouts.scaffold')

@section('main')

<h1>Edit Post</h1>

{{ Form::model($post, array('method' => 'PATCH','files' => true, 'route' => array('posts.update', $post->id))) }}
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
            {{ Form::file('image_path',array('style'=>'display:none')) }}

            @if($post->image_path<>'') <!--check image exist or not -->
            <img id="img-thumb" src="{{{ URL::to('uploads/images/thumbs/'.$post->image_path) }}}" />
            <a id="post-img-change" href="#">Change This Image</a>
            @else
            {{ Form::file('image_path') }}
            @endif
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('posts.show', 'Cancel', $post->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
