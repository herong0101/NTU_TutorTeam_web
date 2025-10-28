<?php
/**
 * Template Name: Register Page
 * 註冊頁面模板
 */

// Check if user is logged in (from Google)
$current_user = wp_get_current_user();
$is_google_logged_in = is_user_logged_in();

// Check if user has completed registration (has custom fields)
$has_completed_registration = false;
if ($is_google_logged_in) {
    $real_name = get_user_meta($current_user->ID, 'real_name', true);
    $has_completed_registration = !empty($real_name);
}

// If already completed registration, redirect to home
if ($has_completed_registration) {
    wp_redirect(home_url('/'));
    exit;
}

// Handle registration form submission (after Google login)
$registration_errors = array();
$registration_success = false;

if (isset($_POST['submit_registration']) && $is_google_logged_in) {
    // Verify nonce for security
    if (!isset($_POST['registration_nonce']) || !wp_verify_nonce($_POST['registration_nonce'], 'user_registration')) {
        $registration_errors[] = '安全驗證失敗，請重試。';
    } else {
        $user_id = $current_user->ID;
        
        // Process family status (checkbox array)
        $family_status = array();
        if (isset($_POST['family_status']) && is_array($_POST['family_status'])) {
            $family_status = array_map('sanitize_text_field', $_POST['family_status']);
            // Add "其他" description if checked
            if (in_array('其他', $family_status) && !empty($_POST['family_status_other'])) {
                $family_status[] = '其他: ' . sanitize_text_field($_POST['family_status_other']);
            }
        }
        
        // Process how know source
        $how_know = '';
        if (!empty($_POST['how_know'])) {
            $how_know = sanitize_text_field($_POST['how_know']);
            // Add "其他" description if selected
            if ($how_know === '其他' && !empty($_POST['how_know_other'])) {
                $how_know = '其他: ' . sanitize_text_field($_POST['how_know_other']);
            }
        }
        
        // Process resources needed (checkbox array)
        $resources_needed = array();
        if (isset($_POST['resources_needed']) && is_array($_POST['resources_needed'])) {
            $resources_needed = array_map('sanitize_text_field', $_POST['resources_needed']);
            // Add "其他" description if checked
            if (in_array('其他', $resources_needed) && !empty($_POST['resources_needed_other'])) {
                $resources_needed[] = '其他: ' . sanitize_text_field($_POST['resources_needed_other']);
            }
        }
        
        // Save custom fields
        $custom_fields = array(
            'real_name' => sanitize_text_field($_POST['real_name']),
            'phone_number' => sanitize_text_field($_POST['phone_number']),
            'school' => sanitize_text_field($_POST['school']),
            'grade' => sanitize_text_field($_POST['grade']),
            'family_status' => $family_status, // Array
            'how_know' => $how_know,
            'resources_needed' => $resources_needed, // Array
        );
        
        // Validate required fields
        if (empty($custom_fields['real_name'])) {
            $registration_errors[] = '真實姓名為必填項目。';
        }
        if (empty($custom_fields['phone_number'])) {
            $registration_errors[] = '電話號碼為必填項目。';
        }
        if (empty($custom_fields['school'])) {
            $registration_errors[] = '學校為必填項目。';
        }
        if (empty($custom_fields['grade'])) {
            $registration_errors[] = '年級為必填項目。';
        }
        
        // Validate password
        $password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
        $password_confirm = isset($_POST['user_password_confirm']) ? $_POST['user_password_confirm'] : '';
        
        if (empty($password)) {
            $registration_errors[] = '密碼為必填項目。';
        } elseif (strlen($password) < 6) {
            $registration_errors[] = '密碼長度至少需要 6 個字元。';
        } elseif ($password !== $password_confirm) {
            $registration_errors[] = '兩次輸入的密碼不一致。';
        }
        
        // If no errors, save custom fields and update password
        if (empty($registration_errors)) {
            // Ensure user is subscriber (security measure)
            $user_obj = new WP_User($user_id);
            if (!in_array('subscriber', $user_obj->roles)) {
                $user_obj->set_role('subscriber');
            }
            
            // Update user password
            wp_set_password($password, $user_id);
            
            // Save custom fields
            foreach ($custom_fields as $key => $value) {
                if (!empty($value)) {
                    update_user_meta($user_id, $key, $value);
                }
            }
            
            $registration_success = true;
            
            // Redirect to homepage
            wp_redirect(home_url('/?registration=success'));
            exit;
        }
    }
}

