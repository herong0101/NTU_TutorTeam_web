<?php get_header('one-article')?>

<div id="primary" class="content-area bg-gray-50">
    <main id="main" class="site-main">

    <?php
    // Start the Loop.
    while ( have_posts() ) :
        the_post();
    ?>
        
        <div>
            <h1><?php the_title("%", "%", true); ?></h1>
            <?php the_content(); ?>
        </div><!-- .entry-content -->

    
    <?php
    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer()?>

<!-- image part -->
<header class="entry-header alignwide">
                <h1 class="entry-title"><?php //the_title(); ?></h1>
                <?php //if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php //the_post_thumbnail('large'); ?>
                    </div>
                <?php //endif; ?>
            </header><!-- .entry-header -->