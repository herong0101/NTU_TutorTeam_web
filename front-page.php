<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();?>

<section class="flex flex-col items-center justify-center" style="margin-top:160px">
    <div class="relative text-center">
        <h1 class="font-Zen-Old-Mincho font-bold px-3 py-2 text-6xl text-black">近期活動</h1>
        <!-- date, event, link -->
        <!-- <div class="flex flex-col items-start justify-center space-y-4 mt-4"> -->
            <ul class="flex flex-col space-y-4 max-w-none max-h-none w-[800px] h-[300px] p-6 bg-gradient-to-br from-white to-seed shadow-md rounded-2xl border border-gray-200 overflow-hidden my-12">
                <!-- Document preview area -->
                <li class="flex flex-row space-x-4 items-center justify-center mt-6">
                    <p class="text-gray-700 mb-4 text-left">2025/07/02</p>
                    <p class="text-gray-700 mb-4 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing e</p>
                    <a class="text-gray-700 mb-4 text-left" href="https://tailwindcss.com/">tailwind官方文件</a>
                </li>
                <li class="flex flex-row space-x-4 items-center justify-center">
                    <p class="text-gray-700 mb-4 text-left">2025/07/02</p>
                    <p class="text-gray-700 mb-4 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing e</p>
                    <a class="text-gray-700 mb-4 text-left" href="https://tailwindcss.com/">tailwind官方文件</a>
                </li>
                <li class="flex flex-row space-x-4 items-center justify-center">
                    <p class="text-gray-700 mb-4 text-left">2025/07/02</p>
                    <p class="text-gray-700 mb-4 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing e</p>
                    <a class="text-gray-700 mb-4 text-left" href="https://tailwindcss.com/">tailwind官方文件</a>
                </li>
                <div class="flex justify-center space-x-4">
                    <a href="<?php echo home_url('/events/'); ?>"><button type="button" class="bg-opacity-0 text-black rounded-full text-lg px-8 py-3 text-center hover:bg-hero-gray transition duration-300">更多活動</button></a>
                </div>
            </ul>
        <!-- </div> -->
    </div>
</section>

<section class="flex flex-col items-center justify-center" style="margin-top:160px">
    <div class="relative text-center">
        <h1 class="font-Zen-Old-Mincho font-bold px-3 py-2 text-6xl text-black">最新消息</h1>
        <!-- date, event, link -->
        
        <div class="flex flex-row items-stretch justify-center space-x-6 my-12">
            <?php
            $left_post = get_latest_instagram_post('left');
            $mid_post = get_latest_instagram_post('mid');
            $right_post = get_latest_instagram_post('right');
            ?>
            <!-- Left Box -->
            <div class="w-[320px] h-auto bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Image Area (4:5 aspect ratio for more height) -->
                <div class="w-full aspect-[4/5] bg-gray-200 overflow-hidden">
                    <img src="<?php echo $left_post ? esc_url($left_post->image_path) : 'http://wp.local/wp-content/uploads/2025/07/報名計畫_裁切.png'; ?>" alt="Sample" class="object-cover w-full h-full" />
                </div>
                <!-- Content Area -->
                <div class="p-4">
                    <!-- Social Icons -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex space-x-4">
                            <!-- Like Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <!-- Comment Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </button>
                            <!-- Share Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="text-sm text-gray-800 leading-relaxed text-left">
                        <?php echo $left_post ? esc_html($left_post->text) : 'Sample Content'; ?>
                    </div>
                </div>
            </div>

            <!-- Middle Box -->
            <div class="w-[320px] h-auto bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Image Area (4:5 aspect ratio for more height) -->
                <div class="w-full aspect-[4/5] bg-gray-200 overflow-hidden">
                    <img src="<?php echo $mid_post ? esc_url($mid_post->image_path) : 'http://wp.local/wp-content/uploads/2025/07/報名計畫_裁切.png'; ?>" alt="Sample" class="object-cover w-full h-full" />
                </div>
                <!-- Content Area -->
                <div class="p-4">
                    <!-- Social Icons -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex space-x-4">
                            <!-- Like Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <!-- Comment Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </button>
                            <!-- Share Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="text-sm text-gray-800 leading-relaxed text-left">
                        <?php echo $mid_post ? esc_html($mid_post->text) : 'Sample Content'; ?>
                    </div>
                </div>
            </div>
            
            <!-- Right Box -->
            <div class="w-[320px] h-auto bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Image Area (4:5 aspect ratio for more height) -->
                <div class="w-full aspect-[4/5] bg-gray-200 overflow-hidden">
                    <img src="<?php echo $right_post ? esc_url($right_post->image_path) : 'http://wp.local/wp-content/uploads/2025/07/報名計畫_裁切.png'; ?>" alt="Sample" class="object-cover w-full h-full" />
                </div>
                <!-- Content Area -->
                <div class="p-4">
                    <!-- Social Icons -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex space-x-4">
                            <!-- Like Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <!-- Comment Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </button>
                            <!-- Share Icon -->
                            <button class="hover:opacity-60 transition-opacity">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="text-sm text-gray-800 leading-relaxed text-left">
                        <?php echo $right_post ? esc_html($right_post->text) : 'You find an Easter egg!'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 計畫特色 -->
<section class="flex flex-col items-center justify-center" style="margin-top:160px">
    <div class="relative text-center">
        <h1 class="font-Zen-Old-Mincho font-bold px-3 py-2 text-6xl text-black">計畫特色</h1>
        
        <div class="relative flex justify-center items-start" style="height: 320px; margin-top:80px">
            <!-- Left rectangle (lowered by 80px) -->
            <div class="absolute left-1/2 transform -translate-x-[80%] top-[120px] w-[400px] h-[250px] bg-yellow-200 rounded-2xl shadow-lg flex flex-col items-center justify-center z-10">
                <h2 class="font-bold text-2xl mb-2">工作坊</h2>
                <p class="text-base text-gray-700">邀請專業人士、教授進行科系、備審、面試等工作坊。</p>
            </div>
            <!-- Right rectangle (higher, crosses left at center) -->
            <div class="absolute left-1/2 transform -translate-x-[10%] -top-5 w-[400px] h-[250px] bg-blue-200 rounded-2xl shadow-lg flex flex-col items-center justify-center z-20">
                <h2 class="font-bold text-2xl mb-2">升學課程</h2>
                <p class="text-base text-gray-700">提供升大學之總複習課程以及高中各學科解題群組。</p>
            </div>
        </div>

        <div class="flex flex-row items-center justify-center text-5xl" style="margin-top:20px">
            <span class="font-Zen-Old-Mincho font-bold text-4xl text-black">已免費服務超過</span>
            <div id="counter" class="mx-2 text-4xl text-black"></div>
            <span class="font-Zen-Old-Mincho font-bold text-4xl text-black">位高中學員</span>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const el = document.getElementById('counter');
                const duration = 1000; // 1 second
                const end = 1200;
                const start = 0;
                const startTime = performance.now();

                function animate(now) {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const value = Math.floor(progress * (end - start) + start);
                    el.textContent = value;
                    if (progress < 1) {
                        requestAnimationFrame(animate);
                    } else {
                        el.textContent = end;
                    }
                }
                requestAnimationFrame(animate);
            });
        </script>
        
    </div>
</section>
<?php


/* Start the Loop */
// while ( have_posts() ) :
	
// 	the_post();
// 	get_template_part( 'template-parts/content/content-page' );

// 	// If comments are open or there is at least one comment, load up the comment template.
// 	if ( comments_open() || get_comments_number() ) {
// 		comments_template();
// 	}
// endwhile; // End of the loop.

get_footer();
