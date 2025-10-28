<?php
/* Template Name: Resources */

get_header('resources');

$is_authorized_student = false;
$user = wp_get_current_user();
if (in_array('authorized_student', (array) $user->roles)) {
    $is_authorized_student = true;
}
?>

<section class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
    
    <!-- List Boxes -->
    <div class="flex flex-row mx-auto max-w-4xl space-x-6 mb-6">
        <!-- List Box 1 -->
        <div class="relative inline-block flex flex-col space-y-2 w-40">
            <span class="text-sm">科目</span>
            <button id="dropdownButton1" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700 text-left inline-flex items-center justify-between" type="button">選擇科目</button>
            <div id="dropdown1" class="absolute z-10 hidden bg-white w-full border border-gray-300 rounded-md shadow-lg" style="top: 100%;">
                <ul class="py-1 text-sm text-gray-700">
                    <!-- 數甲、分科物理化學生物會再加入-->
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="全部">全部</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="國文">國文</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="英文">英文</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="學測數學">學測數學</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="分科數甲">分科數甲</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="物理">物理</a></li>
                </ul>
            </div>
        </div>

        <!-- List Box 2 -->
        <div class="relative inline-block flex flex-col space-y-2 w-40">
            <span class="text-sm">類型</span>
            <button id="dropdownButton2" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700 text-left inline-flex items-center justify-between" type="button">選擇類型</button>
            <div id="dropdown2" class="absolute z-10 hidden bg-white w-full border border-gray-300 rounded-md shadow-lg" style="top: 100%;">
                <ul class="py-1 text-sm text-gray-700">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="全部">全部</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="講義">講義</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="習題">習題</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="影片">影片</a></li>
                </ul>
            </div>
        </div>

        <!-- List Box 3 -->
        <div class="relative inline-block flex flex-col space-y-2 w-40">
            <span class="text-sm">屆數</span>
            <button id="dropdownButton3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700 text-left inline-flex items-center justify-between" type="button">選擇屆數</button>
            <div id="dropdown3" class="absolute z-10 hidden bg-white w-full border border-gray-300 rounded-md shadow-lg" style="top: 100%;">
                <ul class="py-1 text-sm text-gray-700">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-term="全部">全部</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-term="114">114學年</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-term="113">113學年</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-term="112">112學年</a></li>
                </ul>
            </div>
        </div>

        <!-- add search bar to find corresponding resources from resources.json -->
        <div class="relative inline-block flex flex-col space-y-2 w-40">
            <span class="text-sm">搜尋</span>
            <input type="text" id="searchInput" placeholder="搜尋描述..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>
    
    <!-- Toggle dropdowns independently -->
    <script>
        document.getElementById('dropdownButton1').addEventListener('click', function() {
            const dropdown1 = document.getElementById('dropdown1');
            dropdown1.classList.toggle('hidden');
        });
        document.getElementById('dropdownButton2').addEventListener('click', function() {
            const dropdown2 = document.getElementById('dropdown2');
            dropdown2.classList.toggle('hidden');
        });
        document.getElementById('dropdownButton3').addEventListener('click', function() {
            const dropdown3 = document.getElementById('dropdown3');
            dropdown3.classList.toggle('hidden')
        })

        // hide list if user click outside of the listbox
        document.addEventListener('click', function(event) {
            const dropdown1 = document.getElementById('dropdown1');
            const dropdown2 = document.getElementById('dropdown2');
            const dropdown3 = document.getElementById('dropdown3');
            if (!event.target.closest('#dropdownButton1') && !event.target.closest('#dropdown1')) {
                dropdown1.classList.add('hidden');
            }
            if (!event.target.closest('#dropdownButton2') && !event.target.closest('#dropdown2') ) {
                dropdown2.classList.add('hidden');
            }
            if(!event.target.closest('#dropdownButton3') && !event.target.closest('#dropdown3')){
                dropdown3.classList.add('hidden');
            }
        });
    </script>

    <!-- Data Display -->
    <div id="data-container" class="mt-6 mx-auto max-w-4xl">
        <!-- Display resources from custom post type -->
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $args = array(
            'post_type' => 'resource',
            'posts_per_page' => 3, // 每頁顯示 20 筆
            'post_status' => 'publish',
            'paged' => $paged
        );

        // Only exclude term=114 if user is NOT logged in
        // Logged-in users (including administrators and subscribers) can see term=114
        if (!is_user_logged_in()) {
            $args['meta_query'] = array(
                array(
                    'key'     => 'term',
                    'value'   => '114',
                    'compare' => '!='
                )
            );
        }
        $resources_query = new WP_Query($args);

        if ($resources_query->have_posts()) :
            while ($resources_query->have_posts()) :
                $resources_query->the_post();
                // 使用 get_post_meta 取得自訂欄位（適用於內建自訂欄位）
                $term = get_post_meta(get_the_ID(), 'term', true);
                $subject = get_post_meta(get_the_ID(), 'subject', true);
                $url = get_post_meta(get_the_ID(), 'url', true);
                if (!$url) $url = '#'; // 如果沒有 URL，預設為 #
                $categories = get_the_category();
                $category_list = !empty($categories) ? esc_html($categories[0]->name) : '';
                ?>
                <a href="<?php echo esc_url($url); ?>" target="_blank">
                    <div class="resource-item data-item bg-white rounded-lg p-4 shadow-md mb-4" 
                        data-subject="<?php echo esc_attr($subject); ?>" 
                        data-type="<?php echo esc_attr($category_list); ?>"
                        data-term="<?php echo esc_attr($term); ?>">
                        <div>
                            <h3 class="text-lg font-semibold mb-2"><?php the_title(); ?></h3>
                        </div>
                        <div>
                            <?php
                            $resource_content = get_the_content();
                            if (!empty($resource_content)) {
                                the_content();
                            } else {
                                echo '<p> </p>';
                            }
                            ?>
                        </div>
                        
                    </div>
                </a>
                
                <?php
            endwhile;
            ?>
            
            <!-- 分頁導航 -->
            <nav class="pagination mb-8 mt-8" aria-label="教材資源分頁導航">
                <div class="flex justify-center gap-4">
                <?php
                echo paginate_links( array(
                    'total'     => $resources_query->max_num_pages,
                    'current'   => $paged,
                    'mid_size'  => 2,
                    'prev_text' => __('&laquo; 上一頁', 'ntu-tutorteam-web'),
                    'next_text' => __('下一頁 &raquo;', 'ntu-tutorteam-web'),
                ) );
                ?>
                </div>
            </nav>

            <?php
            wp_reset_postdata();
        else :
            echo '<p>目前沒有可用的資源。</p>';
        endif;
        ?>
    </div>
    </div>
