@extends('includes.layout')
@section('title','All Tags')


@section('content')

    <br><br><br><br><br>
    @include('includes._messages')
    <div class="row">
        <div class="col-md-7 col-md-offset-1" >
            <h2>Tags</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td>{{ $tag->name }}</td>
                        <td><a href="{{ route('tags.show', $tag->id) }}" class = "btn btn-default btn-sm">View</a> <a href="{{ route('tags.edit', $tag->id) }}" class = "btn btn-default btn-sm">Edit</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                {!! Form::open([ 'route' => 'tags.store', 'method' => 'POST' ]) !!}

                <h2>Add New Tag</h2>
                {{ Form::label('name', 'Name:' , ['class' => 'col-sm-3 control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                {{ Form::submit('Add', ['class' => 'btn btn-default preview-add-button'] ) }}
                {!! Form::close() !!}
            </div>
        </div>


    </div>




@endsection