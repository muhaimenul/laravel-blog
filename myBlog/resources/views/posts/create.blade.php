@extends('includes.layout')
@section('title','Create Post')

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
                        <h2 class="subheading">Create new blog post here</h2>
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

                <h3>Write your blog here...</h3>
                    {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true ]) !!}

                    <div class="panel-body form-horizontal payment-form">

                        <div class="form-group">
                            <!--<label for="post_title" class="col-sm-3 control-label">Title</label>-->
                            {{ Form::label('post_title', 'Title' , ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                <!--<input type="text" class="form-control" id="post_title" name="post_title">-->
                                {{ Form::text('post_title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <!--<label for="slug" class="col-sm-3 control-label">Slug</label>-->
                            {{ Form::label('slug', 'Slug' , ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                <!--<input type="text" class="form-control" id="post_title" name="slug">-->
                                {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('category_id', 'Category' , ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('tags', 'Tags' , ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                <select class="form-control  select2-multi" name="tags[]"  multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <!--<label for="post_description" class="col-sm-3 control-label">Description</label>-->
                            {{ Form::label('post_description', 'Description' , ['class' => 'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                <!--<textarea class="form-control" name="post_description" id="description" rows="8"></textarea>-->
                            {{ Form::textarea('post_description', null, ['class' => 'form-control' ,  'rows' => '8']) }}
                               <!-- <input type="text" class="form-control" id="description" name="description">-->
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="post_image" class="col-sm-3 control-label">Image</label> -->
                            {{ Form::label('post_image', 'Image' , ['class' => 'col-sm-3 control-label']) }}
                           <div class="col-sm-9">
                      <!--          <input type="file" class="form-control" accept="image/*" id="amount" name="post_image"> -->
                                {{ Form::file('post_image', ['class' => 'form-control' ,  'accept' => 'image/*']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <!--<button type="button" class="btn btn-default preview-add-button">
                                    <span class="glyphicon glyphicon-plus"></span> Add
                                </button>-->
                                {{ Form::submit('Post', ['class' => 'btn btn-default preview-add-button'] ) }}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}



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
    </script>
@endsection
