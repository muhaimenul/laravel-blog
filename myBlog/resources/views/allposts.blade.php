@extends('includes.layout')
@section('title','All Posts')


@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/mblog/img/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>All Posts</h1>
                        <h2 class="subheading"></h2>
                        <span class="meta"></span>
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
                <div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">

                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($posts as $post)
                                <div class="post-preview">
                                    <a href="{{ url('blog/'.$post->slug) }}">
                                        <h2 class="post-title">
                                            {{ $post->post_title }}
                                        </h2>
                                        <h3 class="post-subtitle">
                                            {{ mb_substr(strip_tags($post->post_description) , 0, 220) }} {{ strlen(strip_tags($post->post_description)) > 220 ? "..." : "" }}
                                        </h3>
                                    </a>
                                    <p class="post-meta">Posted <!--by <a href="#">Start Bootstrap</a>--> on {{ date('M j, Y', strtotime($post->created_at)) }} <span><a href="{{ url('blog/'.$post->slug) }}" style="float:right; text-decoration: none;" class = "btn btn-info btn-sm">Read more</a></span></p>
                                </div>
                                <hr>
                            @endforeach

                            <div class="text-center">
                                {!! $posts->links() !!}
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-2 col-lg-offset-1 col-md-10 col-md-offset-1">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Categories</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><a href=" {{url('catposts/'.$category->id) }}">{{ $category->name }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </article>

    <hr>






@endsection