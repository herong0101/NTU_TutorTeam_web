<?php
/**
 * The template for displaying event archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NTU_TutorTeam_Web
 */

get_header('events');
?>

<main id="main-content" class="site-main py-12 sm:py-16 md:py-24 px-4 sm:px-6 lg:px-8 pb-20">
    <div class="mx-auto max-w-7xl">
        
        <!-- Archive Header -->
            <h1 class="font-Zen-Old-Mincho text-center text-3xl md:text-4xl font-bold text-gray-900 mb-10 tracking-tight mt-16">
                — 活動列表 —
                <?php // post_type_archive_title(); ?>
            </h1>
            
            <?php
            $post_type_object = get_post_type_object('event');
            if ($post_type_object && !empty($post_type_object->description)) :
            ?>
                <div class="archive-description text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">
                    <?php echo esc_html($post_type_object->description); ?>
                </div>
            <?php endif; ?>
        </header>

        <?php if (have_posts()) : ?>
            
            <!-- Filter Tabs (Optional: Upcoming vs Past Events) -->
            <div class="filter-tabs flex justify-center gap-4 mb-8 sm:mb-10">
                <?php
                $current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : 'all';
                $filter_options = array(
                    'all' => '全部活動',
                    'upcoming' => '即將舉辦',
                    'past' => '過往活動',
                );
                foreach ($filter_options as $key => $label) :
                    $is_active = ($current_filter === $key) ? 'active' : '';
                    $filter_url = add_query_arg('filter', $key, get_post_type_archive_link('event'));
                ?>
                    <a href="<?php echo esc_url($filter_url); ?>"
                       class="filter-btn <?php echo $is_active; ?> px-6 py-2 rounded-full font-semibold transition-all duration-300">
                        <?php echo esc_html($label); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Events Grid -->
            <div class="events-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                
                <?php while (have_posts()) : the_post(); 
                    $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                    $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                    $event_link = get_post_meta(get_the_ID(), '_event_link', true);
                    
                    // Check if event is upcoming
                    $is_upcoming = false;
                    if (!empty($event_date)) {
                        $event_timestamp = strtotime($event_date);
                        $is_upcoming = $event_timestamp >= strtotime('today');
                    }
                    
                    // Apply filter if set
                    $current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : 'all';
                    if ($current_filter === 'upcoming' && !$is_upcoming) continue;
                    if ($current_filter === 'past' && $is_upcoming) continue;
                ?>
                
                    <article id="post-<?php the_ID(); ?>" <?php post_class('event-card bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 relative'); ?>>
                        <div class="flex flex-row items-center h-full">
                            <!-- Event Thumbnail (Left) -->

                            <!-- Event Content (Right) -->
                            <div class="flex-1 py-1 px-4 sm:py-2 sm:px-6 flex flex-col h-full" style="padding-top: 1.5rem; padding-bottom: 0;">
                                <div>
                                    <!-- Event Badge (Upcoming/Past) -->
                                    <?php if (!empty($event_date)) : ?>
                                        <div class="mb-2">
                                            <?php if ($is_upcoming) : ?>
                                                <span class="inline-block px-3 py-1 bg-seed text-white text-xs font-semibold rounded-full">
                                                    即將舉辦
                                                </span>
                                            <?php else : ?>
                                                <span class="inline-block px-3 py-1 bg-gray-200 text-gray-600 text-xs font-semibold rounded-full">
                                                    已結束
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Event Title -->
                                    <h2 class="text-lg sm:text-xl font-bold line-clamp-2 hover:text-seed transition-colors">
                                        <?php the_title(); ?>
                                    </h2>

                                    <!-- Event Meta -->
                                    <div class="event-meta space-y-2 text-sm text-gray-600">
                                        <?php if (!empty($event_date)) : ?>
                                            <div class="flex items-start gap-2">
                                                <svg style="width:16px;height:16px;" class="flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <span><?php echo esc_html(date('Y年m月d日', strtotime($event_date))); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($event_location)) : ?>
                                            <div class="flex items-start gap-2">
                                                <svg style="width:16px;height:16px;" class="flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span><?php echo esc_html($event_location); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>


                                    <!-- Action Buttons -->
                                    <div class="flex gap-3 mt-2 mb-0">
                                        <?php if (!empty($event_link) && $is_upcoming) : ?>
                                            <a href="<?php echo esc_url($event_link); ?>" 
                                               target="_blank" 
                                               rel="noopener noreferrer"
                                               class="flex-1 inline-block text-center px-3 py-2 bg-seed hover:bg-orange-600 text-white font-semibold rounded-lg transition-all duration-300 text-xs sm:text-sm relative z-10">
                                                立即報名
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="w-full mt-4 mb-4 flex justify-center">
                                            <a href="<?php the_permalink(); ?>" class="inline-block min-w-[200px] px-10 py-2 bg-white text-black border border-black hover:bg-black hover:text-white font-semibold rounded-full transition-all duration-300 text-sm shadow relative z-10 text-center whitespace-nowrap">查看內容</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                
                <?php endwhile; ?>
                
            </div>

            <!-- Pagination -->
            <nav class="pagination flex justify-center mb-8" aria-label="活動分頁導航" style="margin-top: 3.5rem; margin-bottom: 2rem;">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('&laquo; 上一頁', 'ntu-tutorteam-web'),
                    'next_text' => __('下一頁 &raquo;', 'ntu-tutorteam-web'),
                    'class'     => 'flex justify-center gap-2',
                ));
                ?>
            </nav>

        <?php else : ?>
            
            <!-- No Events Found -->
            <div class="no-events text-center py-12 sm:py-16 bg-white rounded-2xl shadow-sm">
                <div class="mb-6">
                    <svg style="width:48px;height:48px;" class="mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-700 mb-3">
                    目前沒有活動
                </h2>
                <p class="text-gray-500 mb-6 max-w-md mx-auto">
                    <?php
                    $current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : 'all';
                    if ($current_filter === 'upcoming') {
                        echo '目前沒有即將舉辦的活動，請隨時關注我們的最新消息。';
                    } elseif ($current_filter === 'past') {
                        echo '目前沒有過往活動記錄。';
                    } else {
                        echo '目前沒有活動資訊，請隨時關注我們的最新消息。';
                    }
                    ?>
                </p>
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="inline-block px-8 py-3 bg-black hover:bg-gray-800 text-white font-bold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                    回到首頁
                </a>
            </div>

        <?php endif; ?>
        
</div>
        <!-- Footer Spacer -->
        <div class="h-12 sm:h-20"></div>
</main>

<?php
get_footer();
