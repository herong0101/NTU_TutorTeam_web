<?php
/* Template Name: Resources */
get_header('resources');
?>

<section class="container mx-auto p-4">
    
    <!-- List Boxes -->
    <div class="flex flex-row space-x-6">
        <!-- List Box 1 -->
        <div class="relative inline-block flex flex-col space-y-2">
            <span class="text-sm">科目</span>
            <button id="dropdownButton1" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">選擇科目</button>
            <div id="dropdown1" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="國文">國文</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="英文">英文</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="數學">數學</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-subject="物理">物理</a></li>
                </ul>
            </div>
        </div>

        <!-- List Box 2 -->
        <div class="relative inline-block flex flex-col space-y-2">
            <span class="text-sm">類型</span>
            <button id="dropdownButton2" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">選擇類型</button>
            <div id="dropdown2" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="全部">全部</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="講義">講義</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="習題">習題</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100" data-type="影片">影片</a></li>
                </ul>
            </div>
        </div>

        <!-- add search bar -->
         <!-- 2025/7/15 -->
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

    <!-- Display Box -->
    <!-- <div class="bg-[#F37F65] text-white p-4 rounded-lg flex justify-between items-center mb-4" style="margin-top:160px">
        <span>113-2</span>
        <span>一些對於該資料夾內講義的簡單描述</span>
        <a href="https://example.com" target="_blank">
            <button class="bg-[#F37F65] border-none text-white p-2 rounded-lg cursor-pointer hover:bg-[#e66b50] transition-colors">Redirect</button>
        </a>
    </div> -->

    <!-- Data Display -->
    <div id="data-container" class="mt-6">
        <!-- Example Data -->
        <div class="data-item" data-subject="國文" data-type="講義">
            <span>2025/07/02</span>
            <span>國文講義描述</span>
            <a href="https://example.com" target="_blank">外部連結</a>
        </div>
        <div class="data-item" data-subject="英文" data-type="習題">
            <span>2025/07/03</span>
            <span>英文習題描述</span>
            <a href="https://example.com" target="_blank">外部連結</a>
        </div>

        <!-- add data from resources.json -->
        <?php
        $json_file = get_template_directory() . '/resources.json';

        if (file_exists($json_file)) {
            $json_data = file_get_contents($json_file);
            $resources = json_decode($json_data, true);
            foreach ($resources as $resource) {
                echo '<div class="data-item" data-subject="' . esc_attr($resource['subject']) . '" data-type="' . esc_attr($resource['type']) . '">';
                echo '<span>' . esc_html($resource['date']) . '</span>';
                echo '<span>' . esc_html($resource['description']) . '</span>';
                echo '<a href="' . esc_url($resource['link']) . '" target="_blank">外部連結</a>';
                echo '</div>';
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

    // implement lazy loading with pagination to first show 20 items
    let currentPage = 1;
    const itemsPerPage = 20;    
    function loadMoreData() {
        const dataItems = document.querySelectorAll('.data-item');
        const totalItems = dataItems.length;
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        for (let i = 0; i < totalItems; i++) {
            if (i >= start && i < end) {
                dataItems[i].style.display = 'block';
            } else {
                dataItems[i].style.display = 'none';
            }
        }

        currentPage++;
        if (end >= totalItems) {
            document.getElementById('load-more-button').style.display = 'none';
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        loadMoreData();
        const loadMoreButton = document.createElement('button');
        loadMoreButton.id = 'load-more-button';
        loadMoreButton.textContent = '載入更多';
        loadMoreButton.className = 'bg-blue-500 text-gray-600 px-4 py-2 rounded mt-4';
        loadMoreButton.addEventListener('click', loadMoreData);
        document.getElementById('data-container').appendChild(loadMoreButton);
    });


</script>





<?php get_footer(); ?>