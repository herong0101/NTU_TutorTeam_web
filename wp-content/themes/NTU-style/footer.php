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

	<div class="h-12 sm:h-20"></div>
		<div class="container mx-auto px-4 sm:px-6 w-full py-16 sm:py-20 md:py-24">
		  <!-- 桌機：三欄橫向，手機：直式堆疊 -->
			<div class="grid grid-cols-1 md:grid-cols-3 items-center w-full gap-4 md:gap-0">
			<!-- 左：計畫名稱 -->
			<div class="flex items-center justify-center md:justify-start w-full text-center md:text-left" style="margin-top: 0.5rem;">
				<p class="text-black text-lg sm:text-xl md:text-2xl font-Zen-Old-Mincho font-semibold">臺大升學輔導種子計畫</p>
			</div>
			<!-- 中：icon -->
			<div class="flex items-center justify-center h-full w-full text-center space-x-4 sm:space-x-6">
				<!-- Facebook Icon -->
				<a href="https://www.facebook.com/ntututorteam" target="_blank" aria-label="Facebook" class="text-gray-700 hover:text-blue-700 transition-colors">
					<svg class="w-8 h-8 sm:w-10 sm:h-10" style="width:2.5rem;height:2.5rem;" fill="currentColor" viewBox="0 0 24 24">
						<path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.242 0-1.632.771-1.632 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12"/>
					</svg>
				</a>
				<!-- Instagram Icon -->
				<a href="https://www.instagram.com/ntututorteam/" target="_blank" aria-label="Instagram" class="text-gray-700 hover:text-pink-600 transition-colors">
					<svg class="w-8 h-8 sm:w-10 sm:h-10" style="width:2.5rem;height:2.5rem;" fill="currentColor" viewBox="0 0 24 24">
						<path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 2.25a6.25 6.25 0 1 1 0 12.5 6.25 6.25 0 0 1 0-12.5zm0 1.5a4.75 4.75 0 1 0 0 9.5 4.75 4.75 0 0 0 0-9.5zm5.25 1.25a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
					</svg>
				</a>
				<!-- Mail Icon -->
				<a href="mailto:ntututorteam@gmail.com" aria-label="Mail" class="text-gray-700 hover:text-green-600 transition-colors">
					<svg class="w-8 h-8 sm:w-10 sm:h-10" style="width:2.5rem;height:2.5rem;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a3 3 0 0 0 3.22 0L22 8m-19 8V8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
					</svg>
				</a>
				<!-- YouTube Icon -->
				<a href="https://www.youtube.com/@%E8%87%BA%E5%A4%A7%E5%8D%87%E5%AD%B8%E8%BC%94%E5%B0%8E%E7%A8%AE%E5%AD%90%E8%A8%88%E7%95%AB" target="_blank" aria-label="YouTube" class="text-gray-700 hover:text-red-600 transition-colors">
					<svg class="w-8 h-8 sm:w-10 sm:h-10" style="width:2.5rem;height:2.5rem;" fill="currentColor" viewBox="0 0 24 24">
						<path d="M23.498 6.186a2.994 2.994 0 0 0-2.107-2.117C19.379 3.5 12 3.5 12 3.5s-7.379 0-9.391.569A2.994 2.994 0 0 0 .502 6.186C0 8.207 0 12 0 12s0 3.793.502 5.814a2.994 2.994 0 0 0 2.107 2.117C4.621 20.5 12 20.5 12 20.5s7.379 0 9.391-.569a2.994 2.994 0 0 0 2.107-2.117C24 15.793 24 12 24 12s0-3.793-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
					</svg>
				</a>
				<!-- Discord Icon -->
				<a href="https://discord.gg/EN8HCuuv4C" target="_blank" aria-label="Discord" class="text-gray-700 hover:text-indigo-500 transition-colors">
					<svg class="w-8 h-8 sm:w-10 sm:h-10" style="width:2.5rem;height:2.5rem;" fill="currentColor" viewBox="0 0 24 24">
						<path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276c-.598.3428-1.2205.6447-1.8733.8923a.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1826 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"/>
					</svg>
				</a>
			</div>
			<!-- 右：地址 -->
			<div class="flex items-center justify-center md:justify-end w-full text-center md:text-right">
				<p class="text-black text-lg sm:text-xl md:text-2xl font-Zen-Old-Mincho font-semibold">地址：臺灣大學第二活動中心901室</p>
			</div>
		  </div>
		</div>
		</div>
	</footer><!-- #colophon -->

	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
