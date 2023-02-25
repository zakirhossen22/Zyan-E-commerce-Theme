<?php get_header();


/*
Template Name:About Template

*/

$options = get_option( 'my_framework' );
?>


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



    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1><?php echo $options['abt-banner-title']; ?></h1>
                    <p>
                    <?php echo $options['abt-banner-description']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo $options['abt-banner-img']['url']; ?>" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><?php echo $options['service-section-title']; ?></h1>
                <p>
                <?php echo $options['service-section-des']; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php
            
            $services = $options['service-repeater'];
            foreach($services as $service){
            ?>
             <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="<?php echo $service['service-item-icon']; ?> fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center"><?php echo $service['service-title']; ?></h2>
                </div>
            </div>
            <?php
            }
            
            ?>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Brands -->
    <?php get_template_part( 'parts/brands'); ?>
    <!--End Brands-->


  <?php get_footer(); ?>