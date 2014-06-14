@extends('layouts.master')

@section('main')

<section>

    <ul class="rslides">
        @foreach($r_slide as $image)
        <li><img src="{{ URL::to('uploads/images/'.$image->image) }}" alt=""></li>
        @endforeach
    </ul>
</section>

<div class="container">
    <div class="post col-sm-6">
        @foreach($r_post as $val)

        <div>
            <span>{{ $val->updated_at }} | By {{ $val->author }}</span>
            <h3><a href="{{ URL::to('posts/show/'.$val->slug) }}">{{ $val->title }}</a></h3>
        </div>

        @endforeach

        {{ $r_post->links() }}
    </div>

</div>



@stop