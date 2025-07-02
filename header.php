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
  <header class="relative h-screen bg-cover bg-center" style="background-image: url('http://wp.local/wp-content/uploads/2025/06/book_with_glasses_big.jpg');">
    <nav class="absolute inset-x-0 top-0 flex justify-between items-center px-6 py-4 bg-transparent border-0 shadow-none">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!--
                Icon when menu is closed.

                Menu open: "hidden", Menu closed: "block"
              -->
              <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!--
                Icon when menu is open.

                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- add style to center -->
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start" style="display: flex;flex-direction: row;align-items: center;justify-content: center;">
            <!-- logo -->
            <div class="flex shrink-0 items-center">
              <img class="h-8 w-auto" src=https://ntututorteam.com/wp-content/uploads/2023/09/cropped-%E7%B2%89%EF%BC%88%E7%9B%B4%E5%BC%8F%EF%BC%89.png" alt="Your Company" />
            </div>
            <!-- four tags -->
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300"aria-current="page">首頁</a>
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300"aria-current="page">精選文章</a>
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300"aria-current="page">教材資源</a>
                <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-black transition duration-300"aria-current="page">關於我們</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
        </div>
      </div>
    </nav>

    <section class="flex h-full items-center justify-center text-white">
    <!-- Hero content like headline, button, etc. -->
      <div class="relative text-center mt-6">
        <h1 class="font-Zen-Old-Mincho font-bold text-7xl mb-10">臺大升學輔導種子計畫</h1>
        <p class="font-Zen-Old-Mincho font-bold text-3xl mt-10">幫助有夢想的種子們，成長茁壯。</p>
        
        <!-- sign up for seed -->
         <!-- color code : #f37f65 -->
        <button type="button" class="font-Zen-Old-Mincho font-bold mt-16 text-white bg-seed hover:bg-orange-500  transition duration-300 focus:outline-none focus:ring-2 focus:ring-orange-300 font-medium rounded-full text-2xl px-10 py-5 text-center me-1 mb-1">報名計畫</button>
      
        

      </div>
    </section>

  </header>



	<?php //get_template_part( 'template-parts/header/site-header' ); ?>

	<!-- <div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main"> -->
