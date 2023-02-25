

<?php 
/*
Template Name: Cart Template


*/


get_header(); ?>

<div class="container">
       <div class="row">
              <div class="col-md-12">
              <?php echo do_shortcode('[woocommerce_cart]'); ?>
              </div>
       </div>
</div>

<?php get_footer(); ?>