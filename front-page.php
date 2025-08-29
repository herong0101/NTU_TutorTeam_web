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

<!-- <section class="flex flex-col items-center justify-center" style="margin-top:160px">
    <div class="relative text-center">
        <h1 class="font-Zen-Old-Mincho font-bold px-3 py-2 text-6xl text-black">近期活動</h1>
            <ul class="flex flex-col space-y-4 max-w-none max-h-none w-[800px] h-[300px] p-6 bg-gradient-to-br from-white to-seed shadow-md rounded-2xl border border-gray-200 overflow-hidden my-12">
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
                    <a href="<?php //echo home_url('/events/'); ?>"><button type="button" class="bg-opacity-0 text-black rounded-full text-lg px-8 py-3 text-center hover:bg-seed-gray transition duration-300">更多活動</button></a>
                </div>
            </ul>
    </div>
</section> -->

<section class="flex flex-col items-center justify-center py-24">
    <div class="relative text-center">
        <h1 class="font-Zen-Old-Mincho font-bold px-3 py-2 text-6xl text-black">最新消息</h1>
        
        <div class="flex flex-row items-stretch justify-center space-x-6 my-12">
            <?php
            $left_post = get_latest_instagram_post('left');
            $mid_post = get_latest_instagram_post('mid');
            $right_post = get_latest_instagram_post('right');
            ?>
            <!-- Left Box -->
            <a href="<?php echo $left_post ? esc_url($left_post->link) : "https://www.example.com/" ?>">
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
            </a>
            <!-- Middle Box -->
            <a href="<?php echo $mid_post ? esc_url($mid_post->link) : "https://www.example.com/" ?>">
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
            </a>
            
            <!-- Right Box -->
             <a href="<?php echo $right_post ? esc_url($right_post->link) : "https://www.example.com/" ?>">
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
            </a>
        </div>
    </div>
</section>

<!-- 計畫特色 -->
<section class="flex flex-col items-center justify-center py-24">
    <div class="relative text-center">
        <h1 class="font-Zen-Old-Mincho font-bold px-3 py-2 text-6xl text-black">計畫特色</h1>
        
        <div class="flex flex-col md:flex-row gap-8 justify-center items-start mt-20 max-w-4xl mx-auto">
            <!-- Card 1: 工作坊 -->
            <div class="w-full md:w-1/2 bg-seed-orange rounded-2xl shadow-lg p-8 text-center">
                <h2 class="font-bold text-3xl mb-4">工作坊</h2>
                <p class="text-base text-gray-700">邀請專業人士、教授來到工作坊分享：</p>
                <div class="rounded-2xl bg-gray-50 p-8 h-16 mx-2 my-4 flex items-center justify-center">
                    <span class="text-black text-xl">科系介紹</span>
                </div>
                <div class="rounded-2xl bg-gray-50 p-8 h-16 mx-2 my-4 flex items-center justify-center">
                    <span class="text-black text-xl">備審準備</span>
                </div>
                <div class="rounded-2xl bg-gray-50 p-8 h-16 mx-2 my-4 flex items-center justify-center">
                    <span class="text-black text-xl">面試心法</span>
                </div>
            </div>
            <!-- Card 2: 升學課程 -->
            <div class="w-full md:w-1/2 bg-seed-gray rounded-2xl shadow-lg p-8 text-center">
                <h2 class="font-bold text-3xl mb-4">升學課程</h2>
                <p class="text-base text-gray-700">學科方面也提供紮實資源：</p>
                <div class="rounded-2xl bg-gray-50 p-8 h-16 mx-2 my-4 flex items-center justify-center">
                    <span class="text-black text-xl">總複習課程</span>
                </div>
                <div class="rounded-2xl bg-gray-50 p-8 h-16 mx-2 my-4 flex items-center justify-center">
                    <span class="text-black text-xl">各學科解題群組</span>
                </div>
            </div>
        </div>

        <div class="mt-24">
            <div class="flex flex-row items-center justify-center text-5xl">
                <span class="font-Zen-Old-Mincho font-bold text-black">已免費服務超過</span>
                <div id="counter" data-target="1200" class="mx-2 text-black">0</div>
                <span class="font-Zen-Old-Mincho font-bold text-black">位高中學員</span>
            </div>
            <div class="flex flex-row items-center justify-center text-5xl mt-5">
                <span class="font-Zen-Old-Mincho font-bold text-black">讓他們在升學的路上不孤單</span>
            </div>
        </div>
    </div>
</section>

<!-- 協力組織 -->
<section class="flex flex-col items-center justify-center py-24">
    <div class="relative text-center">
        <h1 class="font-Zen-Old-Mincho font-bold px-3 py-2 text-6xl text-black">協力組織</h1>
        
        <div class="flex flex-row items-stretch justify-center space-x-6 my-12">
            <!-- Left Box -->
            <div class="w-[150px] h-auto bg-white overflow-hidden">
                <div class="w-full bg-gray-200 overflow-hidden">
                    <img src="http://localhost/wordpress/wp-content/uploads/2025/07/龍騰出版社.jpg" alt="龍騰" class="object-cover w-full h-full" />
                </div>
                <!-- Description -->
                <div class="text-sm text-gray-800 leading-relaxed text-center mt-4">
                    <span>龍騰文化</span>
                </div>
                
            </div>

            <!-- Middle Box -->
            <div class="w-[450px] h-auto bg-white overflow-hidden">
                <div class="w-full bg-gray-200 overflow-hidden">
                    <img src="http://localhost/wordpress/wp-content/uploads/2025/07/台北市思源文教基金會_裁切.png" alt="思源文教" class="object-cover w-full h-full" />
                </div>
                <!-- Description -->
                <div class="text-sm text-gray-800 leading-relaxed text-center mt-4">
                    <span>台北市思源文教基金會</span>
                </div>
                
            </div>
            
            <!-- Right Box -->
            <div class="w-[392px] h-auto bg-white overflow-hidden">
                <div class="w-full bg-gray-200 overflow-hidden">
                    <img src="http://localhost/wordpress/wp-content/uploads/2025/07/台大EMBA校友會_裁切.png" alt="台大EMBA校友會" class="object-cover w-full h-full" />
                </div>
                <!-- Description -->
                <div class="text-sm text-gray-800 leading-relaxed text-center mt-4">
                    <span>台大EMBA校友會</span>
                </div>
                
            </div>
        </div>
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
