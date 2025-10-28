<?php
/**
 * Template part for displaying Partners section on the homepage
 *
 * @package NTU_TutorTeam_Web
 */

// Query partners ordered by menu_order
$partners_query = new WP_Query(array(
    'post_type'      => 'partner',
    'posts_per_page' => -1, // Get all partners
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
));

$has_partners = $partners_query->have_posts();
?>

<section class="ntu-partners-section mt-16 py-12 sm:py-16 md:py-24 pb-20 sm:pb-24 md:pb-32 px-4 sm:px-6 lg:px-8 bg-gray-50" style="padding-bottom:3rem;">
    <div class="mx-auto max-w-7xl">
        <!-- Section Header -->
        <div class="text-center mb-8 sm:mb-12 md:mb-16">
            <h2 class="font-Zen-Old-Mincho text-4xl md:text-5xl font-bold text-center mb-10 tracking-tight">— 合作夥伴 —</h2>
            <p class="text-base sm:text-lg text-gray-600">
                感謝以下單位的支持與合作
            </p>
        </div>

        <?php if ($has_partners): ?>
            <!-- Partners Row Flex -->
            <div class="flex flex-row flex-nowrap overflow-x-auto gap-8 py-2 justify-center items-center">
                <?php while ($partners_query->have_posts()): $partners_query->the_post(); ?>
                    <?php 
                    $partner_url = get_post_meta(get_the_ID(), '_partner_url', true);
                    $has_url = !empty($partner_url);
                    $tag = $has_url ? 'a' : 'div';
                    ?>
                    
                    <<?php echo $tag; ?> 
                        <?php if ($has_url): ?>
                            href="<?php echo esc_url($partner_url); ?>" 
                            target="_blank" 
                            rel="noopener noreferrer"
                        <?php endif; ?>
                        class="group flex items-center justify-center bg-white rounded-xl p-4 sm:p-6 <?php echo $has_url ? 'hover:shadow-lg hover:-translate-y-1' : 'shadow-sm'; ?> transition-all duration-300"
                        <?php if ($has_url): ?>
                            aria-label="前往 <?php echo esc_attr(get_the_title()); ?> 網站"
                        <?php endif; ?>>
                        
                        <?php if (has_post_thumbnail()): ?>
                            <div class="flex items-center justify-center h-12 w-auto px-4">
                                <?php the_post_thumbnail('partner-logo', array(
                                    'class' => 'object-contain max-h-12',
                                    'alt'   => get_the_title(),
                                    'loading' => 'lazy',
                                )); ?>
                            </div>
                        <?php else: ?>
                            <!-- Fallback for partners without logo -->
                            <div class="w-full text-center py-4">
                                <span class="text-sm sm:text-base font-bold text-gray-700">
                                    <?php the_title(); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($has_url): ?>
                            <!-- External Link Indicator (appears on hover) -->
                            <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </<?php echo $tag; ?>>
                    
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>

            <!-- Become Partner CTA -->
            <div class="flex flex-col items-center mt-6">
                <p class="text-base sm:text-lg text-gray-600 mb-2 mt-0 text-center">
                    想要與我們合作嗎？
                </p>
                <!-- Pink background, black text; keep CJK together; button centered on its own row -->
                <a href="mailto:ntututorteam@gmail.com"
                   class="inline-block mt-4 px-8 py-3 rounded-full font-bold text-lg text-black bg-gradient-to-b from-[#ffb8a8] to-[#ff9a90] border border-[#1a2533] shadow-lg hover:shadow-2xl hover:-translate-y-1 hover:brightness-110 transition-all duration-200 font-Zen-Old-Mincho whitespace-nowrap"
                   style="word-break: keep-all; overflow-wrap: normal;">
                    >聯繫我們<
                </a>
            </div>

        <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-12 sm:py-16 bg-white rounded-2xl shadow-sm">
                <div class="mb-6">
                    <svg class="w-20 h-20 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-3">
                    尋找合作夥伴中
                </h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto text-sm sm:text-base">
                    我們期待與更多優秀的單位合作，共同推動教育發展
                </p>
                <a href="mailto:ntututorteam@gmail.com" 
                   class="inline-flex items-center gap-2 px-6 sm:px-8 py-3 sm:py-4 bg-black hover:bg-gray-800 text-white font-bold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    成為合作夥伴
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