</section>

<script>
    // JavaScript for filtering data
    let selectedSubject = null;
    let selectedType = null;
    let selectedTerm = null;

    document.querySelectorAll('#dropdown1 a').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            selectedSubject = this.dataset.subject;
            // if "全部" is selected, reset selectedSubject 
            if (selectedSubject === '全部') {
                selectedSubject = null;
            }
            document.getElementById('dropdownButton1').textContent = this.textContent;
            filterData();
        });
    });

    document.querySelectorAll('#dropdown2 a').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            selectedType = this.dataset.type;
            // if "全部" is selected, reset selectedType
            if (selectedType === '全部') {
                selectedType = null;
            }
            document.getElementById('dropdownButton2').textContent = this.textContent;
            filterData();
        });
    });

    document.querySelectorAll('#dropdown3 a').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            selectedTerm = this.dataset.term;
            // if "全部" is selected, reset selectedTerm
            if (selectedTerm === '全部') {
                selectedTerm = null;
            }
            document.getElementById('dropdownButton3').textContent = this.textContent;
            filterData();
        });
    });

    function filterData() {
        const dataItems = document.querySelectorAll('.data-item');
        dataItems.forEach(item => {
            const matchesSubject = selectedSubject ? item.dataset.subject === selectedSubject : true;
            const matchesType = selectedType ? item.dataset.type === selectedType : true;
            const matchesTerm = selectedTerm ? item.dataset.term === selectedTerm : true;

            if (matchesSubject && matchesType && matchesTerm) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // implement search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const dataItems = document.querySelectorAll('.data-item');
        dataItems.forEach(item => {
            const title = item.querySelector('h3').textContent.toLowerCase();
            const description = item.querySelector('p').textContent.toLowerCase();
            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
    
</script>





<?php get_footer(); ?>