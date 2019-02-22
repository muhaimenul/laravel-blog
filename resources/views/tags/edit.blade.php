@extends('includes.layout')
@section('title','All Tags')


@section('content')

    <br><br><br><br><br>
    @include('includes._messages')

    {{ Form::model($tag, [ 'route' => ['tags.update', $tag->id], 'method' => 'PUT' ] ) }}

        {{ Form::label('name','Name') }}
        {{ Form::text('name', null, [ 'class' => 'form-control' ]) }}

        {{ Form::submit('Save Changes') }}

    {{ Form::close() }}




@endsection