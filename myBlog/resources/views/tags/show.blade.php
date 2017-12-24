@extends('includes.layout')
@section('title',$tag->name)


@section('content')

    <br><br><br><br><br>
    @include('includes._messages')

    <div class="row">

        <div class="col-md-7" >
            <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
        </div>

        <div class="col-sm-3">
            {!! Html::linkRoute('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-primary btn-block')) !!}
            {!! Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'DELETE']) !!}
            {!! Form::submit('Delete', [ 'class'=>'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->post_title }}</td>
                        <td>@foreach($post->tags as $tag)
                            <span class="label label-default">{{$tag->name}}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class = "btn btn-default btn-sm">View</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection