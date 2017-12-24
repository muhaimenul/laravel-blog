<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="https://www.facebook.com/muhaimenul">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/I-Muhaimenul">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/i_muhaimen">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Muhaimenul Islam 2017</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
{{ Html::script('mblog/vendor/jquery/jquery.min.js') }}
<!--<script src="../../../public/mblog/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
{{ Html::script('mblog/vendor/bootstrap/js/bootstrap.min.js') }}
<!--<script src="../../../public/mblog/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
{{ Html::script('mblog/js/jqBootstrapValidation.js') }}
<!--<script src="../../../public/mblog/js/jqBootstrapValidation.js"></script>-->
{{ Html::script('mblog/js/contact_me.js') }}
<!--<script src="../../../public/mblog/js/contact_me.js"></script>

<!-- Theme JavaScript -->
{{ Html::script('mblog/js/clean-blog.min.js') }}
<!--<script src="../../../public/mblog/js/clean-blog.min.js"></script>-->

<!--Parslay JS -->
{{ Html::script('js/parsley.min.js') }}

@yield('scripts')