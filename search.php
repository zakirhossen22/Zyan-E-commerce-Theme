<?php

get_header();


 ?>

     <section class="search-page">
     <div class="container">
       <div class="row">
       <?php
       while ( have_posts() ) { the_post();
       ?>
       <div class="col-lg-4">
       <?php
       wc_get_template_part( 'content', 'product' );
       
       ?>
</div>
    <?php 
    } 
    ?>   
       </div>
       </div>
    
     </section>
    
 <?php get_footer();