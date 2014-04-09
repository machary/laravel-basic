@extends('layouts.scaffold')
<br>
<br>

@section('main')
<h1>Welcome, This is Home content.</h1>

@foreach($r_post as $val)
    <div class="post">
        <h3>{{ $val->title }}</h3>
        <span>{{ $val->updated_at }} | {{ $val->author }}</span>
        <p>
            {{ $val->content }}
        </p>
    </div>

@endforeach

@stop