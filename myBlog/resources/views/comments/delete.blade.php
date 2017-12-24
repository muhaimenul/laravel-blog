@extends('includes.layout')
@section('title','Edit Comment')


@section('content')

    <br><br><br><br><br>
    @include('includes._messages')

    <div class="row">
        <div class="col=md-8 col-md-offset-2">
            <p>
                <strong>Name:</strong> {{ $comment->name }}<br>
                <strong>E-mail:</strong> {{ $comment->email }}<br>
                <strong>Comment:</strong> {{ $comment->comment }}<br>
            </p>
            {!! Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'DELETE']) !!}
            {!! Form::submit('Delete', [ 'class'=>'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>




@endsection