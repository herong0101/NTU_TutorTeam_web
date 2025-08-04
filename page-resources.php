<?php
/* Template Name: Resources */
get_header('resources');
?>

<section class="container mx-auto p-4 bg-gray-50">
    
    <!-- List Boxes -->
    <div class="flex flex-row space-x-6">
        <!-- List Box 1 -->
        <div class="relative inline-block flex flex-col space-y-2 w-40">
            <span class="text-sm">科目</span>
            <button id="dropdownButton1" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700 text-left inline-flex items-center justify-between" type="button">選擇科目</button>
            <div id="dropdown1" class="absolute z-10 hidden bg-white w-full border border-gray-300 rounded-md shadow-lg" style="top: 100%;">
                <ul class="py-1 text-sm text-gray-700">
                    <!-- 數甲、分科物理化學生物會再加入(resources.json也要改) -->
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="全部">全部</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="國文">國文</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="英文">英文</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="數學">數學</a></li>
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
            <button id="dropdownButton2" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700 text-left inline-flex items-center justify-between" type="button">選擇類型</button>
            <div id="dropdown2" class="absolute z-10 hidden bg-white w-full border border-gray-300 rounded-md shadow-lg" style="top: 100%;">
                <ul class="py-1 text-sm text-gray-700">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="全部">全部</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="114"></a>114學年</li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="113"></a>113學年</li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="112">112學年</a></li>
                </ul>
            </div>
        </div>

        <!-- add search bar to find corresponding resources from resources.json -->
        <div class="relative inline-block flex flex-col space-y-2 w-40">
            <span class="text-sm">搜尋</span>
            <input type="text" id="searchInput" placeholder="搜尋描述..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>
    
    
    <script>
        // Toggle dropdowns independently
        document.getElementById('dropdownButton1').addEventListener('click', function() {
            const dropdown1 = document.getElementById('dropdown1');
            dropdown1.classList.toggle('hidden');
        });
        document.getElementById('dropdownButton2').addEventListener('click', function() {
            const dropdown2 = document.getElementById('dropdown2');
            dropdown2.classList.toggle('hidden');
        });

        // hide list if user click outside of the listbox
        document.addEventListener('click', function(event) {
            const dropdown1 = document.getElementById('dropdown1');
            const dropdown2 = document.getElementById('dropdown2');
            if (!event.target.closest('#dropdownButton1') && !event.target.closest('#dropdown1')) {
                dropdown1.classList.add('hidden');
            }
            if (!event.target.closest('#dropdownButton2') && !event.target.closest('#dropdown2')) {
                dropdown2.classList.add('hidden');
            }
        });
    </script>

    <!-- Data Display -->
    <div id="data-container" class="mt-6">
        <!-- add data from resources.json -->
        <?php
        // Get the current user
        $current_user = wp_get_current_user();
        $is_authorized_student = in_array( 'authorized_student', (array) $current_user->roles );

        $json_file = get_template_directory() . '/resources.json';

        if (file_exists($json_file)) {
            $json_data = file_get_contents($json_file);
            $all_resources = json_decode($json_data, true);
            $resources_to_display = array();

            if ($is_authorized_student) {
                // Authorized students see all resources
                $resources_to_display = $all_resources;
            } else {
                // Normal users see only resources older than one year
                $one_year_ago = new DateTime('-1 year');
                foreach ($all_resources as $resource) {
                    $resource_date = DateTime::createFromFormat('Y/m/d', $resource['date']);
                    if ($resource_date && $resource_date < $one_year_ago) {
                        $resources_to_display[] = $resource;
                    }
                }
            }

            if (empty($resources_to_display)) {
                echo '<p>目前沒有可用的資源。</p>';
            } else {
                foreach ($resources_to_display as $resource) {
                    echo '<div class="data-item" data-subject="' . esc_attr($resource['subject']) . '" data-type="' . esc_attr($resource['type']) . '">';
                    echo '<span>' . esc_html($resource['date']) . '</span>';
                    echo '<span>' . esc_html($resource['description']) . '</span>';
                    echo '<a href="' . esc_url($resource['link']) . '" target="_blank">外部連結</a>';
                    echo '</div>';
                }
            }
        } else {
            echo '<p>資源檔案不存在。</p>';
        }
        ?>

    </div>
</section>

<script>
    // JavaScript for filtering data
    let selectedSubject = null;
    let selectedType = null;

    document.querySelectorAll('#dropdown1 a').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            selectedSubject = this.dataset.subject;
            // if "全部" is selected, reset selectedSubject 
            if (selectedSubject === '全部') {
                selectedSubject = null;
            }
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
            filterData();
        });
    });
    function filterData() {
        const dataItems = document.querySelectorAll('.data-item');
        dataItems.forEach(item => {
            const matchesSubject = selectedSubject ? item.dataset.subject === selectedSubject : true;
            const matchesType = selectedType ? item.dataset.type === selectedType : true;

            if (matchesSubject && matchesType) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // implement lazy loading with pagination to first show 4 items, while user can click "load more" to load 4 more items and previously loaded items will not be removed
    let currentPage = 0;
    const itemsPerPage = 4;
    function loadMoreItems() {
        const dataItems = document.querySelectorAll('.data-item');
        const totalItems = dataItems.length;
        const start = currentPage * itemsPerPage;
        const end = start + itemsPerPage;

        for (let i = start; i < end && i < totalItems; i++) {
            dataItems[i].style.display = 'block';
        }

        currentPage++;
        if (end >= totalItems) {
            document.getElementById('loadMoreButton').style.display = 'none';
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        loadMoreItems(); // Load initial items
        document.getElementById('loadMoreButton').addEventListener('click', loadMoreItems);
    });
    // Add "Load More" button
    const loadMoreButton = document.createElement('button');
    loadMoreButton.id = 'loadMoreButton';
    loadMoreButton.className = 'w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-700 hover:bg-gray-50';
    loadMoreButton.textContent = '載入更多';
    document.getElementById('data-container').appendChild(loadMoreButton);
    // Initially hide all items except the first 4
    const dataItems = document.querySelectorAll('.data-item');
    dataItems.forEach((item, index) => {
        if (index >= 4) {
            item.style.display = 'none';
        }
    });
    

    // implement search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const dataItems = document.querySelectorAll('.data-item');
        dataItems.forEach(item => {
            const description = item.querySelector('span:nth-child(2)').textContent.toLowerCase();
            if (description.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
    
</script>





<?php get_footer(); ?>