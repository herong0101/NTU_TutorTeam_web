<?php
/**
 * The main homepage template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NTU_TutorTeam_Web
 */

get_header();
?>

<main id="main-content" class="site-main">
    
    <?php 
    // Events Section (displays 5 recent/upcoming events)
    get_template_part('template-parts/home/section', 'events'); 
    ?>
    
    <?php 
    // Instagram Section (displays 3 latest posts from Instagram API)
    get_template_part('template-parts/home/section', 'instagram'); 
    ?>
    
    <?php 
    // Intro Section (with background image and text from Options)
    get_template_part('template-parts/home/section', 'intro'); 
    ?>

    <?php 
    // Partners Section (displays partner logos in grid)
    get_template_part('template-parts/home/section', 'partners'); 
    ?>

</main>

<?php
get_footer();
