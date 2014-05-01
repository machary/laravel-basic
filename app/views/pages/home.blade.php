@extends('layouts.scaffold')
<br>
<br>

@section('main')
<ul class="rslides">
    @foreach($r_slide as $image)
    <li><img src="{{ URL::to('uploads/images/'.$image->image) }}" alt=""></li>
    @endforeach
</ul>

<br>

@foreach($r_post as $val)
    <div class="post">
        <img class="post-thumb" src="{{{ URL::to('uploads/images/thumbs/'.$val->image_path) }}}" />
        <div>
            <h3><a href="{{ URL::to('posts/'.$val->id) }}">{{ $val->title }}</a></h3>
            <span>{{ $val->updated_at }} | {{ $val->author }}</span>
            <p>{{ substr($val->content,0,250) }}...</p>
        </div>
    </div>
@endforeach

{{ $r_post->links() }}

@stop