get_header('events');
?>

<div class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="px-8" style="padding-top: 50px; padding-bottom: 50px;">
                <h2 class="text-3xl font-bold text-center text-gray-900" style="margin-bottom: 20px;">升學種子會員註冊</h2>
                <p class="text-center text-gray-600" style="margin-bottom: 40px;">加入我們，獲得更多學習資源</p>
                
                <?php if (!empty($registration_errors)): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">註冊時發生錯誤：</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    <?php foreach ($registration_errors as $error): ?>
                                        <li><?php echo esc_html($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if (!$is_google_logged_in): ?>
                    <!-- Step 1: Google Login Required -->
                    <div class="text-center" style="padding: 60px 20px;">
                        <div style="margin-bottom: 30px;">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900" style="margin-bottom: 15px;">請先使用 Google 帳號驗證</h3>
                        <p class="text-gray-600" style="margin-bottom: 40px;">為了確保帳號安全，我們需要您使用 Google 帳號進行驗證</p>
                        
                        <div style="margin-bottom: 40px; display: flex; justify-content: center; align-items: center;">
                            <?php
                            // 使用 Nextend Social Login 的 Google 登入按鈕
                            if (function_exists('NextendSocialLogin') || class_exists('NextendSocialLogin')) {
                                // 直接輸出 Nextend Social Login 的按鈕，並用 div 包裹以便置中
                                echo '<div style="display: inline-block;">';
                                echo do_shortcode('[nextend_social_login provider="google"]');
                                echo '</div>';
                            } else {
                                // 如果找不到函數，嘗試手動觸發
                                ?>
                                <div style="text-align: center;">
                                    <a href="<?php echo wp_login_url(home_url('/register/')); ?>?loginSocial=google" 
                                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                       style="text-decoration: none;">
                                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                        </svg>
                                        使用 Google 帳號註冊
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        
                        <div style="margin-top: 40px;">
                            <p class="text-sm text-gray-600">
                                已經有帳號了？
                                <a href="<?php echo home_url('/login/'); ?>" class="font-medium text-seed hover:text-orange-500 transition duration-200">
                                    立即登入
                                </a>
                            </p>
                        </div>
                    </div>
                    
                <?php else: ?>
                    <!-- Step 2: Fill Additional Information -->
                    <div style="margin-bottom: 30px;">
                        <div class="bg-green-50 border-l-4 border-green-500 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-700">
                                        Google 帳號驗證成功！歡迎 <strong><?php echo esc_html($current_user->display_name); ?></strong>（<?php echo esc_html($current_user->user_email); ?>）
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-center text-gray-600" style="margin-bottom: 40px;">請完成以下資料以完成註冊，並確認資料正確與真實性</p>
                
                <!-- Registration Form -->
                <form method="post" action="">
                    <?php wp_nonce_field('user_registration', 'registration_nonce'); ?>
                    
                    <!-- Personal Information -->
                    <div class="border-b border-gray-200" style="padding-bottom: 30px; margin-bottom: 30px;">
                        <h3 class="text-lg font-medium text-gray-900" style="margin-bottom: 25px;">個人資訊</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div style="margin-bottom: 20px;">
                                <label for="real_name" class="block text-sm font-medium text-gray-700" style="margin-bottom: 8px;">
                                    真實姓名 <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="real_name" id="real_name" required
                                       value="<?php echo isset($_POST['real_name']) ? esc_attr($_POST['real_name']) : ''; ?>"
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="user_password" class="block text-sm font-medium text-gray-700" style="margin-bottom: 8px;">
                                    設定密碼 <span class="text-red-500">*</span>
                                    <span class="text-xs text-gray-500">(用於日後登入)</span>
                                </label>
                                <input type="password" name="user_password" id="user_password" required
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="user_password_confirm" class="block text-sm font-medium text-gray-700" style="margin-bottom: 8px;">
                                    確認密碼 <span class="text-red-500">*</span>
                                </label>
                                <input type="password" name="user_password_confirm" id="user_password_confirm" required
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700" style="margin-bottom: 8px;">
                                    電話號碼 <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" name="phone_number" id="phone_number" required
                                       value="<?php echo isset($_POST['phone_number']) ? esc_attr($_POST['phone_number']) : ''; ?>"
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="school" class="block text-sm font-medium text-gray-700" style="margin-bottom: 8px;">
                                    學校 <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="school" id="school" required
                                       value="<?php echo isset($_POST['school']) ? esc_attr($_POST['school']) : ''; ?>"
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                            
                            <div style="margin-bottom: 20px;">
                                <label for="grade" class="block text-sm font-medium text-gray-700" style="margin-bottom: 8px;">
                                    年級 <span class="text-red-500">*</span>
                                </label>
                                <select name="grade" id="grade" required
                                        style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; background-color: white; box-sizing: border-box;">
                                    <option value="">請選擇年級</option>
                                    <option value="高一" <?php echo (isset($_POST['grade']) && $_POST['grade'] == '高一') ? 'selected' : ''; ?>>高一</option>
                                    <option value="高二" <?php echo (isset($_POST['grade']) && $_POST['grade'] == '高二') ? 'selected' : ''; ?>>高二</option>
                                    <option value="高三" <?php echo (isset($_POST['grade']) && $_POST['grade'] == '高三') ? 'selected' : ''; ?>>高三</option>
                                    <option value="重考生" <?php echo (isset($_POST['grade']) && $_POST['grade'] == '重考生') ? 'selected' : ''; ?>>重考生</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Survey Information -->
                    <div style="margin-bottom: 30px;">
                        <h3 class="text-lg font-medium text-gray-900" style="margin-bottom: 25px;">其他資訊</h3>
                        
                        <!-- Family Background -->
                        <div style="margin-bottom: 25px;">
                            <label class="block text-sm font-medium text-gray-700" style="margin-bottom: 12px;">
                                家庭狀況（可複選）
                            </label>
                            <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="family_status[]" value="中低收入戶" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">中低收入戶</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="family_status[]" value="單親家庭" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">單親家庭</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="family_status[]" value="隔代教養家庭" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">隔代教養家庭</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="family_status[]" value="原住民" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">原住民</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="family_status[]" value="新二代" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">新二代（父母一方為外籍人士）</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="family_status[]" value="其他" id="family_status_other_checkbox"
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">其他</span>
                                </label>
                            </div>
                            <div id="family_status_other_input" style="margin-top: 10px; display: none;">
                                <input type="text" name="family_status_other" id="family_status_other" placeholder="請說明"
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                        </div>
                        
                        <!-- How did you know about us -->
                        <div style="margin-bottom: 25px;">
                            <label class="block text-sm font-medium text-gray-700" style="margin-bottom: 12px;">
                                從哪裡得知本計畫
                            </label>
                            <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="how_know" value="FB" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">Facebook</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="how_know" value="IG" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">Instagram</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="how_know" value="學校" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">學校</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="how_know" value="網路搜尋" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">網路搜尋</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="radio" name="how_know" value="其他" id="how_know_other_radio"
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">其他</span>
                                </label>
                            </div>
                            <div id="how_know_other_input" style="margin-top: 10px; display: none;">
                                <input type="text" name="how_know_other" id="how_know_other" placeholder="請說明"
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                        </div>
                        
                        <!-- Resources Needed -->
                        <div style="margin-bottom: 25px;">
                            <label class="block text-sm font-medium text-gray-700" style="margin-bottom: 12px;">
                                目前最需要的資源（可複選）
                            </label>
                            <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="resources_needed[]" value="學科講義" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">學科講義</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="resources_needed[]" value="學科講解影片" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">學科講解影片</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="resources_needed[]" value="解題幫助" 
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">解題幫助</span>
                                </label>
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="resources_needed[]" value="其他" id="resources_needed_other_checkbox"
                                           style="margin-right: 6px; width: 16px; height: 16px;">
                                    <span style="font-size: 14px;">其他</span>
                                </label>
                            </div>
                            <div id="resources_needed_other_input" style="margin-top: 10px; display: none;">
                                <input type="text" name="resources_needed_other" id="resources_needed_other" placeholder="請說明"
                                       style="width: 80%; height: 34px; padding: 6px 10px; font-size: 14px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; box-sizing: border-box;">
                            </div>
                        </div>
                    </div>
                    
                    <script>
                    // Show/hide "其他" input for family status
                    document.getElementById('family_status_other_checkbox').addEventListener('change', function() {
                        document.getElementById('family_status_other_input').style.display = this.checked ? 'block' : 'none';
                    });
                    
                    // Show/hide "其他" input for how know
                    document.getElementById('how_know_other_radio').addEventListener('change', function() {
                        document.getElementById('how_know_other_input').style.display = this.checked ? 'block' : 'none';
                    });
                    
                    // Hide "其他" input when other radio buttons are selected
                    document.querySelectorAll('input[name="how_know"]').forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            if (this.value !== '其他') {
                                document.getElementById('how_know_other_input').style.display = 'none';
                            }
                        });
                    });
                    
                    // Show/hide "其他" input for resources needed
                    document.getElementById('resources_needed_other_checkbox').addEventListener('change', function() {
                        document.getElementById('resources_needed_other_input').style.display = this.checked ? 'block' : 'none';
                    });
                    </script>
                    
                    <!-- Submit Button -->
                    <div style="padding-top: 20px; margin-bottom: 20px;">
                        <button type="submit" name="submit_registration"
                                style="width: 100%; padding: 12px 16px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; transition: background-color 0.2s;"
                                onmouseover="this.style.backgroundColor='#1d4ed8'" 
                                onmouseout="this.style.backgroundColor='#2563eb'">
                            註冊帳號
                        </button>
                    </div>
                    
                    <!-- Important Notices -->
                    <div style="margin-bottom: 20px; padding: 15px; background-color: #fef3c7; border-left: 4px solid #f59e0b; border-radius: 6px;">
                        <div style="margin-bottom: 10px;">
                            <svg style="display: inline-block; width: 18px; height: 18px; margin-right: 6px; vertical-align: middle;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <span style="font-size: 14px; color: #92400e;">若您有特殊身份，請留意信箱我們將會與您聯繫</span>
                        </div>
                        <div>
                            <svg style="display: inline-block; width: 18px; height: 18px; margin-right: 6px; vertical-align: middle;" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                            </svg>
                            <span style="font-size: 14px; color: #92400e;">歡迎加入我們的解題群組：</span>
                            <a href="https://discord.gg/EN8HCuuv4C" target="_blank" rel="noopener noreferrer" 
                               style="font-size: 14px; color: #2563eb; text-decoration: underline; font-weight: 500;">
                                https://discord.gg/EN8HCuuv4C
                            </a>
                        </div>
                    </div>
                    
                    <div class="text-center text-sm">
                        <span class="text-gray-600">已經有帳號了？</span>
                        <a href="<?php echo home_url('/login/'); ?>" class="font-medium text-blue-600 hover:text-blue-500">
                            立即登入
                        </a>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
