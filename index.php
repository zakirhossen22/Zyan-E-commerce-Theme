


<?php get_header(); ?>
<?php $options = get_option( 'my_framework' );  ?>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <?php
        $sliders = $options['banner-repeater'];
        $i = 0;
        foreach($sliders as $slider){
            $i++;
        ?>
         <div class="carousel-item  <?php if($i==1){echo 'active';} ?>">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo $slider['slider-image']['url']; ?>" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><?php echo $slider['slider-title']; ?></h1>
                                <h3 class="h2"><?php echo $slider['slider-sub-title']; ?></h3>
                                <p>
                                <?php echo $slider['slider-description']; ?> 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            <?php
            $cat_products = $options['category-repeater'];
            foreach($cat_products as $cat_product){
            ?>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="<?php echo $cat_product['product-btn-url']['url'];?>"><img src="<?php echo $cat_product['product-image']['url']; ?>" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3"><?php echo $cat_product['product-title'];?></h5>
                <p class="text-center"><a href="<?php echo $cat_product['product-btn-url']['url'];?>" class="btn btn-success"><?php echo $cat_product['product-btn-title'];?></a></p>
            </div>
            <?php
            }
            ?>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">

            <?php
                // Setup your custom query
                $args = array(

                'post_type' => 'product',
                'posts_per_page'=>3
                );
                $query = new WP_Query( $args );
                if($query->have_posts()){
                while ($query->have_posts()) : $query->the_post();
                ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo get_permalink($product_id)  ?>">
                            <img src="<?php echo wp_get_attachment_url($product->get_image_id());  ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                   <?php echo $product->get_rating_count(); ?>
                                </li>
                                <li class="text-muted text-right"><?php echo  $product->get_price_html(); ?></li>
                            </ul>
                            <a href="<?php echo get_permalink($product_id)  ?>" class="h2 text-decoration-none text-dark"><?php echo $product->get_name(); ?></a>
                            <p class="card-text">
                            <?php echo $product->get_description(); ?>
                            </p>
                            <p class="text-muted">Reviews (<?php echo $product->get_review_count(); ?>)</p>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                } else{
                echo __('No products found');
                }
                wp_reset_postdata();  
                ?>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

<?php get_footer(); ?>