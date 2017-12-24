@extends('includes.layout')
@section('title',$category->name)


@section('content')


    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <br><br><br><br>
                </div>
            </div>
        </div>
    </header>

    @include('includes._messages')

    <div class="row">

        <div class="col-md-7 col-md-offset-1" >
            <h1>Category: {{ $category->name }} <small>{{ $category->posts()->count() }} Posts</small></h1>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Posted At</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($category->posts as $post)
                    <tr>
                        <th>{{ $post->post_title }}</th>
                        <td>{{ substr(strip_tags($post->post_description) , 0, 100) }} {{ strlen(strip_tags($post->post_description)) > 100 ? "..." : "" }}  </td>
                        <td> {{ date('M j, Y', strtotime($post->created_at)) }} </td>
                        <td>@foreach($post->tags as $tag)
                                <span class="label label-default">{{$tag->name}}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ url('blog/'.$post->slug) }}" class = "btn btn-default btn-sm">View</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
        </div>
    </div>



@endsection