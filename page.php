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
            <ul class="flex flex-col space-y-4 max-w-none max-h-none w-[800px] h-[300px] p-6 bg-gradient-to-br from-white to-seed shadow-md rounded-2xl border border-gray-200 overflow-hidden mt-6">
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
                <div>
                    <button type="button" class="bg-opacity-0 text-black ring ring-gray-400 ring-offset-0 rounded-full text-lg px-8 py-3 text-center me-1 mb-1 hover:bg-gray-400 transition duration-300">更多活動</button>
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
            <!-- Left Box -->
            <div class="w-[320px] h-auto rounded-2xl p-0 flex flex-col items-center justify-start">
                <!-- Image Area -->
                <div class="w-[320px] h-[400px] rounded-2xl bg-gray-200 overflow-hidden flex items-center justify-center">
                    <img src="https://via.placeholder.com/600x400" alt="Sample" class="object-cover w-full h-full rounded-2xl" />
                </div>
                <!-- Pill Label -->
                <div class="w-[320px] mt-4 rounded-2xl text-black px-4 py-3 text-sm font-semibold text-center bg-gradient-to-r from-[#f58529] via-[#dd2a7b] to-[#dd2a7b]">
                    值得不想要到不行幾次還在，的還有是你⋯隔笑死的模其他人，出問題也好喜一直，得很沒能不能的不知勞就是。也好不的我有任欸不那個我算是，這加還會是不是書好會回報⋯的時有認好邊還有說可地方⋯機會邊什麼感，都不能狀況，出粉絲這個一起出要給就好因為。日快樂不是很想這結婚有發以後：因為我自己寫的覺得後成功，知道是第一：永一段顯大家⋯的所有都要，部分較喜歡而且還
                </div>
            </div>

            <!-- Middle Box -->
            <div class="w-[320px] h-auto rounded-2xl p-0 flex flex-col items-center justify-start">
                <!-- Image Area -->
                <div class="w-[320px] h-[400px] rounded-2xl bg-gray-200 overflow-hidden flex items-center justify-center">
                    <img src="https://via.placeholder.com/600x400" alt="Sample" class="object-cover w-full h-full rounded-2xl" />
                </div>
                <!-- Pill Label -->
                <div class="w-[320px] mt-4 rounded-2xl text-black px-4 py-3 text-sm font-semibold text-center bg-gradient-to-r from-[#dd2a7b] via-[#8134af] to-[#515bd4]">
                    玩家不。比法但會有點果感受到⋯哈關他們導致。化有特在一起很多，我媽也好他們不是應，個人可以給就是小天。
                </div>
            </div>
            
            <!-- Right Box -->
            <div class="w-[320px] h-auto rounded-2xl p-0 flex flex-col items-center justify-start">
                <!-- Image Area -->
                <div class="w-[320px] h-[400px] rounded-2xl bg-gray-200 overflow-hidden flex items-center justify-center">
                    <img src="https://via.placeholder.com/600x400" alt="Sample" class="object-cover w-full h-full rounded-2xl" />
                </div>
                <!-- Pill Label -->
                <div class="w-[320px] mt-4 rounded-2xl text-black px-4 py-3 text-sm font-semibold text-center bg-gradient-to-r from-[#515bd4] via-[#405de6] to-[#5851db]">
                    ，都不能狀況，出粉絲這個一起出要給就好因為。日快樂不是很想這結婚有發以後：因為我自己寫的覺得後成功，知道是第一：永一段顯大家⋯的所有都要，部分較喜歡而且還喜一直，得很沒能不能的不知勞就是。也好不的我有任欸不那個我算是，這加還
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
