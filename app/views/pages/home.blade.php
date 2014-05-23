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
<div class="post col-sm-6">
@foreach($r_post as $val)

        <div>
            <span>{{ $val->updated_at }} | By {{ $val->author }}</span>
            <h3><a href="{{ URL::to('posts/'.$val->slug) }}">{{ $val->title }}</a></h3>
        </div>

@endforeach

{{ $r_post->links() }}
</div>

@stop