<?php
/**
 * Meta Boxes for Custom Post Types
 *
 * @package NTU_TutorTeam_Web
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add meta boxes for Event CPT
 */
function ntu_event_meta_boxes() {
    add_meta_box(
        'event_details',
        '活動詳細資訊',
        'ntu_event_meta_box_callback',
        'event',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ntu_event_meta_boxes');

/**
 * Event meta box callback
 */
function ntu_event_meta_box_callback($post) {
    wp_nonce_field('ntu_event_meta_box', 'ntu_event_meta_box_nonce');
    
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);
    $event_link = get_post_meta($post->ID, '_event_link', true);
    ?>
    
    <div style="margin-bottom: 15px;">
        <label for="event_date" style="display: block; margin-bottom: 5px; font-weight: 600;">
            活動日期 <span style="color: red;">*</span>
        </label>
        <input 
            type="date" 
            id="event_date" 
            name="event_date" 
            value="<?php echo esc_attr($event_date); ?>" 
            style="width: 100%; max-width: 300px; padding: 8px;"
            required
        />
        <p style="margin: 5px 0 0; color: #666; font-size: 12px;">格式：YYYY-MM-DD</p>
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="event_location" style="display: block; margin-bottom: 5px; font-weight: 600;">
            活動地點
        </label>
        <input 
            type="text" 
            id="event_location" 
            name="event_location" 
            value="<?php echo esc_attr($event_location); ?>" 
            style="width: 100%; max-width: 500px; padding: 8px;"
            placeholder="例如：臺大第二活動中心 901 室"
        />
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="event_link" style="display: block; margin-bottom: 5px; font-weight: 600;">
            外部連結（報名連結）
        </label>
        <input 
            type="url" 
            id="event_link" 
            name="event_link" 
            value="<?php echo esc_attr($event_link); ?>" 
            style="width: 100%; padding: 8px;"
            placeholder="https://example.com/register"
        />
        <p style="margin: 5px 0 0; color: #666; font-size: 12px;">選填：活動報名或詳細資訊的外部連結</p>
    </div>
    
    <?php
}

/**
 * Save event meta box data
 */
function ntu_save_event_meta_box($post_id) {
    // Check nonce
    if (!isset($_POST['ntu_event_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['ntu_event_meta_box_nonce'], 'ntu_event_meta_box')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save event date
    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
    }

    // Save event location
    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
    }

    // Save event link
    if (isset($_POST['event_link'])) {
        update_post_meta($post_id, '_event_link', esc_url_raw($_POST['event_link']));
    }
}
add_action('save_post_event', 'ntu_save_event_meta_box');

/**
 * Add meta boxes for Partner CPT
 */
function ntu_partner_meta_boxes() {
    add_meta_box(
        'partner_details',
        '合作夥伴資訊',
        'ntu_partner_meta_box_callback',
        'partner',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ntu_partner_meta_boxes');

/**
 * Partner meta box callback
 */
function ntu_partner_meta_box_callback($post) {
    wp_nonce_field('ntu_partner_meta_box', 'ntu_partner_meta_box_nonce');
    
    $partner_url = get_post_meta($post->ID, '_partner_url', true);
    ?>
    
    <div style="margin-bottom: 15px;">
        <label for="partner_url" style="display: block; margin-bottom: 5px; font-weight: 600;">
            合作夥伴官網連結
        </label>
        <input 
            type="url" 
            id="partner_url" 
            name="partner_url" 
            value="<?php echo esc_attr($partner_url); ?>" 
            style="width: 100%; padding: 8px;"
            placeholder="https://example.com"
        />
        <p style="margin: 5px 0 0; color: #666; font-size: 12px;">選填：點擊 Logo 時會導向此連結</p>
    </div>
    
    <div style="padding: 15px; background: #f0f0f1; border-radius: 4px; margin-top: 20px;">
        <p style="margin: 0; font-size: 13px; line-height: 1.6;">
            <strong>提示：</strong><br>
            1. 請在右側「特色圖片」區塊上傳合作夥伴的 Logo<br>
            2. 使用「順序」欄位（右側）控制顯示順序，數字越小越靠前<br>
            3. Logo 建議尺寸：寬度 300px 以上，PNG 格式（透明背景）
        </p>
    </div>
    
    <?php
}

/**
 * Save partner meta box data
 */
function ntu_save_partner_meta_box($post_id) {
    // Check nonce
    if (!isset($_POST['ntu_partner_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['ntu_partner_meta_box_nonce'], 'ntu_partner_meta_box')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save partner URL
    if (isset($_POST['partner_url'])) {
        update_post_meta($post_id, '_partner_url', esc_url_raw($_POST['partner_url']));
    }
}
add_action('save_post_partner', 'ntu_save_partner_meta_box');

/**
 * Add custom fields to Event Category taxonomy
 */
function ntu_event_category_add_form_fields() {
    ?>
    <div class="form-field">
        <label for="category_color">標籤顏色</label>
        <select name="category_color" id="category_color" style="padding: 8px; width: 300px;">
            <option value="bg-amber-600">琥珀棕 (Amber)</option>
            <option value="bg-orange-600">橘棕色 (Orange)</option>
            <option value="bg-yellow-700">芥末黃 (Mustard)</option>
            <option value="bg-lime-700">橄欖綠 (Olive)</option>
            <option value="bg-green-700">森林綠 (Forest)</option>
            <option value="bg-teal-700">青綠色 (Teal)</option>
            <option value="bg-cyan-700">湖水藍 (Cyan)</option>
            <option value="bg-sky-600">天空藍 (Sky)</option>
            <option value="bg-blue-700">深藍色 (Blue)</option>
            <option value="bg-indigo-700">靛藍色 (Indigo)</option>
            <option value="bg-purple-700">紫色 (Purple)</option>
            <option value="bg-pink-700">粉色 (Pink)</option>
            <option value="bg-rose-700">玫瑰紅 (Rose)</option>
            <option value="bg-red-700">紅色 (Red)</option>
            <option value="bg-stone-600">石灰色 (Stone)</option>
            <option value="bg-neutral-600">中性灰 (Neutral)</option>
        </select>
        <p>選擇此分類標籤在前台顯示的顏色（大地色系配色）</p>
    </div>
    <?php
}
add_action('event_category_add_form_fields', 'ntu_event_category_add_form_fields');

/**
 * Add custom fields to Event Category edit form
 */
function ntu_event_category_edit_form_fields($term) {
    $color = get_term_meta($term->term_id, 'category_color', true);
    if (empty($color)) {
        $color = 'bg-amber-600';
    }
    ?>
    <tr class="form-field">
        <th scope="row">
            <label for="category_color">標籤顏色</label>
        </th>
        <td>
            <select name="category_color" id="category_color" style="padding: 8px; width: 300px;">
                <option value="bg-amber-600" <?php selected($color, 'bg-amber-600'); ?>>琥珀棕 (Amber)</option>
                <option value="bg-orange-600" <?php selected($color, 'bg-orange-600'); ?>>橘棕色 (Orange)</option>
                <option value="bg-yellow-700" <?php selected($color, 'bg-yellow-700'); ?>>芥末黃 (Mustard)</option>
                <option value="bg-lime-700" <?php selected($color, 'bg-lime-700'); ?>>橄欖綠 (Olive)</option>
                <option value="bg-green-700" <?php selected($color, 'bg-green-700'); ?>>森林綠 (Forest)</option>
                <option value="bg-teal-700" <?php selected($color, 'bg-teal-700'); ?>>青綠色 (Teal)</option>
                <option value="bg-cyan-700" <?php selected($color, 'bg-cyan-700'); ?>>湖水藍 (Cyan)</option>
                <option value="bg-sky-600" <?php selected($color, 'bg-sky-600'); ?>>天空藍 (Sky)</option>
                <option value="bg-blue-700" <?php selected($color, 'bg-blue-700'); ?>>深藍色 (Blue)</option>
                <option value="bg-indigo-700" <?php selected($color, 'bg-indigo-700'); ?>>靛藍色 (Indigo)</option>
                <option value="bg-purple-700" <?php selected($color, 'bg-purple-700'); ?>>紫色 (Purple)</option>
                <option value="bg-pink-700" <?php selected($color, 'bg-pink-700'); ?>>粉色 (Pink)</option>
                <option value="bg-rose-700" <?php selected($color, 'bg-rose-700'); ?>>玫瑰紅 (Rose)</option>
                <option value="bg-red-700" <?php selected($color, 'bg-red-700'); ?>>紅色 (Red)</option>
                <option value="bg-stone-600" <?php selected($color, 'bg-stone-600'); ?>>石灰色 (Stone)</option>
                <option value="bg-neutral-600" <?php selected($color, 'bg-neutral-600'); ?>>中性灰 (Neutral)</option>
            </select>
            <p class="description">選擇此分類標籤在前台顯示的顏色（大地色系配色）</p>
            
            <!-- Color Preview -->
            <div style="margin-top: 15px;">
                <p style="margin-bottom: 8px; font-weight: 600;">顏色預覽：</p>
                <div style="display: inline-flex; gap: 8px; flex-wrap: wrap; max-width: 600px;">
                    <span class="<?php echo esc_attr($color); ?> text-white text-sm px-4 py-2 rounded-md">範例標籤</span>
                </div>
            </div>
        </td>
    </tr>
    <?php
}
add_action('event_category_edit_form_fields', 'ntu_event_category_edit_form_fields');

/**
 * Save Event Category custom fields
 */
function ntu_save_event_category_custom_fields($term_id) {
    if (isset($_POST['category_color'])) {
        update_term_meta($term_id, 'category_color', sanitize_text_field($_POST['category_color']));
    }
}
add_action('created_event_category', 'ntu_save_event_category_custom_fields');
add_action('edited_event_category', 'ntu_save_event_category_custom_fields');
