@extends('includes.layout')
@section('title','Edit Post')

@section('stylesheets')
    <!-- For tinymce -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code lists advlist',
            menubar: false
        });
    </script>

    {!! Html::style('dist/css/select2.min.css') !!}
@endsection


@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/mblog/img/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>Admin Panel</h1>
                        <h2 class="subheading">You can edit your post here</h2>
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
                    @include('includes._messages')
                    <div class="row">

                        <!--for updating form method should be explicitley given PUT-->
                        {!! Form::model($post, ['route' => [ 'posts.update', $post->id ], 'method'=>'PUT', 'data-parsley-validate' => '', 'files' => true ]) !!}

                        <div class="col-md-8">
                            {{ Form::label('post_title', 'Title:' , ['class' => 'control-label']) }}
                            {{ Form::text('post_title',null, ["class"=>'form-control input-lg' , 'required' => '', 'maxlength' => '255'])  }}

                            <br>
                            {{ Form::label('slug', 'Slug:' , ['class' => 'control-label']) }}
                            {{ Form::text('slug',null, ["class"=>'form-control input-lg' , 'required' => '','minlength' => '5', 'maxlength' => '255'])  }}

                            <br>
                            {{ Form::label('post_image', 'Update Image:' , ['class' => 'control-label']) }}
                            {{ Form::file('post_image', ['class' => 'form-control' ,  'accept' => 'image/*']) }}

                            <br>
                            {{ Form::label('category_id', 'Category:' , ['class' => 'control-label']) }}
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control ']) }}

                            <br>
                            {{ Form::label('tags', 'Tags:' , ['class' => 'control-label']) }}
                            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple' ]) }}

                            <br>
                            {{ Form::label('post_description', 'Description:' , ['class' => 'control-label']) }}
                            <p class="lead">{{ Form::textarea('post_description',null, ["class"=>'form-control', 'required' => '']) }}</p>
                        </div>

                        <div class="col-md-4" style="float:left">

                            <div class="well" >
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
                                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                                    </div>
                                    <div class="col-sm-6">
                                        <!--for updating there will be submit button not linking button-->
                                        {{ Form::submit('Save',['class' => 'btn btn-success btn-block']) }}
                                    </div>
                                </div>

                            </div>
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </article>

    <hr>


@endsection

@section('scripts')
    {!! Html::script('dist/js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection