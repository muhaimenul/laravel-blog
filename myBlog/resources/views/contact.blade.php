@extends('includes.layout')
@section('title','Contact')

@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background: url('/mblog/img/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <hr class="small">
                        <span class="subheading">Have questions? I have answers (maybe).</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Want to get in touch with me? Fill out the form below or go to my <a href="www.facebook.com/muhaimenul">Facebook</a> profile to send me a message and I will try to get back to you within 24 hours!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert" style="text-align: center">
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert" style="text-align: center">
                        <strong>Errors:</strong>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ url('contact') }}">

                    {{ csrf_field() }}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Subject</label>
                                <input type="subject" name="subject" class="form-control" placeholder="Subject" required data-validation-required-message="Please enter your Subject.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                                <textarea name="message" class="form-control" placeholder="Message" required data-validation-required-message="Please enter your Message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <input type="submit" name="submit" class="btn btn-default">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection