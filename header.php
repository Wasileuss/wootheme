<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <?php wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'd-inline-flex align-items-center h-100 menu-primary',
                    )); 
                ?>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group pr-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                            <?php echo is_user_logged_in() ? 'My Account' : 'Login / Register'; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if ( is_user_logged_in() ) : ?>
                                <a class="dropdown-item" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                                    Account
                                </a>
                                <a class="dropdown-item" href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">
                                    Logout
                                </a>
                            <?php else : ?>
                                <a class="dropdown-item" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
                                    Login
                                </a>
                                <a class="dropdown-item" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>#register">
                                    Register
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">UA</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center woocommerce-cart-fragments">
                    <a href="<?php echo wc_get_cart_url(); ?>" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="cart-count count badge text-dark border border-dark rounded-circle">
                            <?php echo WC()->cart->get_cart_contents_count(); ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="<?php echo home_url(); ?>" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
            <?php aws_get_search_form( true ); ?>
                <!-- <form  method="get" action="<?php //echo esc_url(home_url('/')); ?>">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products" name="s" value="<?php //echo esc_attr(get_search_query()); ?>">
                        <button type="submit" class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </button>
                    </div>
                </form> -->
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <a href="tel:+380551234567" class="m-0">+38 055 123 45 67</a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'category',
                            'container' => false,
                            'items_wrap' => '%3$s',
                            'walker' => new Wootheme_Menu_Categories(),
                        ))
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="<?php echo home_url(); ?>" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'navbar',
                            'container' => false,
                            'items_wrap' => '%3$s',
                            'walker' => new Wootheme_Menu_Navbar(),
                        ))
                        ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->