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
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="text-2xl font-bold text-gray-800">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">NTU TutorTeam</a>
            </div>
            <nav class="hidden md:flex space-x-6">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-gray-600 hover:text-blue-500">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-500">About</a>
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'events' ) ) ); ?>" class="text-blue-500 font-semibold">Events</a>
                <a href="#" class="text-gray-600 hover:text-blue-500">Resources</a>
                <a href="#" class="text-gray-600 hover:text-blue-500">Contact</a>
            </nav>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden mt-4">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block py-2 text-gray-600 hover:text-blue-500">Home</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-blue-500">About</a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'events' ) ) ); ?>" class="block py-2 text-blue-500 font-semibold">Events</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-blue-500">Resources</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-blue-500">Contact</a>
        </div>
    </div>
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
  </header>
