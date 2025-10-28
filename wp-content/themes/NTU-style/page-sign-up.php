<?php
/* Template Name: Sign Up */
get_header('sign-up');
?>

<section class="bg-gray-50 min-h-screen">
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                
                <?php
                // 查詢所有報名活動
                $args = array(
                    'post_type' => 'signup_event',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $signup_query = new WP_Query($args);
                
                if ($signup_query->have_posts()) :
                    while ($signup_query->have_posts()) : $signup_query->the_post();
                        // 取得自訂欄位
                        $registration_deadline = get_post_meta(get_the_ID(), 'registration_deadline', true);
                        $registration_url = get_post_meta(get_the_ID(), 'registration_url', true);
                        $button_text = get_post_meta(get_the_ID(), 'button_text', true);
                        $target_audience = get_post_meta(get_the_ID(), 'target_audience', true);
                        if (!$button_text) $button_text = '報名連結';
                ?>
                
                <!-- Event Box -->
                <div class="flex flex-col items-center justify-center bg-white rounded-2xl p-8 shadow-lg relative">
                    
                    <!-- Target Audience Tag -->
                    <?php if ($target_audience) : ?>
                        <div style="position: absolute; top:115px;">
                            <span class="bg-seed text-white px-4 py-1 rounded-full text-sm font-medium">
                                <?php echo esc_html($target_audience); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Title -->
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                        <?php the_title(); ?>
                    </h1>
                    
                    <!-- Meta Information -->
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center text-gray-600">
                            <span class="text-sm">報名：<?php echo esc_html($registration_deadline ? $registration_deadline : 'Coming Soon'); ?></span>
                        </div>
                    </div>
                    
                    <!-- Read Button -->
                    <div class="pt-4">
                        <?php if ($registration_url) : ?>
                            <a href="<?php echo esc_url($registration_url); ?>" target="_blank" class="bg-seed px-8 py-3 rounded-full text-white font-medium text-lg inline-block hover:bg-orange-500 transition duration-300">
                                <?php echo esc_html($button_text); ?>
                            </a>
                        <?php else : ?>
                            <button class="bg-gray-400 px-8 py-3 rounded-full text-white font-medium text-lg cursor-not-allowed">
                                <?php echo esc_html($button_text); ?>
                            </button>
                        <?php endif; ?>
                    </div>
                    
                </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <!-- 如果沒有活動，顯示提示訊息 -->
                    <div class="col-span-2 flex flex-col items-center justify-center bg-white rounded-2xl p-8 shadow-lg">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">目前沒有開放報名的活動</h2>
                        <p class="text-gray-600">請稍後再回來查看</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>