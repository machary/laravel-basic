@extends('layouts.scaffold')
<br>
<br>

@section('main')
<h1>Welcome, This is Home content.</h1>

@foreach($r_post as $val)
    <div class="post">
        <img class="post-thumb" src="{{{ URL::to('uploads/images/thumbs/'.$val->image_path) }}}" />
        <div>
            <h3><a href="{{ URL::to('posts/'.$val->id) }}">{{ $val->title }}</a></h3>
            <span>{{ $val->updated_at }} | {{ $val->author }}</span>
            <p>{{ $val->content }}</p>
        </div>
    </div>
@endforeach

{{ $r_post->links() }}

@stop