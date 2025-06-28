<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			
	<?php //get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer bg-orange-300 h-[100px]">
		<div class="flex items-center space-x-6 px-8 py-4 ml-6">
			<!-- Facebook Icon -->
			<a href="https://www.facebook.com/ntututorteam" target="_blank" aria-label="Facebook" class="text-gray-700 hover:text-blue-700">
				<svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
					<path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.242 0-1.632.771-1.632 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12"/>
				</svg>
			</a>
			<!-- Instagram Icon -->
			<a href="https://www.instagram.com/ntututorteam/" target="_blank" aria-label="Instagram" class="text-gray-700 hover:text-pink-600">
				<svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
					<path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 2.25a6.25 6.25 0 1 1 0 12.5 6.25 6.25 0 0 1 0-12.5zm0 1.5a4.75 4.75 0 1 0 0 9.5 4.75 4.75 0 0 0 0-9.5zm5.25 1.25a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
				</svg>
			</a>
			<!-- Mail Icon -->
			<a href="mailto:ntututorteam@gmail.com" aria-label="Mail" class="text-gray-700 hover:text-green-600">
				<svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a3 3 0 0 0 3.22 0L22 8m-19 8V8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
				</svg>
			</a>
		</div>
	</footer><!-- #colophon -->

	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
