@extends('layouts.scaffold')

@section('main')

<h1>{{{ $post->title }}}</h1>
<span> By {{{ $post->author }}} | {{{ $post->updated_at }}}</span>
<br/>

{{ $post->content }}

@stop
