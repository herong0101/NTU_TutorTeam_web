<?php get_header('one-article')?>

<div id="primary" class="content-area bg-gray-50 pt-24">
    <main id="main" class="site-main">

    <?php
    // Start the Loop.
    while ( have_posts() ) :
        the_post();
    ?>
        
        <!-- we can use prose -->
        <div class="prose prose-h1:text-4xl mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

    
    <?php
    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer()?>

