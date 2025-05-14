<?php get_header(); ?>

    <div class="wootheme-search">
        <div class="wootheme-search__container wootheme-container">
            <h1 class="wootheme-search__title">Search Results for: "<?php echo get_search_query(); ?>"</h1>
            <?php if ( have_posts() ) : ?>
                <div class="wootheme-search__results">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article class="wootheme-search__result" id="post-<?php the_ID(); ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a class="wootheme-search__result-image" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('landscape-md'); ?>
                                </a>
                            <?php endif; ?>
                            <div class="wootheme-search__result-content">
                                <h2 class="wootheme-search__result-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p class="wootheme-search__result-meta">
                                    <time class="wootheme-search__result-time" datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date('F j, Y'); ?>
                                    </time>
                                    By 
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="wootheme-search__result-author-link"><?php the_author(); ?></a>
                                    <?php edit_post_link('(Edit)', '', '', get_the_ID(), 'wootheme-search__result-edit'); ?>
                                </p>
                                <div class="wootheme-search__result-excerpt">
                                <?php
                                    $excerpt = get_the_excerpt();
                                    $trimmed_excerpt = wp_trim_words($excerpt, 40, '...');
                                    echo $trimmed_excerpt;
                                ?>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <div class="wootheme-search__pagination">
                        <?php
                        the_posts_pagination([
                            'prev_text' => '« Previous Page',
                            'next_text' => 'Next Page »',
                        ]);
                        ?>
                    </div>
                </div>
            <?php else : ?>
                <p>No results found</p>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>