<?php
/**
 * Register Custom Post Types
 *
 * @package NTU_TutorTeam_Web
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Event CPT
 */
function ntu_register_event_cpt() {
    $labels = array(
        'name'                  => '活動',
        'singular_name'         => '活動',
        'menu_name'             => '活動管理',
        'name_admin_bar'        => '活動',
        'add_new'               => '新增活動',
        'add_new_item'          => '新增活動',
        'new_item'              => '新活動',
        'edit_item'             => '編輯活動',
        'view_item'             => '檢視活動',
        'all_items'             => '所有活動',
        'search_items'          => '搜尋活動',
        'not_found'             => '找不到活動',
        'not_found_in_trash'    => '回收桶內找不到活動'
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'event'),
        'capability_type'       => 'post',
        'has_archive'           => 'event',
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-calendar-alt',
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes'),
        'show_in_rest'          => true,
    );

    register_post_type('event', $args);
}
add_action('init', 'ntu_register_event_cpt');

/**
 * Register Partner CPT
 */
function ntu_register_partner_cpt() {
    $labels = array(
        'name'                  => '合作夥伴',
        'singular_name'         => '合作夥伴',
        'menu_name'             => '合作夥伴',
        'name_admin_bar'        => '合作夥伴',
        'add_new'               => '新增夥伴',
        'add_new_item'          => '新增合作夥伴',
        'new_item'              => '新合作夥伴',
        'edit_item'             => '編輯合作夥伴',
        'view_item'             => '檢視合作夥伴',
        'all_items'             => '所有合作夥伴',
        'search_items'          => '搜尋合作夥伴',
        'not_found'             => '找不到合作夥伴',
        'not_found_in_trash'    => '回收桶內找不到合作夥伴'
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-groups',
        'supports'              => array('title', 'thumbnail', 'page-attributes', 'custom-fields'),
        'show_in_rest'          => true,
    );

    register_post_type('partner', $args);
}
add_action('init', 'ntu_register_partner_cpt');

/**
 * Register Event Category Taxonomy
 */
function ntu_register_event_category_taxonomy() {
    $labels = array(
        'name'                       => '活動分類',
        'singular_name'              => '活動分類',
        'menu_name'                  => '活動分類',
        'all_items'                  => '所有分類',
        'edit_item'                  => '編輯分類',
        'view_item'                  => '檢視分類',
        'update_item'                => '更新分類',
        'add_new_item'               => '新增分類',
        'new_item_name'              => '新分類名稱',
        'parent_item'                => '父層分類',
        'parent_item_colon'          => '父層分類：',
        'search_items'               => '搜尋分類',
        'popular_items'              => '熱門分類',
        'not_found'                  => '找不到分類',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => false,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'event-category'),
    );

    register_taxonomy('event_category', array('event'), $args);
}
add_action('init', 'ntu_register_event_category_taxonomy');

/**
 * Customize Event admin columns
 */
function ntu_event_custom_columns($columns) {
    $new_columns = array();
    
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        
        if ($key === 'title') {
            $new_columns['event_date'] = '活動日期';
            $new_columns['event_location'] = '地點';
        }
    }
    
    return $new_columns;
}
add_filter('manage_event_posts_columns', 'ntu_event_custom_columns');

/**
 * Populate custom columns
 */
function ntu_event_custom_column_content($column, $post_id) {
    switch ($column) {
        case 'event_date':
            $date = get_post_meta($post_id, '_event_date', true);
            echo $date ? esc_html($date) : '—';
            break;
        case 'event_location':
            $location = get_post_meta($post_id, '_event_location', true);
            echo $location ? esc_html($location) : '—';
            break;
    }
}
add_action('manage_event_posts_custom_column', 'ntu_event_custom_column_content', 10, 2);

/**
 * Make custom columns sortable
 */
function ntu_event_sortable_columns($columns) {
    $columns['event_date'] = 'event_date';
    return $columns;
}
add_filter('manage_edit-event_sortable_columns', 'ntu_event_sortable_columns');

/**
 * Sort by event date
 */
function ntu_event_orderby($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    $orderby = $query->get('orderby');

    if ('event_date' === $orderby) {
        $query->set('meta_key', '_event_date');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'ntu_event_orderby');

/**
 * Default order by event date DESC
 */
function ntu_event_default_order($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') === 'event' && !$query->get('orderby')) {
        $query->set('meta_key', '_event_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'DESC');
    }
}
add_action('pre_get_posts', 'ntu_event_default_order');
