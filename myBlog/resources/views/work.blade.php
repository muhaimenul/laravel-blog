@extends('includes.layout')
@section('title','My Work')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/mblog/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/mblog/slick/slick-theme.css">
    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        .slider {
            width: 95%;
            margin: 100px auto;
        }

        .slick-slide {
            margin: 0px 15px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
            position: relative;
        }

        .slick-active {
            opacity: .5;
        }

        .slick-current {
            opacity: 1;
        }


        .slide {
            position: relative;
        }

        .slide__caption {
            display: none;
            position: absolute;
            right: 0;
            bottom: 0;
            padding: 5px;
            min-height: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            z-index: 50;
        }

        a:hover + div {
            display: block;
        }​
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background: url('/mblog/img/work-bg.jpg') no-repeat fixed center; background-size:100%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>My Works</h1>
                        <hr class="small">
                        <span class="subheading">AND ACHIEVEMENTS</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Hello. I’m <a href="https://www.facebook.com/muhaimenul">Muhaimenul Islam</a>. </p>
                <h4 class="bg-info">Here some of my works:</h4>
                <!----- Portfolio --------->
                <section class="autoplay-2 slider" style="margin-top: 30px;">
                    <div>
                        <a href="http://iutps.iutoic-dhaka.edu/" target="_blank"><img src="/mblog/slick/img/iutps.png"></a>
                        <div class="slide__caption">IUTPS</div>
                    </div>
                    <div>
                        <a href="http://rokto.000webhostapp.com/index.php" target="_blank"><img src="/mblog/slick/img/bloodbank.png"></a>
                        <div class="slide__caption">BLOOD BANK</div>
                    </div>
                    <div>
                        <a href="https://github.com/I-Muhaimenul" target="_blank"><img src="/mblog/slick/img/git.png"></a>
                        <div class="slide__caption">GITHUB</div>
                    </div>
                    <div>
                        <a href="https://miove.000webhostapp.com/" target="_blank"><img src="/mblog/slick/img/myblog.png"></a>
                        <div class="slide__caption">MY BLOG</div>
                    </div>
                </section>
                <!----- Portfolio End --------->
                <p>Some notable <strong>achievements</strong> of my life:</p>
                <ul>
                    <li class="glyphicon glyphicon-star"> 2nd runner-up in the Technology Idea Competition, DUET Techfest 2K17 </li>
                    <li class="glyphicon glyphicon-star"> Obtained 4-Years B.Sc. Scholarship from IUT-OIC </li>
                    <li class="glyphicon glyphicon-star"> Volunteer of a non-profitable social organization, MOVENCARe</li>
                </ul>
                <!-------ACHV---------->
                <section class="autoplay slider" style="margin-top: 30px; margin-bottom: 30px">
                    <div>
                        <img src="/mblog/slick/img/achv/1.jpg">
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/2.jpg">
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/3.jpg"></a>
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/4.jpg">
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/5.jpg">
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/6.jpg">
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/7.jpg"></a>
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/8.jpg">
                    </div>
                    <div>
                        <img src="/mblog/slick/img/achv/9.jpg">
                    </div>
                </section>
                <!--------ACHV END------>
                <ul>
                    <li class="glyphicon glyphicon-star"> Worked as science teacher at OMECA Admission and Academic Care</li>
                    <li class="glyphicon glyphicon-star"> Attended several Seminars and Workshops </li>
                    <li class="glyphicon glyphicon-star"> Participated, organized and volunteered for IUT National ICT Fest in 2017</li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

@endsection

@section('scripts')
    <script src="/mblog/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".lazy").slick({
                lazyLoad: 'ondemand', // ondemand progressive anticipated
                infinite: true
            });
        });

        $('.autoplay').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
        });

        $('.autoplay-2').slick({
            centerMode: true,
            centerPadding: '50px',
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2500,
        });
    </script>

@endsection
