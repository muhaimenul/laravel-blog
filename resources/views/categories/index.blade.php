@extends('includes.layout')
@section('title','All Categories')


@section('content')

    <br><br><br><br><br>
    @include('includes._messages')
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <h2>Categories</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                {!! Form::open([ 'route' => 'categories.store', 'method' => 'POST' ]) !!}

                <h2>Add New Category</h2>
                {{ Form::label('name', 'Name:' , ['class' => 'col-sm-3 control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                {{ Form::submit('Add', ['class' => 'btn btn-default preview-add-button'] ) }}
                {!! Form::close() !!}
            </div>
        </div>


    </div>




@endsection