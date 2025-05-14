<?php wp_footer(); ?>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5 d-flex flex-column">
                <a href="<?php echo home_url(); ?>" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2 logo-border">Multi</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1 logo-border">Shop</span>
                </a>
                <p class="mb-4 mt-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <a href="#" class="text-secondary mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>15 Doroshenka Street, Lviv, UA</a>
                <a class="text-secondary mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</a>
                <a href="tel:+380551234567" class="text-secondary mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+38 055 123 45 67</a>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Menu</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'walker' => new Wootheme_Menu_Footer(),
                            ))
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'footer-shop',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'walker' => new Wootheme_Menu_Footer(),
                            ))
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
</body>

</html>