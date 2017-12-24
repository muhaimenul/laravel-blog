@extends('includes.layout')
@section('title','Home')

@section('stylesheets')
    <style>
        .parallax{
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /**background-attachment: scroll;  for disable this feature**/
        }
    </style>
@endsection

@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header parallax" style="background-image: url('/mblog/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Welcome to my Blog</h1>
                        <hr class="small">
                        <span class="subheading">Thank you so much for visiting. This is my test website Fueled by Laravel. Here some of the recent posts. Feel free to look around.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->



            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" style="text-align:center;">
                        <h4 class="alert-heading">{{ session('status') }}</h4>
                        <hr>
                        <p>You're successfully logged in!</p>
                    </div>
                @endif
            </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
                @foreach($posts as $post)

                    <div class="media-left media-middle">
                        <a href="{{ url('blog/'.$post->slug) }}">
                            <img class="media-object" src="{{ 'post_images/'.$post->image }}" alt="" style="width:100px;height:100px;">
                        </a>
                    </div>
                    <div class="post-preview media-body">
                        <a href="{{ url('blog/'.$post->slug) }}">
                            <h2 class="post-title">
                                {{ $post->post_title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ mb_substr(strip_tags($post->post_description) , 0, 220) }} {{ strlen(strip_tags($post->post_description)) > 220 ? "..." : "" }}
                            </h3>
                        </a>
                        <p class="post-meta">Posted <!--by <a href="#">Start Bootstrap</a>--> on {{ date('M j, Y', strtotime($post->created_at)) }}</p>
                    </div>


                    <hr>
                @endforeach

                <!-- Pager -->
                <!--<ul class="pager">
                    <li class="next">
                        {{-- $posts->links()  --}}
                        <!--<a href="#">Older Posts &rarr;</a>-->
                    <!--</li>
                </ul>-->

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

@endsection