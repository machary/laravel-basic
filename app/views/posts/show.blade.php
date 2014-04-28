@extends('layouts.scaffold')

@section('main')

<h1>{{{ $post->title }}}</h1>
<span> By {{{ $post->author }}} | {{{ $post->updated_at }}}</span>
<br/>
<img src="{{{ URL::to('uploads/images/thumbs/'.$post->image_path) }}}" />

{{ $post->content }}

@stop
