<?php
defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="col-12">
    <?php do_action( 'woocommerce_before_single_product' ); ?>
</div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'col-12 product-card', $product ); ?>>

    <div class="row">

        <div class="col-lg-5 mb-30">

            <?php do_action( 'woocommerce_before_single_product_summary' ); ?>

        </div><!-- ./col-lg-5 mb-30 -->

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30 product-card-content">
                <?php woocommerce_show_product_sale_flash(); ?>
                <?php do_action( 'woocommerce_single_product_summary' ); ?>
            </div><!-- ./h-100 bg-light p-30 -->
        </div><!-- ./col-lg-5 mb-30 -->

    </div><!-- ./row -->

    <div class="row product-additional">
        <div class="col">
            <div class="bg-light p-30">
                <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
            </div><!-- ./bg-light p-30 -->
        </div><!-- ./col -->
    </div><!-- ./row product-additional -->

    <?php woocommerce_upsell_display() ?>

</div><!-- ./product-card -->
<?php do_action( 'woocommerce_after_single_product' ); ?>
