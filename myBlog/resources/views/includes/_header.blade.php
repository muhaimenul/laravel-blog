<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>
<link rel="icon" href="/mblog/img/icont.png">
<!-- Bootstrap Core CSS -->
{{ Html::style('mblog/vendor/bootstrap/css/bootstrap.min.css') }}
<!--<link href="../../../public/mblog/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

<!-- Theme CSS -->
{{ Html::style('mblog/css/clean-blog.min.css') }}
<!--<link href="../../../public/mblog/css/clean-blog.min.css" rel="stylesheet">-->

<!-- Custom Fonts -->
{{ Html::style('mblog/vendor/font-awesome/css/font-awesome.min.css') }}
<!--<link href="../../../public/mblog/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<!--Parslay css -->
{{ Html::style('css/parsley.css') }}


@yield('stylesheets')
