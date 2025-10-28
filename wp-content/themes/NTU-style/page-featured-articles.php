// TEMPLATE: page-featured-articles.php
// <?php
// /* Template Name: Featured Articles Page */
// get_header('featured');
// ?>
// <section class="bg-gray-50 min-h-screen">
//     
//     <div class="container mx-auto px-4 py-8">
//         <div class="max-w-3xl mx-auto">
//
//             <?php
//             $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
//             $args = array(
//                 'post_type' => 'featured_article',
//                 'posts_per_page' => 5,
//                 'paged' => $paged,
//                 'orderby' => 'date',
//                 'order' => 'DESC',
//             );
//             $featured_articles_query = new WP_Query( $args );
//
//             if ( $featured_articles_query->have_posts() ) :
//                 while ( $featured_articles_query->have_posts() ) : $featured_articles_query->the_post();
//             ?>
//
//             <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
//                 
//                 <!-- Left Side - Image -->
//                 <div class="relative">
//                     <div class="image-placeholder aspect-square flex items-center justify-center">
//                         <?php if (has_post_thumbnail()) : ?>
//                             <a href="<?php the_permalink(); ?>" class="block w-full h-full">
//                                 <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover rounded-2xl opacity-80')); ?>
//                             </a>
//                         <?php else : ?>
//                             <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/07/精選文章示範圖.jpg" 
//                                  alt="Default Image" 
//                                  class="w-full h-full object-cover rounded-2xl opacity-80">
//                         <?php endif; ?>
//                     </div>
//                 </div>
//                 
//                 <!-- Right Side - Info Box -->
//                 <div class="bg-white rounded-2xl p-8 shadow-lg flex flex-col overflow-hidden">
//                     
//                     <!-- Category/Series -->
//                     <div class="flex-grow">
//                         <div class="mb-4">
//                             <span class="text-sm text-gray-500 font-medium">
//                                 <?php
//                                 $categories = get_the_category();
//                                 if ( ! empty( $categories ) ) {
//                                     echo esc_html( $categories[0]->name );   
//                                 }
//                                 ?>
//                             </span>
//                         </div>
//                     
//                     
//                     
//                         <!-- Title -->
//                         <h1 class="text-2xl md:text-xl font-bold text-gray-900 mb-6 leading-tight">
//                             <a href="<?php the_permalink(); ?>" class="hover:text-seed transition duration-300"><?php the_title(); ?></a>
//                         </h1>
//                         
//                         <!-- Meta Information -->
//                         <div class="space-y-3 mb-8">
//                             <div class="flex items-center text-gray-600">
//                                 <span class="text-sm">上架日期：<?php echo get_the_date('Y/n/j'); ?></span>
//                             </div>
//                             <?php if (get_post_meta(get_the_ID(), '_reading_time', true)) : ?>
//                             <div class="flex items-center text-gray-600">
//                                 <span class="text-sm">閱讀時間：<?php echo get_post_meta(get_the_ID(), '_reading_time', true); ?>分鐘</span>
//                             </div>
//                             <?php endif; ?>
//                             <?php if (get_post_meta(get_the_ID(), '_author_name', true)) : ?>
//                             <div class="flex items-center text-gray-600">
//                                 <span class="text-sm">作者：<?php echo get_post_meta(get_the_ID(), '_author_name', true); ?>
//                                 </span>
//                             </div>
//                             <?php endif; ?>
//                         </div>
//                     </div>
//                     
//                     <!-- Read Button -->
//                     <div class="flex items-center justify-center pt-4">
//                         <a href="<?php the_permalink(); ?>" class="px-8 py-3 rounded-full text-black font-medium text-lg hover:bg-seed transition duration-300 rounded-full">
//                             閱讀全文
//                         </a>
//                     </div>
//                     
//                 </div>
//             </div>
//
//             <?php
//                 endwhile;
//             ?>
//             
//             <div class="pagination text-center mt-8">
//                 <?php
//                 echo paginate_links( array(
//                     'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
//                     'total'        => $featured_articles_query->max_num_pages,
//                     'current'      => max( 1, get_query_var( 'paged' ) ),
//                     'format'       => '?paged=%#%',
//                     'show_all'     => false,
//                     'type'         => 'plain',
//                     'end_size'     => 2,
//                     'mid_size'     => 1,
//                     'prev_next'    => true,
//                     'prev_text'    => sprintf( '<i></i> %1$s', __( '« 上一頁', 'text-domain' ) ),
//                     'next_text'    => sprintf( '%1$s <i></i>', __( '下一頁 »', 'text-domain' ) ),
//                     'add_args'     => false,
//                     'add_fragment' => '',
//                 ) );
//                 ?>
//             </div>
//
//             <?php
//                 wp_reset_postdata();
//             else :
//             ?>
//                 <div class="bg-white rounded-2xl p-12 shadow-lg text-center">
//                     <div class="mb-6">
//                         <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
//                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
//                         </svg>
//                     </div>
//                     <h3 class="text-xl font-medium text-gray-900 mb-2">目前沒有精選文章</h3>
//                     <p class="text-gray-600">請稍後再回來查看，或聯繫管理員新增文章。</p>
//                 </div>
//             <?php
//             endif;
//             ?>
//
//         </div>
//     </div>
// </section>
// <?php get_footer(); ?>
