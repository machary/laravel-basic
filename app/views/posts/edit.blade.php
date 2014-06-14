@extends('layouts.scaffold')

@section('main')

<div class="page-header">
    <h1>Edit Post <small>Updating post content</small></h1>
</div>

{{ Form::model($post, array('method' => 'PATCH','files' => true, 'route' => array('posts.update', $post->slug),'class' => 'form-horizontal')) }}
	<div class="col-md-8">
        <ul>
            <li class="input-group">
                <span class="input-group-addon glyphicon glyphicon-bookmark"></span>
                {{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Post Title')) }}
            </li>

            <li>
                {{ Form::label('content', 'Content:') }}
                {{ Form::textarea('content') }}
            </li>
        </ul>
	</div>
    <div class="col-md-4" >
        <ul>
            <li class="input-group">
                <span class="input-group-addon glyphicon glyphicon-user"></span>
                {{ Form::text('author', null, array('class'=>'form-control','placeholder'=>'Author')) }}
            </li>
            <li class="input-group">
                <span class="input-group-addon glyphicon glyphicon-eye-open"></span>
                {{ Form::select('status', array('draft' => 'Draft', 'published' => 'Published'), null, array('class' => 'form-control')) }}
            </li>
            <li>
                {{ Form::submit('Update Post', array('class' => 'btn btn-info')) }}
                {{ link_to_route('posts.show', 'Cancel Editing', $post->id, array('class' => 'btn')) }}
            </li>
        </ul>
    </div>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
