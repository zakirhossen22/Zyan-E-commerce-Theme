<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
<?php $options = get_option( 'my_framework' );  ?>
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <?php
                    $header_items = $options['header-top-left-repeater'];
                    foreach($header_items as $header_item){
                    ?>
                    <i class="<?php echo $header_item['header-top-left-icon']; ?> mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com"><?php echo $header_item['header-top-left-text']; ?></a>
                    <?php
                    }
                    ?>
                </div>
                <div>
                    <?php
                    
                    $header_socials = $options['header-top-right-repeater'];
                    foreach($header_socials as $header_social){
                    ?>
                    <a class="text-light" href="<?php echo $header_social['header-social-url']['url']; ?>" target="_blank" rel="sponsored"><i class="<?php echo $header_social['header-social-icon']; ?> fa-sm fa-fw me-2"></i></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="<?php echo site_url(); ?>">
              <?php echo $options['logo']; ?>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                   
                        <?php 
                        wp_nav_menu(array(
                            'theme_location'=> 'primary-menu',
                            'menu_class'=>'nav navbar-nav d-flex justify-content-between mx-lg-auto'
                        ));
                    ?>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <form method="get" action="<?php echo home_url( '/' ); ?>">
                   
                    <a class="nav-icon d-none d-lg-inline" href="#"
                    value="<?php echo get_search_query() ?>" name="s" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    </form>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo wc_get_cart_url(); ?>">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <?php
                        $total =  $woocommerce->cart->cart_contents_count;
                        if($total){
                            echo $total;
                        } else{
                            echo '0';
                        }
                        ?>
                        </span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?php echo do_shortcode('[user_count]'); ?></span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

