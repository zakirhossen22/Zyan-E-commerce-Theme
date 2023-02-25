<?php $options = get_option( 'my_framework' );  ?>
    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo"><?php echo $options['footer-logo']; ?></h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <?php
                        $footer_adresses = $options['footer-adress'];
                        foreach($footer_adresses as $footer_adress){
                        ?>
                         <li>
                            <i class="<?php echo $footer_adress['footer-add-icon']; ?> fa-fw"></i>
                            <?php echo $footer_adress['footer-adress-text']; ?>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <?php 
                        wp_nav_menu(array(
                            'theme_location'=> 'footer-menu1',
                            'menu_class'=>'list-unstyled text-light footer-link-list'
                        ));
                    ?>
                    
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <?php 
                        wp_nav_menu(array(
                            'theme_location'=> 'footer-menu2',
                            'menu_class'=>'list-unstyled text-light footer-link-list'
                        ));
                    ?>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <?php
                        
                        $footer_socials = $options['footer-soical'];
                        foreach($footer_socials as $footer_social){
                        ?>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="<?php echo $footer_social['footer-social-url']['url']; ?>"><i class="<?php echo $footer_social['footer-social-icon']; ?> fa-lg fa-fw"></i></a>
                        </li>
                        <?php
                        }
                        
                        ?>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            <?php echo $options['footer-copyright']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    
    <?php wp_footer(); ?>
</body>

</html>