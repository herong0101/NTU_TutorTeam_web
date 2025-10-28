<?php
/**
 * Template Name: Login Page
 * 登入頁面模板
 */

// Redirect if already logged in
if (is_user_logged_in()) {
    wp_redirect(home_url('/'));
    exit;
}

// Handle login form submission
$login_errors = array();

if (isset($_POST['submit_login'])) {
    // Verify nonce for security
    if (!isset($_POST['login_nonce']) || !wp_verify_nonce($_POST['login_nonce'], 'user_login')) {
        $login_errors[] = '安全驗證失敗，請重試。';
    } else {
        // Get form data
        $username = sanitize_user($_POST['username']);
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? true : false;
        
        // Validate required fields
        if (empty($username)) {
            $login_errors[] = '用戶名稱或電子郵件為必填項目。';
        }
        if (empty($password)) {
            $login_errors[] = '密碼為必填項目。';
        }
        
        // If no errors, attempt login
        if (empty($login_errors)) {
            $creds = array(
                'user_login'    => $username,
                'user_password' => $password,
                'remember'      => $remember
            );
            
            $user = wp_signon($creds, false);
            
            if (is_wp_error($user)) {
                $login_errors[] = '用戶名稱或密碼錯誤。';
            } else {
                // Successful login - redirect to home or intended page
                $redirect_to = isset($_GET['redirect_to']) ? $_GET['redirect_to'] : home_url('/');
                wp_redirect($redirect_to);
                exit;
            }
        }
    }
}

get_header('sign-in');
?>

<div class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="px-8" style="padding-top: 50px; padding-bottom: 50px;">
                <!-- Page Title -->
                <div class="text-center" style="margin-bottom: 50px;">
                    <h1 class="font-Noto-Serif-TC text-3xl font-bold text-gray-900" style="margin-bottom: 20px;">種子登入</h1>
                    <p class="font-Noto-Sans-TC text-gray-600">登入可以獲得更多資訊 ＆ 教材資源</p>
                </div>

                <!-- Display Errors -->
                <?php if (!empty($login_errors)) : ?>
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">登入時發生錯誤：</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    <?php foreach ($login_errors as $error) : ?>
                                        <li><?php echo esc_html($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="POST" action="">
                    <?php wp_nonce_field('user_login', 'login_nonce'); ?>
                    
                    <!-- Username/Email Field -->
                    <div style="margin-bottom: 30px;">
                        <label for="username" class="font-Noto-Sans-TC block text-sm font-medium text-gray-700" style="margin-bottom: 12px;">
                            用戶名稱或電子郵件 <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            required 
                            class="font-Noto-Sans-TC w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-seed focus:border-transparent transition duration-200"
                            value="<?php echo isset($_POST['username']) ? esc_attr($_POST['username']) : ''; ?>"
                        >
                    </div>

                    <!-- Password Field -->
                    <div style="margin-bottom: 30px;">
                        <label for="password" class="font-Noto-Sans-TC block text-sm font-medium text-gray-700" style="margin-bottom: 12px;">
                            密碼 <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="font-Noto-Sans-TC w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-seed focus:border-transparent transition duration-200"
                        >
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between" style="margin-bottom: 30px;">
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                id="remember" 
                                name="remember" 
                                class="h-4 w-4 text-seed focus:ring-seed border-gray-300 rounded"
                                style="margin-right: 8px;"
                            >
                            <label for="remember" class="font-Noto-Sans-TC block text-sm text-gray-700">
                                記住我
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="<?php echo wp_lostpassword_url(); ?>" class="font-Noto-Sans-TC font-medium text-seed hover:text-orange-500 transition duration-200">
                                忘記密碼？
                            </a>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            name="submit_login"
                            class="font-Noto-Sans-TC w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-seed hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-seed transition duration-200"
                        >
                            登入
                        </button>
                    </div>

                    <!-- Google Login (if Nextend Social Login plugin is active) -->
                    <?php if (class_exists('NextendSocialLogin')) : ?>
                        <div class="mt-6">
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="font-Noto-Sans-TC px-2 bg-white text-gray-500">或使用社群帳號登入</span>
                                </div>
                            </div>

                            <div class="mt-6">
                                <?php
                                // Output Google login button
                                if (function_exists('nsl_get_provider') && nsl_get_provider('google')) {
                                    echo '<div class="flex justify-center">';
                                    echo do_shortcode('[nextend_social_login provider="google"]');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Register Link -->
                    <div class="text-center mt-6 pt-6 border-t border-gray-200">
                        <p class="font-Noto-Sans-TC text-sm text-gray-600">
                            還沒有帳號？
                            <a href="<?php echo home_url('/register/'); ?>" class="font-medium text-seed hover:text-orange-500 transition duration-200">
                                立即註冊
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
