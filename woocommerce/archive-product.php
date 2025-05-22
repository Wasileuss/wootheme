<?php get_header('shop'); ?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<?php do_action('woocommerce_before_main_content'); ?>
<?php do_action('woocommerce_sidebar'); ?>

<!-- Shop Start -->
<div class="col-lg-9 col-md-8">
    <div class="row pb-3">

        <div class="col-12">
            <header class="woocommerce-products-header">
                <?php if (apply_filters('woocommerce_show_page_title', true)): ?>
                    <h1
                        class="woocommerce-products-header__title page-title section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3"><?php woocommerce_page_title(); ?></span>
                    </h1>
                <?php endif; ?>
                <div class="mb-4">
                    <?php woocommerce_output_all_notices(); ?>
                </div>
                <?php do_action('woocommerce_archive_description'); ?>

            </header>
        </div><!-- ./col-12 -->

        <?php
        if (woocommerce_product_loop()) {
            ?>
            <div class="col-12 mb-4">
                <div class="d-flex aline-items-center justify-content-between">
                    <?php do_action('woocommerce_before_shop_loop'); ?>
                </div>
            </div>

            <?php
            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();

                    do_action('woocommerce_shop_loop');

                    wc_get_template_part('content', 'product');
                }
            }

            woocommerce_product_loop_end();

            do_action('woocommerce_after_shop_loop');
        } else {
            do_action('woocommerce_no_products_found');
        }
        ?>
    </div><!-- ./row pb-3 -->
</div><!-- ./col-lg-9 col-md-8 -->
<!-- Shop End -->

<?php do_action('woocommerce_after_main_content'); ?>

<?php get_footer('shop'); ?>