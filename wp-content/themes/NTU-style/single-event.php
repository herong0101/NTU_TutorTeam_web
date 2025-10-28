<?php
/**
 * The template for displaying single events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NTU_TutorTeam_Web
 */

// Note: No get_header() call - events display without site header
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-50'); ?>>
<?php wp_body_open(); ?>

<main id="main-content" class="site-main min-h-screen">
    
    <?php while (have_posts()) : the_post(); 
        // Get event meta data
        $event_date = get_post_meta(get_the_ID(), '_event_date', true);
        $event_location = get_post_meta(get_the_ID(), '_event_location', true);
        $event_link = get_post_meta(get_the_ID(), '_event_link', true);
        
        // Check if event is upcoming
        $is_upcoming = false;
        if (!empty($event_date)) {
            $event_timestamp = strtotime($event_date);
            $is_upcoming = $event_timestamp >= strtotime('today');
        }
    ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class('event-single'); ?>>
        
        <!-- Featured Image Hero -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="event-hero w-full flex items-center justify-center bg-gray-900 py-6 sm:py-10">
                <?php the_post_thumbnail('event-featured', array(
                    'class' => 'max-h-[40vh] w-auto h-auto object-contain opacity-90 mx-auto',
                )); ?>
                <!-- Overlay Gradient (可選，若不想要可移除) -->
                <div class="absolute inset-0 pointer-events-none bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            </div>
        <?php endif; ?>

        <!-- Event Content -->
        <div class="event-content py-12 sm:py-16 md:py-20 lg:py-24 px-5 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-5xl">
                


                <!-- Event Meta Card -->
                <div class="event-meta-card bg-white rounded-2xl shadow-lg p-8 sm:p-10 mb-10 sm:mb-12">
                    <!-- Event Title and Status Badge (moved here) -->
                    <div class="mb-8 flex flex-col gap-4">
                        <?php if (!empty($event_date)) : ?>
                            <div>
                                <?php if ($is_upcoming) : ?>
                                    <span class="inline-block px-10 py-3.5 bg-seed text-white text-base font-semibold rounded-full shadow-lg">
                                        即將舉辦
                                    </span>
                                <?php else : ?>
                                    <span class="inline-block px-10 py-3.5 bg-seed text-white text-sm font-semibold rounded-full shadow-lg">
                                        已結束
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <h1 class="font-Zen-Old-Mincho font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-black leading-tight">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold mb-8 text-black border-b-2 border-gray-100 pb-4">活動資訊</h2>
                    <div class="space-y-6">
                        <?php if (!empty($event_date)) : ?>
                            <div class="flex items-start gap-5 p-5 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="flex-shrink-0 w-14 h-14 bg-seed/10 rounded-xl flex items-center justify-center">
                                    <svg class="w-7 h-7 text-seed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm text-gray-500 mb-2 font-medium">活動日期</div>
                                    <div class="text-base sm:text-lg font-bold text-black">
                                        <?php echo esc_html(date('Y年m月d日 (l)', strtotime($event_date))); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($event_location)) : ?>
                            <div class="flex items-start gap-5 p-5 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="flex-shrink-0 w-14 h-14 bg-seed/10 rounded-xl flex items-center justify-center">
                                    <svg class="w-7 h-7 text-seed" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm text-gray-500 mb-2 font-medium">活動地點</div>
                                    <div class="text-base sm:text-lg font-bold text-black">
                                        <?php echo esc_html($event_location); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($event_link) && $is_upcoming) : ?>
                            <div class="pt-6 mt-6 border-t-2 border-gray-200">
                                <a href="<?php echo esc_url($event_link); ?>" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center gap-3 px-8 py-4 bg-seed hover:bg-orange-600 text-white font-bold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 w-full sm:w-auto justify-center text-base">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    立即報名參加
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Event Description -->
                <div class="event-description bg-white rounded-2xl shadow-lg p-8 sm:p-10 mb-10 sm:mb-12">
                    <h2 class="text-xl sm:text-2xl font-bold mb-8 text-black border-b-2 border-gray-100 pb-4">活動內容</h2>
                    <div class="prose prose-lg max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Event Navigation -->
                <nav class="event-navigation bg-white rounded-2xl shadow-lg p-6 sm:p-8 flex flex-col sm:flex-row gap-4 justify-between items-stretch sm:items-center">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <div class="flex-1">
                        <?php if ($prev_post) : ?>
                            <a href="<?php echo get_permalink($prev_post); ?>" 
                               class="group flex items-center gap-4 p-5 bg-gray-50 hover:bg-seed/10 rounded-xl transition-all duration-300 border-2 border-transparent hover:border-seed">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-seed transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs text-gray-500 mb-1.5 font-medium">上一個活動</div>
                                    <div class="font-bold text-sm sm:text-base text-black group-hover:text-seed transition-colors line-clamp-1">
                                        <?php echo get_the_title($prev_post); ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex-shrink-0 flex justify-center">
                        <a href="<?php echo get_post_type_archive_link('event'); ?>" 
                           class="px-8 py-4" style="background-color: #f37f65; color: #111; border-radius: 0.75rem; font-weight: bold; font-size: 1rem; text-align: center; border: none;">
                            返回活動列表
                        </a>
                    </div>
                    
                    <div class="flex-1">
                        <?php if ($next_post) : ?>
                            <a href="<?php echo get_permalink($next_post); ?>" 
                               class="group flex items-center gap-4 p-5 bg-gray-50 hover:bg-seed/10 rounded-xl transition-all duration-300 justify-end text-right border-2 border-transparent hover:border-seed">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-seed transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <div class="flex-1 min-w-0">
                                    <div class="text-xs text-gray-500 mb-1.5 font-medium">下一個活動</div>
                                    <div class="font-bold text-sm sm:text-base text-black group-hover:text-seed transition-colors line-clamp-1">
                                        <?php echo get_the_title($next_post); ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </nav>

            </div>
        </div>

    </article>
    
    <?php endwhile; ?>

</main>

<?php wp_footer(); ?>
</body>
</html>
<?php
// Note: No get_footer() call - events display without site footer
