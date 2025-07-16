<?php
/* Template Name: Sign Up */
get_header('sign-up');
?>

<section class="bg-gray-50 min-h-screen">
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                
                <!-- Left Side - Info Box -->
                <div class="flex flex-col items-center justify-center bg-white rounded-2xl p-8 shadow-lg">
                    
                    <!-- Title -->
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
                        學測計畫    
                    </h1>
                    
                    <!-- Meta Information -->
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center text-gray-600">
                            <span class="text-sm">報名：-10/13 23:59</span>
                        </div>
                    </div>
                    
                    <!-- Read Button -->
                    <div class="pt-4">
                        <button class="bg-seed px-8 py-3 rounded-full text-white font-medium text-lg">
                            報名連結
                        </button>
                    </div>
                    
                </div>

                <!-- Right Side - Info Box -->
                <div class="flex flex-col items-center justify-center bg-white rounded-2xl p-8 shadow-lg">
                    
                    <!-- Title -->
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
                        更多講座    
                    </h1>
                    
                    <!-- Meta Information -->
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center text-gray-600">
                            <span class="text-sm">報名：Coming Soon</span>
                        </div>
                    </div>
                    
                    <!-- Read Button -->
                    <div class="pt-4">
                        <button class="bg-seed px-8 py-3 rounded-full text-white font-medium text-lg">
                            報名連結
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