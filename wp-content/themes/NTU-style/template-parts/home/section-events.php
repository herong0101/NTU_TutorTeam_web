<?php
if (!defined('ABSPATH')) exit;

$today = date('Y-m-d');

// 查詢未來活動，若無則抓最近 5 筆
$args = [
  'post_type'      => 'event',
  'posts_per_page' => 5,
  'meta_key'       => '_event_date',
  'orderby'        => 'meta_value',
  'order'          => 'ASC',
  'meta_query'     => [[
    'key'     => '_event_date',
    'value'   => $today,
    'compare' => '>=',
    'type'    => 'DATE'
  ]],
];
$q = new WP_Query($args);
if (!$q->have_posts()) {
  $args['meta_query'] = [];
  $args['order'] = 'DESC';
  $q = new WP_Query($args);
}

// 標籤顏色
function ntu_event_badge_color($term_name) {
  return match ($term_name) {
    '經費補助' => 'bg-red-500',
    '社會服務' => 'bg-purple-600',
    '國際交流' => 'bg-sky-400',
    default     => 'bg-gray-400',
  };
}
?>

<section class="mt-16 mb-16 px-4">
  <div class="grid grid-cols-10 mx-auto max-w-full px-2 sm:px-4 md:px-8">
    <div class="col-span-8 col-start-2">
    <!-- 標題 -->
    <h2 class="font-Zen-Old-Mincho text-center text-3xl md:text-4xl font-bold text-gray-900 mb-10 tracking-tight">
      — 近期活動 —
    </h2>

    <?php if ($q->have_posts()): ?>
      <!-- 外框容器 -->
   <div class="border border-gray-200 rounded-2xl shadow-md px-3 sm:px-5 py-4 sm:py-6"
     style="background: linear-gradient(135deg, #ffa5a5 0%, #f37f65 100%); max-width:1400px; min-height:200px; margin-left:auto; margin-right:auto;">
  <ul class="divide-y divide-gray-50 divide-2">
          <?php while ($q->have_posts()): $q->the_post(); ?>
            <?php
              $pid        = get_the_ID();
              $event_date = get_post_meta($pid, '_event_date', true);
              $event_end  = get_post_meta($pid, '_event_end_date', true);
              $badge_name = '';
              $terms = get_the_terms($pid, 'event_category');
              if ($terms && !is_wp_error($terms)) $badge_name = $terms[0]->name;
              $badge_color = ntu_event_badge_color($badge_name);
              $date_label = $event_date ? date_i18n('Y-m-d', strtotime($event_date)) : get_the_date('Y-m-d');
            ?>
            <li class="hover:bg-gray-50 transition rounded-lg" style="border-bottom: 2px solid #ffd2c8;">
              <a href="<?php the_permalink(); ?>" class="grid grid-cols-3 gap-x-8 py-2 px-1 items-center text-center" style="grid-template-columns: 340px 220px 1fr; min-height: 48px;">
                <!-- 類別（箭頭標籤） -->
                <div class="flex items-center justify-center h-full w-full">
                  <?php if ($badge_name): ?>
                    <span class="inline-block relative px-4 py-1 text-base font-bold tracking-wide text-white align-middle rounded font-Zen-Old-Mincho" style="background:<?php echo $badge_color === 'bg-red-500' ? '#e53935' : ($badge_color === 'bg-purple-600' ? '#7c3aed' : ($badge_color === 'bg-sky-400' ? '#38bdf8' : '#9ca3af')); ?>; display: flex; align-items: center; justify-content: center; height: 32px;">
                      <?php echo esc_html($badge_name); ?>
                    </span>
                  <?php endif; ?>
                </div>
                <!-- 日期 -->
                <div class="flex items-center justify-center h-full w-full">
                  <time class="text-lg font-semibold text-gray-700 align-middle w-full justify-self-end font-Zen-Old-Mincho" style="display: flex; align-items: center; justify-content: flex-end;">
                    <?php echo esc_html($date_label); ?>
                  </time>
                </div>
                <!-- 活動名稱 -->
                <div class="flex items-center justify-center h-full w-full">
                  <span class="text-2xl font-bold text-gray-900 truncate align-middle w-full font-Zen-Old-Mincho" style="display: flex; align-items: center; justify-content: center;">
                    <?php the_title(); ?>
                  </span>
                </div>
              </a>
            </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>

        <!-- 更多活動按鈕 -->
  <div class="flex justify-center" style="margin-top:16px;">
          <a href="<?php echo esc_url( get_post_type_archive_link('event') ); ?>"
             class="inline-flex items-center justify-center whitespace-nowrap rounded-full font-bold text-base px-8 py-2.5 bg-white text-black border border-[#1a2533] shadow-lg hover:shadow-2xl hover:-translate-y-1 hover:brightness-110 transition-all duration-200 font-Zen-Old-Mincho" style="box-shadow: 0 4px 16px 0 #20304522;">
            更多活動
          </a>
        </div>
      </div>
    <?php else: ?>
  <p class="text-center text-gray-500">目前沒有活動。</p>
    <?php endif; ?>
  </div>
  </div>
</section>
