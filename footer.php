                <footer class="container-fluid">

                </footer>

            </main><!-- Main content ends -->

        </div>

        <!-- Mobile menu -->
        <aside class="js-offcanvas is-closed c-offcanvas--right" data-offcanvas-options='{ "modifiers": "right,overlay" }' id="off-canvas">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-right">
                        <a href="#off-canvas" class="js-offcanvas-trigger mb-3 d-block" data-toggle="collapse"  data-offcanvas-trigger="off-canvas" aria-expanded="false">
                            <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-12 menu-movil">

                        <!-- You actual menu is automatically cloned and appended here, check js/app.js -->
                    </div>
                </div>
            </div>
        </aside>
        <!-- Mobile menu ends -->
        
        <!-- Bootstrap -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <!-- OffCanvas -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
        <script src="https://npmcdn.com/js-offcanvas@1.0/dist/_js/js-offcanvas.pkgd.min.js"></script>
        <link rel="stylesheet" href="https://npmcdn.com/js-offcanvas@1.0/dist/_css/minified/js-offcanvas.css">

        <!-- Fuentes -->
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Passion+One:400,700|Quicksand:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        
        <!-- Swiper -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/css/swiper.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/js/swiper.min.js"></script>

        <!-- Fancybox -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" integrity="sha256-7TyXnr2YU040zfSP+rEcz29ggW4j56/ujTPwjMzyqFY=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js" integrity="sha256-wzoq0P7w2qLzRcJsF319y6G9Oilk3nU5CZ8tnY9TjFI=" crossorigin="anonymous"></script>

        <!-- Waypoints -->
        <script src="<?php echo get_template_directory_uri() ?>/js/third-party/jquery.waypoints.min.js"></script>

        <!-- Animations on scroll -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/animations.css">
        <script src="<?php echo get_template_directory_uri() ?>/js/third-party/css3-animate-it.min.js"></script>

        <!-- App -->
        <script src="<?php echo get_template_directory_uri() ?>/js/app.min.js"></script>

        <?php wp_footer(); ?>

    </body>
</html>
<?php
ob_end_flush();
?>