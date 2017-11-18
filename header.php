<?php
function ob_html_compress($buf){
    return str_replace(array("\n","\r","\t",'    '),'',$buf);
}
ob_start("ob_html_compress");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        
        <?php
        if ( ! function_exists( '_wp_render_title_tag' ) ) {
            function theme_slug_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php
            }
            add_action( 'wp_head', 'theme_slug_render_title' );
        }
        ?>

        <link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.png"/>
        
        <!-- Dispositivos móviles -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  
        <!-- Bootstrap & Main Style -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>">

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <!-- Google Recaptcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
        
    </head>

    <body>
        <header class="container-fluid">
            <div class="row px-md-3 align-items-center align-items-md-start">
                <div class="col-2 white-bg py-2 text-center logo-container">
                    <a href="<?php echo home_url() ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/logo.svg" class="logo"></a>
                </div>
                <div class="col text-right">

                    <div class="row">
                        <div class="col-12">                            

                            <?php
                            /*
                             * Your dynamic WP menu
                             * edit this wisely...
                             */

                            wp_nav_menu(
                                array(
                                    'container' => 'nav',
                                    'container_class' => 'menu-principal d-none d-md-block',
                                    'theme_location' => 'main-menu'
                                )
                            );
                            ?>
                            
                            <!-- Mobile menu button -->
                            <a href="#off-canvas" class="js-offcanvas-trigger navbar-toggle collapsed white-txt d-md-none" id="canvas-trigger" data-toggle="collapse"  data-offcanvas-trigger="off-canvas" aria-expanded="false">
                                <i class="fa fa-bars menu-movil" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="c-offcanvas-content-wrap">
            
            <!-- CONTENEDOR PRINCIPAL -->
            <main>