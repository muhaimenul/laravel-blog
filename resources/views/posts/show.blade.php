@extends('includes.layout')
@section('title','Sample Post')


@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style=" background-image: url({{ asset('post_images/'. $post->image) }}) ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <section style="background:rgba(0,0,0,0.5); text-align: center;">
                        <h1>Man must explore, and this is exploration at its greatest</h1>
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</span>
                            <section>
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

                    <img src="{{ asset('post_images/'. $post->image) }}  ">

                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <h1>{{ $post->post_title }}</h1>

                            <p class="lead">{!!  $post->post_description  !!}</p>

                            <hr>

                            @foreach($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @endforeach

                        </div>



                        <div class="col-md-4" style="float:left">

                            <div class="well" >
                                <dl>
                                    <dt>URL:</dt>
                                    <dd><a href="{{ url('blog/'.$post->slug) }}"> {{ url('blog/'.$post->slug) }}</a></dd>
                                </dl>

                                <dl>
                                    <dt>Created at:</dt>
                                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                                </dl>
                                <dl>
                                    <dt>Last Updated:</dt>
                                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                                </dl>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
                                        {!! Form::submit('Delete', [ 'class'=>'btn btn-danger btn-block', 'onsubmit' => 'return ConfirmDelete()' ]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Html::linkRoute('posts.index', '<< See All', array(), array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <hr>


                </div>
            </div>

            <div class="row">
                <div id="comment-form" class="col-md-8 col-md-offset-2">
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
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '4']) }}
                            <br>
                            {{ Form::submit('Add Comment', ['class' => 'btn btn-block btn-success']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <!-- comment section-->
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    {!! Html::linkRoute('comments.edit', '', array($comment->id), array('class' => 'btn btn-primary btn-xs glyphicon glyphicon-pencil')) !!}
                                    {!! Html::linkRoute('comments.delete', '', array($comment->id), array('class' => 'btn btn-danger btn-xs glyphicon glyphicon-trash')) !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </article>

    <hr>


@endsection

@section('scripts')
    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection