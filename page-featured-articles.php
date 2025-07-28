<?php
/* Template Name: Featured Articles */
get_header('featured');
?>
<section class="bg-gray-50 min-h-screen">
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                
                <!-- Left Side - Image -->
                <div class="relative p-7">
                    <div class="image-placeholder aspect-square flex items-center justify-center">
                        <!-- Sample Image - Replace with WordPress featured image -->
                        <img src="http://localhost/wordpress/wp-content/uploads/2025/07/精選文章示範圖.jpg" 
                             alt="Brain illustration" 
                             class="w-full h-full object-cover rounded-2xl opacity-80">
                    </div>
                </div>
                
                <!-- Right Side - Info Box -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    
                    <!-- Category/Series -->
                    <div class="mb-4">
                        <span class="text-sm text-gray-500 font-medium">
                            第11屆編輯部議題文章
                        </span>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
                        #Brain Rot 你的腦，被腐蝕了嗎？
                    </h1>
                    
                    <!-- Meta Information -->
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center text-gray-600">
                            <span class="text-sm">上架日期：2025/7/9</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <span class="text-sm">閱讀時間：10分鐘</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <span class="text-sm">作者 : Gary
                            </span>
                        </div>
                    </div>
                    
                    <!-- Read Button -->
                    <div class="pt-4">
                        <button class="read-button px-8 py-3 rounded-full text-black font-medium text-lg">
                            閱讀全文
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- WordPress Integration Template -->
    <?php
    /*
    // Replace static content with WordPress functions:
    
    // For the category/series:
    $categories = get_the_category();
    if (!empty($categories)) {
        echo '<span class="text-sm text-gray-500 font-medium">' . esc_html($categories[0]->name) . '</span>';
    }
    
    // For the title:
    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
        <?php the_title(); ?>
    </h1>
    
    // For the date:
    <span class="text-sm">上架日期：<?php echo get_the_date('Y/n/j'); ?></span>
    
    // For the featured image:
    if (has_post_thumbnail()) {
        the_post_thumbnail('large', array(
            'class' => 'w-full h-full object-cover rounded-2xl opacity-80',
            'alt' => get_the_title()
        ));
    }
    
    // For reading time (requires custom function):
    function get_reading_time() {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200); // Assuming 200 words per minute
        return $reading_time;
    }
    
    <span class="text-sm">閱讀時間：<?php echo get_reading_time(); ?>分鐘</span>
    
    // For the read button link:
    <a href="<?php the_permalink(); ?>" class="read-button px-8 py-3 rounded-full text-white font-medium text-lg inline-block">
        閱讀全文
    </a>
    */
    ?>
    
    <?php //wp_footer(); ?>
</section>
<?php get_footer(); ?>