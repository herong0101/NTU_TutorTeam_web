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
  <header class="relative h-screen bg-cover bg-center" style="background-image: url('<?php echo esc_url(get_theme_file_uri('/pictures/book_with_glasses_big.jpg')); ?>');">
    <nav class="absolute inset-x-0 top-0 flex justify-between items-center px-6 py-4 bg-transparent border-0 shadow-none">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" id="mobile-menu-button" class="relative inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/20 focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!--
                Icon when menu is closed.

                Menu open: "hidden", Menu closed: "block"
              -->
              <svg id="menu-closed-icon" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!--
                Icon when menu is open.

                Menu open: "block", Menu closed: "hidden"
              -->
              <svg id="menu-open-icon" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- add style to center -->
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start" style="display: flex;flex-direction: row;align-items: center;justify-content: center;">
            <!-- logo -->
            <div class="flex shrink-0 items-center">
              <img class="h-8 w-auto" src="https://ntututorteam.com/wp-content/uploads/2023/09/cropped-%E7%B2%89%EF%BC%88%E7%9B%B4%E5%BC%8F%EF%BC%89.png" alt="臺大升學輔導種子計畫" />
            </div>
            <!-- four tags and Google login button -->
            <div class="hidden sm:ml-6 sm:flex items-center space-x-4">
              <!-- Navigation Tags -->
              <a href="<?php echo home_url('/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300" aria-current="page">首頁</a>
              <a href="<?php echo home_url('/featured-articles/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300" aria-current="page">精選文章</a>
              <a href="<?php echo home_url('/resources/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300" aria-current="page">教材資源</a>
              <a href="<?php echo home_url('/about-us/'); ?>" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300" aria-current="page">關於我們</a>

              <!-- Login Button - 需要安裝 Nextend Social Login 外掛才能使用 Google 登入功能 -->
              <?php if (is_user_logged_in()) : ?>
                <div class="ml-auto mr-10 flex items-center" style="gap: 20px;">
                  <span class="text-white text-sm">歡迎，<?php echo wp_get_current_user()->display_name; ?></span>
                  <a href="<?php echo wp_logout_url(home_url()); ?>">
                    <button type="button" class="font-Zen-Old-Mincho font-bold text-white bg-seed hover:bg-orange-500 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">登出</button>
                  </a>
                </div>
              <?php else : ?>
                <div class="ml-auto mr-10 flex items-center" style="gap: 20px;">
                  <a href="<?php echo home_url('/register/'); ?>">
                    <button type="button" class="font-Zen-Old-Mincho font-bold text-white border border-white hover:bg-white hover:text-seed transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">註冊</button>
                  </a>
                  <a href="<?php echo home_url('/sign-in/'); ?>">
                    <button type="button" class="font-Zen-Old-Mincho font-bold text-white bg-seed hover:bg-orange-500 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-sm px-3 py-2">登入</button>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="hidden sm:hidden absolute top-16 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-lg z-50" id="mobile-menu">
        <div class="space-y-1 px-4 pt-4 pb-4">
          <a href="<?php echo home_url('/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">首頁</a>
          <a href="<?php echo home_url('/featured-articles/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">精選文章</a>
          <a href="<?php echo home_url('/resources/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">教材資源</a>
          <a href="<?php echo home_url('/about-us/'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-seed hover:text-white transition duration-300">關於我們</a>
          
          <!-- Mobile Login/Logout buttons -->
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

    <section class="flex h-full items-center justify-center text-white px-4">
    <!-- Hero content like headline, button, etc. -->
      <div class="relative text-center mt-6">
  <h1 class="font-Zen-Old-Mincho font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl mb-6 sm:mb-8 md:mb-10">臺大升學輔導種子計畫</h1>
  <p class="font-Zen-Old-Mincho font-bold text-xl sm:text-2xl md:text-3xl lg:text-4xl mt-6 sm:mt-8 md:mt-10">幫助有夢想的高中種子們，成長茁壯。</p>
        
        <!-- sign up for seed -->
         <!-- color code : #f37f65 -->
        
        <a href="<?php echo home_url('/sign-up/'); ?>">
          <button type="button" class="font-Zen-Old-Mincho font-bold mt-10 sm:mt-12 md:mt-16 text-white bg-seed hover:bg-orange-500 transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-lg sm:text-xl md:text-2xl px-8 sm:px-10 py-4 sm:py-5 text-center">報名計畫</button>
        </a>
        

      </div>
    </section>

  </header>

  <!-- Mobile Menu Toggle Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      const menuClosedIcon = document.getElementById('menu-closed-icon');
      const menuOpenIcon = document.getElementById('menu-open-icon');
      
      if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function() {
          const isHidden = mobileMenu.classList.contains('hidden');
          
          if (isHidden) {
            mobileMenu.classList.remove('hidden');
            menuClosedIcon.classList.add('hidden');
            menuOpenIcon.classList.remove('hidden');
            menuButton.setAttribute('aria-expanded', 'true');
          } else {
            mobileMenu.classList.add('hidden');
            menuClosedIcon.classList.remove('hidden');
            menuOpenIcon.classList.add('hidden');
            menuButton.setAttribute('aria-expanded', 'false');
          }
        });
      }
    });
  </script>
