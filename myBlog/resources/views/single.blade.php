@extends('includes.layout')
@section('title',$post->post_title)

@section('stylesheets')

    <style>
        div.card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            padding: 10px;
        }

    </style>

    @endsection

@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style=" background-image: url({{ asset('post_images/'. $post->image) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading" >
                        <section style="background:rgba(0,0,0,0.5); text-align: center; padding-bottom: 10px;">
                        <h1 >{{ $post->post_title }}</h1>
                        <span class="meta">Posted on {{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</span>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        @include('includes._messages')
        <div class="container">
            <!-- post section-->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">

                    <div class="row card">
                        <div class="col-md-12">

                                <section style="background:rgba(0,0,0,0.3); text-align: center; padding-bottom: 10px;">
                                    <h1 >{{ $post->post_title }}</h1>
                                    <span style="font-family: 'Times New Roman', Times, serif;font-style: italic;">Posted on {{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</span>
                                </section>
                            <div style="text-align: left">
                            <p class="lead">{!!  $post->post_description  !!}</p>
                            </div>
                            <hr>

                            <div class="well">

                                <dl >
                                    <p style="float: left;"><strong>Posted in:</strong> {{ $post->category->name }}</p>
                                    @foreach($post->tags as $tag)
                                        <span class="label label-default">{{ $tag->name }}</span>
                                    @endforeach
                                </dl>


                                <dl style="margin-bottom: 40px">
                                    <p style="float: left; margin-bottom: 15px"><strong>URL:</strong> <a href="{{ url('blog/'.$post->slug) }}"> {{ url('blog/'.$post->slug) }}</a></p>
                                </dl>


                            </div>
                        </div>
                    </div>
                    <!-- post section end-->

                    <!-- comment section-->
                    <hr>
                        <div id="comment-form" >
                            <h3><span class="glyphicon glyphicon-comment"></span> {{ $post->comments->count() }} Comments</h3>
                            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                            <div class="row">
                                <div class="col-md-6">
                                    {{ Form::label('name', 'Name:') }}
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label('email', 'Email:') }}
                                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-12">
                                    {{ Form::label('comment', 'Comment:') }}
                                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3']) }}
                                    <br>
                                    {{ Form::submit('Add Comment', ['class' => 'btn btn-block btn-success']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>

                    <!-- comment section-->
                    <br>                  <hr>

                        <div>
                            @foreach($post->comments as $comment)
                                <div class="media">
                                    <div class="media-left media-top">
                                        <a href="#">
                                            <img class="media-object" src={{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=wavatar" }} alt="..." style="border-radius: 50%">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $comment->name }}</h4>
                                        <h5><small>{{ $comment->created_at->format('D d M, Y h:ia') }}</small></h5>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>


                    <!--end section-->

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