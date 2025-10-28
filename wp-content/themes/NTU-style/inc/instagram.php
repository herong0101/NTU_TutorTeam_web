<?php
/**
 * Instagram API Integration
 *
 * @package NTU_TutorTeam_Web
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get Instagram posts from API with caching
 *
 * @param int $limit Number of posts to retrieve
 * @return array|false Array of posts or false on failure
 */
function ntu_get_instagram_posts($limit = 3) {
    // Get access token from settings
    $options = get_option('ntu_homepage_settings');
    $access_token = isset($options['instagram_access_token']) ? trim($options['instagram_access_token']) : '';

    // Return false if no token
    if (empty($access_token)) {
        return false;
    }

    // Check cache first
    $cache_key = 'ntu_ig_feed_' . md5($access_token . $limit);
    $cached_posts = get_transient($cache_key);

    if (false !== $cached_posts) {
        return $cached_posts;
    }

    // Fetch from API
    $api_url = add_query_arg(array(
        'fields' => 'id,caption,permalink,media_url,media_type,thumbnail_url,timestamp',
        'limit'  => $limit,
        'access_token' => $access_token,
    ), 'https://graph.instagram.com/me/media');

    $response = wp_remote_get($api_url, array(
        'timeout' => 15,
        'sslverify' => true,
    ));

    // Check for errors
    if (is_wp_error($response)) {
        error_log('Instagram API Error: ' . $response->get_error_message());
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Check for API errors
    if (!isset($data['data']) || empty($data['data'])) {
        error_log('Instagram API returned no data or error: ' . $body);
        return false;
    }

    $posts = array();

    foreach ($data['data'] as $item) {
        $post = array(
            'id' => sanitize_text_field($item['id']),
            'caption' => isset($item['caption']) ? wp_kses_post($item['caption']) : '',
            'permalink' => esc_url_raw($item['permalink']),
            'media_type' => sanitize_text_field($item['media_type']),
            'timestamp' => isset($item['timestamp']) ? sanitize_text_field($item['timestamp']) : '',
        );

        // Handle different media types
        if ($item['media_type'] === 'IMAGE' || $item['media_type'] === 'CAROUSEL_ALBUM') {
            $post['media_url'] = esc_url_raw($item['media_url']);
        } elseif ($item['media_type'] === 'VIDEO') {
            // Use thumbnail for videos
            $post['media_url'] = isset($item['thumbnail_url']) ? esc_url_raw($item['thumbnail_url']) : esc_url_raw($item['media_url']);
            $post['is_video'] = true;
        }

        $posts[] = $post;
    }

    // Cache for 1 hour
    set_transient($cache_key, $posts, HOUR_IN_SECONDS);

    return $posts;
}

/**
 * Clear Instagram cache (useful for debugging or manual refresh)
 */
function ntu_clear_instagram_cache() {
    $options = get_option('ntu_homepage_settings');
    $access_token = isset($options['instagram_access_token']) ? trim($options['instagram_access_token']) : '';
    
    if (!empty($access_token)) {
        $cache_key = 'ntu_ig_feed_' . md5($access_token . 3);
        delete_transient($cache_key);
    }
}

/**
 * Add admin notice for Instagram connection status
 */
function ntu_instagram_admin_notice() {
    $screen = get_current_screen();
    
    if ($screen->id !== 'settings_page_ntu-homepage-settings') {
        return;
    }

    $options = get_option('ntu_homepage_settings');
    $access_token = isset($options['instagram_access_token']) ? trim($options['instagram_access_token']) : '';

    if (empty($access_token)) {
        ?>
        <div class="notice notice-warning">
            <p><strong>Instagram 未設定：</strong>請在下方填入 Access Token 以啟用 Instagram 區塊。</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'ntu_instagram_admin_notice');

/**
 * Truncate text to specified length
 *
 * @param string $text Text to truncate
 * @param int $length Maximum length
 * @param string $suffix Suffix to add
 * @return string Truncated text
 */
function ntu_truncate_text($text, $length = 100, $suffix = '...') {
    if (mb_strlen($text) <= $length) {
        return $text;
    }
    
    return mb_substr($text, 0, $length) . $suffix;
}
