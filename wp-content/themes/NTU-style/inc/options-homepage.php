<?php
/**
 * Homepage Settings (Options API)
 *
 * @package NTU_TutorTeam_Web
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register homepage settings page
 */
function ntu_homepage_settings_page() {
    add_options_page(
        '首頁設定',
        '首頁設定',
        'manage_options',
        'ntu-homepage-settings',
        'ntu_homepage_settings_page_html'
    );
}
add_action('admin_menu', 'ntu_homepage_settings_page');

/**
 * Register settings
 */
function ntu_homepage_settings_init() {
    register_setting('ntu_homepage', 'ntu_homepage_settings');

    add_settings_section(
        'ntu_homepage_intro_section',
        '計畫簡介區塊',
        'ntu_homepage_intro_section_callback',
        'ntu_homepage'
    );

    add_settings_field(
        'intro_title',
        '標題',
        'ntu_intro_title_field_callback',
        'ntu_homepage',
        'ntu_homepage_intro_section'
    );

    add_settings_field(
        'intro_body',
        '內容',
        'ntu_intro_body_field_callback',
        'ntu_homepage',
        'ntu_homepage_intro_section'
    );

    add_settings_field(
        'intro_bg_id',
        '背景圖片',
        'ntu_intro_bg_field_callback',
        'ntu_homepage',
        'ntu_homepage_intro_section'
    );

    add_settings_section(
        'ntu_homepage_instagram_section',
        'Instagram 設定',
        'ntu_homepage_instagram_section_callback',
        'ntu_homepage'
    );

    add_settings_field(
        'instagram_access_token',
        'Access Token',
        'ntu_instagram_token_field_callback',
        'ntu_homepage',
        'ntu_homepage_instagram_section'
    );
}
add_action('admin_init', 'ntu_homepage_settings_init');

/**
 * Section callbacks
 */
function ntu_homepage_intro_section_callback() {
    echo '<p>設定首頁「計畫簡介」區塊的內容</p>';
}

function ntu_homepage_instagram_section_callback() {
    echo '<p>設定 Instagram Basic Display API 的存取權杖</p>';
    echo '<p><a href="https://developers.facebook.com/docs/instagram-basic-display-api/getting-started" target="_blank" rel="noopener">如何取得 Access Token？</a></p>';
}

/**
 * Field callbacks
 */
function ntu_intro_title_field_callback() {
    $options = get_option('ntu_homepage_settings');
    $value = isset($options['intro_title']) ? $options['intro_title'] : '';
    ?>
    <input 
        type="text" 
        name="ntu_homepage_settings[intro_title]" 
        value="<?php echo esc_attr($value); ?>" 
        class="regular-text"
        placeholder="臺大升學輔導種子計畫"
    />
    <?php
}

function ntu_intro_body_field_callback() {
    $options = get_option('ntu_homepage_settings');
    $value = isset($options['intro_body']) ? $options['intro_body'] : '';
    
    wp_editor($value, 'ntu_intro_body', array(
        'textarea_name' => 'ntu_homepage_settings[intro_body]',
        'textarea_rows' => 10,
        'media_buttons' => false,
        'teeny' => true,
    ));
}

