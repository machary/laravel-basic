@extends('layouts.scaffold')

@section('main')

<div class="page-header">
    <h1>New Post <small>Creating new post</small></h1>
</div>

{{ Form::open(array('route' => 'posts.store','files' => true, 'method' => 'post','class' => 'form-horizontal')) }}
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
            {{ Form::submit('Save Post', array('class' => 'btn btn-info')) }}
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


