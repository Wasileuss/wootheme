<?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="container-fluid py-5">
        <div class="row px-xl-5">
        <h1 class="section-title mb-4 px-4"><?php the_title();?></h1>
        <div class="col-lg-12 px-4"><?php the_content(); ?></div>
        </div>
    </section>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>