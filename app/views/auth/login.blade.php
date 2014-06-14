@extends('layouts.scaffold')

@section('main')

<div class="container">
    {{ Form::open(array('url' => 'login', 'class' => 'form-signin', 'role'=>'form')) }}
        <h2 class="form-signin-heading">Please sign in</h2>
        <!-- Name -->
        <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
            <div class="controls">
                {{ Form::text('username', Input::old('username'),array('placeholder'=> 'Username', 'class'=>'form-control')) }}
                {{ $errors->first('username') }}
            </div>
        </div>
        <!-- Password -->
        <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
            <div class="controls">
                {{ Form::password('password',array('placeholder'=>'Password','class'=> 'form-control')) }}
                {{ $errors->first('password') }}
            </div>
        </div>
        <!-- Login button -->
        <div class="control-group">
            <div class="controls">
                {{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block')) }}
            </div>
        </div>
    {{ Form::close() }}
</div>

@stop