function ntu_intro_bg_field_callback() {
    $options = get_option('ntu_homepage_settings');
    $image_id = isset($options['intro_bg_id']) ? $options['intro_bg_id'] : '';
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
    ?>
    
    <div class="ntu-image-upload-wrapper">
        <input 
            type="hidden" 
            id="intro_bg_id" 
            name="ntu_homepage_settings[intro_bg_id]" 
            value="<?php echo esc_attr($image_id); ?>"
        />
        
        <div id="intro-bg-preview" style="margin-bottom: 10px;">
            <?php if ($image_url): ?>
                <img src="<?php echo esc_url($image_url); ?>" style="max-width: 400px; height: auto; display: block; border: 1px solid #ddd; padding: 5px;" />
            <?php endif; ?>
        </div>
        
        <button type="button" class="button" id="intro-bg-upload-btn">
            <?php echo $image_url ? '更換圖片' : '選擇圖片'; ?>
        </button>
        
        <?php if ($image_url): ?>
            <button type="button" class="button" id="intro-bg-remove-btn">移除圖片</button>
        <?php endif; ?>
        
        <p class="description">建議尺寸：1920x1080 或更大</p>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        
        $('#intro-bg-upload-btn').click(function(e) {
            e.preventDefault();
            
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            
            mediaUploader = wp.media({
                title: '選擇背景圖片',
                button: {
                    text: '使用此圖片'
                },
                multiple: false
            });
            
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#intro_bg_id').val(attachment.id);
                $('#intro-bg-preview').html('<img src="' + attachment.url + '" style="max-width: 400px; height: auto; display: block; border: 1px solid #ddd; padding: 5px;" />');
                $('#intro-bg-upload-btn').text('更換圖片');
                if (!$('#intro-bg-remove-btn').length) {
                    $('#intro-bg-upload-btn').after('<button type="button" class="button" id="intro-bg-remove-btn">移除圖片</button>');
                }
            });
            
            mediaUploader.open();
        });
        
        $(document).on('click', '#intro-bg-remove-btn', function(e) {
            e.preventDefault();
            $('#intro_bg_id').val('');
            $('#intro-bg-preview').html('');
            $('#intro-bg-upload-btn').text('選擇圖片');
            $(this).remove();
        });
    });
    </script>
    <?php
}

function ntu_instagram_token_field_callback() {
    $options = get_option('ntu_homepage_settings');
    $value = isset($options['instagram_access_token']) ? $options['instagram_access_token'] : '';
    ?>
    <input 
        type="text" 
        name="ntu_homepage_settings[instagram_access_token]" 
        value="<?php echo esc_attr($value); ?>" 
        class="large-text"
        placeholder="請貼上 Instagram Access Token"
    />
    <p class="description">
        留空則首頁不顯示 Instagram 區塊，改為顯示空狀態（追蹤我們的連結）
    </p>
    
    <?php if ($value): ?>
        <p>
            <button type="button" class="button" onclick="ntuTestInstagramToken()">測試 Token</button>
            <span id="ntu-ig-test-result" style="margin-left: 10px;"></span>
        </p>
        
        <script>
        function ntuTestInstagramToken() {
            var result = document.getElementById('ntu-ig-test-result');
            result.innerHTML = '<span style="color: #999;">測試中...</span>';
            
            fetch('https://graph.instagram.com/me?fields=id,username&access_token=<?php echo esc_js($value); ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.username) {
                        result.innerHTML = '<span style="color: green;">✓ Token 有效！帳號：@' + data.username + '</span>';
                    } else {
                        result.innerHTML = '<span style="color: red;">✗ Token 無效或已過期</span>';
                    }
                })
                .catch(error => {
                    result.innerHTML = '<span style="color: red;">✗ 連線失敗</span>';
                });
        }
        </script>
    <?php endif; ?>
    <?php
}

/**
 * Settings page HTML
 */
function ntu_homepage_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_GET['settings-updated'])) {
        add_settings_error('ntu_homepage_messages', 'ntu_homepage_message', '設定已儲存', 'updated');
    }

    settings_errors('ntu_homepage_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <form action="options.php" method="post">
            <?php
            settings_fields('ntu_homepage');
            do_settings_sections('ntu_homepage');
            submit_button('儲存設定');
            ?>
        </form>
        
        <hr style="margin: 40px 0;">
        
        <div style="background: #f0f0f1; padding: 20px; border-radius: 4px;">
            <h2 style="margin-top: 0;">快速連結</h2>
            <ul style="line-height: 2;">
                <li><a href="<?php echo admin_url('edit.php?post_type=event'); ?>">管理活動</a></li>
                <li><a href="<?php echo admin_url('post-new.php?post_type=event'); ?>">新增活動</a></li>
                <li><a href="<?php echo admin_url('edit.php?post_type=partner'); ?>">管理合作夥伴</a></li>
                <li><a href="<?php echo admin_url('post-new.php?post_type=partner'); ?>">新增合作夥伴</a></li>
                <li><a href="<?php echo home_url('/'); ?>" target="_blank">檢視首頁</a></li>
            </ul>
        </div>
    </div>
    <?php
}
