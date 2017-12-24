@extends('includes.layout')
@section('title','Admin | All Posts')


@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/mblog/img/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>Admin Panel</h1>
                        <h2 class="subheading">All posts</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        @include('includes._messages')
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <h1>All Posts</h1>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('posts.create') }}" class = "btn btn-lg btn-primary btn-block">Create New Post</a>
                        </div>
                        <hr>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <!--<th>#</th>-->
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th  class="col-md-2">Created At</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <!--<th> {{ $post->id }} </th>-->
                                            <td  class="lead col-md-5"> {{$post->post_title}} </td>
                                            <td class="col-md-5"> {{ mb_substr(strip_tags($post->post_description) , 0, 100) }} {{ strlen(strip_tags($post->post_description)) > 100 ? "..." : "" }}  </td>
                                            <td class="col-md-1"> {{ date('M j, Y', strtotime($post->created_at)) }} </td>
                                            <td class="col-md-1"> <a href="{{ route('posts.show', $post->id) }}" class = "btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class = "btn btn-sm btn-default">Edit</a>
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                            <div class="text-center">
                                {!! $posts->links() !!}
                            </div>

                        </div>

                    </div>

</div>
            </div>
        </div>
    </article>

    <hr>






@endsection