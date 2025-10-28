<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />  
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		esc_html_e( 'Skip to content', 'twentytwentyone' );
		?>
	</a>
    <header class="bg-white shadow-md">
        <nav class="relative flex items-center justify-between px-6 py-4">
            <div class="flex items-center">
                <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="https://ntututorteam.com/wp-content/uploads/2023/09/cropped-%E7%B2%89%EF%BC%88%E7%9B%B4%E5%BC%8F%EF%BC%89.png" alt="臺大升學輔導種子計畫" />
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex items-center space-x-4">
                <a href="<?php echo home_url('/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300" aria-current="page">首頁</a>
                <a href="<?php echo home_url('/featured-articles/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300">精選文章</a>
                <a href="<?php echo home_url('/resources/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300">教材資源</a>
                <a href="<?php echo home_url('/about-us/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300">關於我們</a>
                <?php if (is_user_logged_in()) : ?>
                    <div class="ml-auto flex items-center" style="gap: 20px;">
                        <span class="text-gray-700 text-sm">歡迎，<?php echo wp_get_current_user()->display_name; ?></span>
                        <a href="<?php echo wp_logout_url(home_url()); ?>">
                            <button type="button" class="font-Zen-Old-Mincho font-bold text-white bg-seed hover:bg-orange-500 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">登出</button>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="ml-auto flex items-center" style="gap: 20px;">
                        <a href="<?php echo home_url('/register/'); ?>">
                            <button type="button" class="font-Zen-Old-Mincho font-bold text-seed border border-seed hover:bg-seed hover:text-white transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">註冊</button>
                        </a>
                        <a href="<?php echo home_url('/sign-in/'); ?>">
                            <button type="button" class="font-Zen-Old-Mincho font-bold text-white bg-seed hover:bg-orange-500 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">登入</button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="sm:hidden">
                <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div id="mobile-menu" class="hidden absolute top-16 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-lg z-50">
                <div class="space-y-1 px-4 pt-4 pb-4">
                    <a href="<?php echo home_url('/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">首頁</a>
                    <a href="<?php echo home_url('/featured-articles/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">精選文章</a>
                    <a href="<?php echo home_url('/resources/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">教材資源</a>
                    <a href="<?php echo home_url('/about-us/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">關於我們</a>
                    <?php if (is_user_logged_in()) : ?>
                        <div class="px-3 py-2 border-t border-gray-200 mt-2 pt-3">
                            <span class="block mb-2 text-gray-700 text-sm">歡迎，<?php echo wp_get_current_user()->display_name; ?></span>
                            <a href="<?php echo wp_logout_url(home_url()); ?>">
                                <button type="button" class="w-full font-Zen-Old-Mincho font-bold text-white bg-seed hover:bg-orange-500 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">登出</button>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="px-3 py-2 space-y-2 border-t border-gray-200 mt-2 pt-3">
                            <a href="<?php echo home_url('/register/'); ?>">
                                <button type="button" class="w-full font-Zen-Old-Mincho font-bold text-seed border border-seed hover:bg-seed hover:text-white transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">註冊</button>
                            </a>
                            <a href="<?php echo home_url('/sign-in/'); ?>">
                                <button type="button" class="w-full font-Zen-Old-Mincho font-bold text-white bg-seed hover:bg-orange-500 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">登入</button>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <script>
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        </script>
    </header>
