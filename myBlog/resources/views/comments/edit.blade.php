@extends('includes.layout')
@section('title','Edit Comment')


@section('content')

    <br><br><br><br><br>
    @include('includes._messages')

    {{ Form::model($comment, [ 'route' => ['comments.update', $comment->id], 'method' => 'PUT' ] ) }}

    {{ Form::label('name','Name') }}
    {{ Form::text('name', null, [ 'class' => 'form-control', 'disabled' => 'disabled' ]) }}

    {{ Form::label('name','E-mail') }}
    {{ Form::text('email', null, [ 'class' => 'form-control', 'disabled' => 'disabled' ]) }}

    {{ Form::label('comment','Comment') }}
    {{ Form::textarea('comment', null, [ 'class' => 'form-control' ]) }}

    {{ Form::submit('Save Changes') }}

    {{ Form::close() }}




@endsection