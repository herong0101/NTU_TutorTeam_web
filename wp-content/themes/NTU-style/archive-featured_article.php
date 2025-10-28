<!-- TEMPLATE: archive-featured_article.php -->
<?php
/* Template Name: Featured Articles */
get_header('featured');
?>
<section class="bg-gray-50 min-h-screen">
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">

            <?php
            // Use main query directly - WordPress handles the archive query automatically
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
            ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                
                <!-- Left Side - Image -->
                <div class="relative">
                    <div class="image-placeholder aspect-square flex items-center justify-center">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block w-full h-full">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover rounded-2xl opacity-80')); ?>
                            </a>
                        <?php else : ?>
                            <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/07/精選文章示範圖.jpg" 
                                 alt="Default Image" 
                                 class="w-full h-full object-cover rounded-2xl opacity-80">
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Right Side - Info Box -->
                <div class="bg-white rounded-2xl p-8 shadow-lg flex flex-col overflow-hidden">
                    
                    <!-- Category/Series -->
                    <div class="flex-grow">
                        <div class="mb-4">
                            <span class="text-sm text-gray-500 font-medium">
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo esc_html( $categories[0]->name );   
                                }
                                ?>
                            </span>
                        </div>
                    
                    
                    
                        <!-- Title -->
                        <h1 class="text-2xl md:text-xl font-bold text-gray-900 mb-6 leading-tight">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h1>
                        
                        <!-- Meta Information -->
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center text-gray-600">
                                <span class="text-sm">上架日期：<?php echo get_the_date('Y/n/j'); ?></span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <span class="text-sm">閱讀時間：<?php echo get_post_meta(get_the_ID(), '_reading_time', true); ?>分鐘</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <span class="text-sm">作者 : <?php echo get_post_meta(get_the_ID(), '_author_name', true); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Read Button -->
                    <div class="flex items-center justify-center pt-4">
                        <a href="<?php the_permalink(); ?>" class="px-8 py-3 rounded-full text-black font-medium text-lg hover:bg-seed transition duration-300 rounded-full">
                            閱讀全文
                        </a>
                    </div>
                    
                </div>
            </div>

            <?php
                endwhile;
            ?>
            
            <nav class="pagination flex justify-center mb-8 mt-8" aria-label="精選文章分頁導航">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __('&laquo; 上一頁', 'ntu-tutorteam-web'),
                    'next_text' => __('下一頁 &raquo;', 'ntu-tutorteam-web'),
                    'class'     => 'flex justify-center gap-2',
                ) );
                ?>
            </nav>

            <?php
                // No need for wp_reset_query when using main query
            else :
            ?>
                <p><?php _e( 'Sorry, no featured articles matched your criteria.' ); ?></p>
            <?php
            endif;
            ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>