<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/**
 * Print Vite dev server script tag.
 *
 * @package ironman
 * @since 1.0.0
 */
// function seed_vite_dev_script() {
// 	if (
// 		! defined( 'VITE_ENV' ) ||
// 		! defined( 'VITE_DEV_SERVER' ) ||
// 		constant( 'VITE_ENV' ) !== 'development'
// 	) {
// 		return;
// 	}
// 	$entry_file = constant( 'VITE_DEV_SERVER' ) . '/vite.entry.js';
// 	// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript
// 	echo '<script type="module" crossorigin src="' . esc_attr( $entry_file ) . '"></script>';
// }

// add_action( 'wp_head', 'seed_vite_dev_script' );


// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => esc_html__( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		// add_theme_support( 'editor-styles' );
		// $background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		// if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
		// 	add_theme_support( 'dark-editor-style' );
		// }

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		// if ( is_customize_preview() ) {
		// 	require get_template_directory() . '/inc/starter-content.php';
		// 	add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		// }

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for link color control.
		add_theme_support( 'link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Registers widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global bool       $is_IE
 * @global WP_Scripts $wp_scripts
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			array(
				'in_footer' => false, // Because involves header.
				'strategy'  => 'defer',
			)
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueues block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), array( 'in_footer' => true ) );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fixes skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 * @deprecated Twenty Twenty-One 1.9 Removed from wp_print_footer_scripts action.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} else {
		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
		</script>
		<?php
	}
}

/**
 * Enqueues non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
// function twenty_twenty_one_non_latin_languages() {
// 	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

// 	if ( $custom_css ) {
// 		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
//require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
//require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
//new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
//require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
// require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
//require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
//require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
//new Twenty_Twenty_One_Customize();

// Block Patterns.
// require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
// require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
//require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
//new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueues scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueues scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculates classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	//$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	//if ( ! $classes ) {
	//	return;
	//}
	//echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Adds "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );

if ( ! function_exists( 'wp_get_list_item_separator' ) ) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator() {
		/* translators: Used between list items, there is a space after the comma. */
		return __( ', ', 'twentytwentyone' );
	}

endif;

// Add custom user role for Authorized Student
function add_authorized_student_role() {
    if ( ! get_role( 'authorized_student' ) ) {
        add_role(
            'authorized_student',
            __( 'Authorized Student' ),
            array(
                'read' => true, // Grants read access
            )
        );
    }
}
add_action( 'init', 'add_authorized_student_role' );

// Redirect to register page after Google login if user hasn't completed registration
function redirect_after_google_login($user_login, $user) {
    // Skip redirect for administrators
    if (in_array('administrator', $user->roles)) {
        return;
    }
    
    // Skip redirect if user is trying to access wp-admin (backend login)
    if (is_admin() || (isset($_REQUEST['redirect_to']) && strpos($_REQUEST['redirect_to'], 'wp-admin') !== false)) {
        return;
    }
    
    // Check if user has completed registration (has real_name field)
    $real_name = get_user_meta($user->ID, 'real_name', true);
    
    // If no real_name, redirect to register page to complete registration
    if (empty($real_name)) {
        wp_redirect(home_url('/register/'));
        exit;
    }
}
add_action('wp_login', 'redirect_after_google_login', 10, 2);

// Override Nextend Social Login redirect for registration flow
function override_nsl_redirect($redirect_url, $user_id) {
    // Get user object
    $user = get_userdata($user_id);
    
    // Skip redirect for administrators
    if (in_array('administrator', $user->roles)) {
        return $redirect_url;
    }
    
    // Check if user has completed registration
    $real_name = get_user_meta($user_id, 'real_name', true);
    
    // If no real_name, redirect to register page
    if (empty($real_name)) {
        return home_url('/register/');
    }
    
    return $redirect_url;
}
add_filter('nsl_login_redirect_url', 'override_nsl_redirect', 10, 2);

// Block non-administrators from accessing WordPress backend
function restrict_admin_access() {
    // Only apply to admin area
    if (is_admin() && !wp_doing_ajax()) {
        // Get current user
        $user = wp_get_current_user();
        
        // Check if user is NOT an administrator
        if (!in_array('administrator', $user->roles)) {
            // Redirect to home page
            wp_redirect(home_url());
            exit;
        }
    }
}
add_action('admin_init', 'restrict_admin_access');

// Hide admin bar for non-administrators
function hide_admin_bar_for_non_admins() {
    if (!current_user_can('administrator')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'hide_admin_bar_for_non_admins');

// Restrict access to posts with term=114 for non-logged-in users
function restrict_term_114_content() {
    // Only apply to single posts
    if (is_single()) {
        global $post;
        
        // Get the term custom field value
        $term_value = get_post_meta($post->ID, 'term', true);
        
        // If term is 114 and user is not logged in, redirect to login page
        if ($term_value == '114' && !is_user_logged_in()) {
            wp_redirect(home_url('/login/?redirect_to=' . urlencode(get_permalink())));
            exit;
        }
    }
}
add_action('template_redirect', 'restrict_term_114_content');

// Hide posts with term=114 from archives/lists for non-logged-in users
function hide_term_114_from_queries($query) {
    // Only apply to main query and not in admin
    if (!is_admin() && $query->is_main_query() && !is_user_logged_in()) {
        // Get current meta query
        $meta_query = $query->get('meta_query') ?: array();
        
        // Add condition to exclude term=114
        $meta_query[] = array(
            'relation' => 'OR',
            array(
                'key' => 'term',
                'value' => '114',
                'compare' => '!='
            ),
            array(
                'key' => 'term',
                'compare' => 'NOT EXISTS'
            )
        );
        
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'hide_term_114_from_queries');

// Hide social login buttons on wp-login.php (backend login)
function hide_social_login_on_backend() {
    global $pagenow;
    
    // Check if we're on wp-login.php
    if ($pagenow === 'wp-login.php') {
        // Remove Nextend Social Login from wp-login.php
        remove_action('login_form', 'nsl_render_login_form');
        remove_action('login_enqueue_scripts', 'NextendSocialLogin::login_enqueue_scripts');
        
        // Add CSS to hide any remaining social login elements
        add_action('login_enqueue_scripts', function() {
            echo '<style>
                .nsl-container,
                .nsl-container-block,
                [class*="nextend-social"],
                [id*="nextend-social"] {
                    display: none !important;
                }
            </style>';
        });
    }
}
add_action('init', 'hide_social_login_on_backend');

// Ensure new users are always created as subscribers (never administrators)
function force_new_users_as_subscribers($user_id) {
    $user = new WP_User($user_id);
    
    // If user is administrator, downgrade to subscriber (unless manually created in backend)
    if (in_array('administrator', $user->roles)) {
        // Check if this is being called from wp-admin
        if (!is_admin() || (defined('DOING_AJAX') && DOING_AJAX)) {
            // Remove administrator role
            $user->remove_role('administrator');
            // Set as subscriber
            $user->set_role('subscriber');
        }
    }
    
    // If user has no role, set as subscriber
    if (empty($user->roles)) {
        $user->set_role('subscriber');
    }
}
add_action('user_register', 'force_new_users_as_subscribers', 10, 1);

// Prevent role escalation through profile updates
function prevent_role_escalation($errors, $update, $user) {
    // If this is an update (not creation) and not in admin area
    if ($update && !is_admin()) {
        // Get current user
        $current_user = wp_get_current_user();
        
        // If trying to change role and current user is not an administrator
        if (isset($user->role) && !current_user_can('administrator')) {
            // Force role to subscriber
            $user->role = 'subscriber';
        }
    }
}
add_action('user_profile_update_errors', 'prevent_role_escalation', 10, 3);

// Ensure Google OAuth users are created as subscribers
function set_social_login_user_role($user_id) {
    $user = new WP_User($user_id);
    
    // Set role to subscriber if not already set
    if (empty($user->roles)) {
        $user->set_role('subscriber');
    }
    
    // If somehow they got administrator role, remove it
    if (in_array('administrator', $user->roles)) {
        $user->remove_role('administrator');
        $user->set_role('subscriber');
    }
}
add_action('nsl_register_new_user', 'set_social_login_user_role', 10, 1);

// Restrict who can create administrators (only existing administrators in backend)
function restrict_admin_creation($errors, $update, $user) {
    // Only apply when creating/editing users
    if (isset($user->role) || (is_object($user) && property_exists($user, 'role'))) {
        $new_role = is_object($user) && property_exists($user, 'role') ? $user->role : (isset($_POST['role']) ? $_POST['role'] : '');
        
        // If trying to set role as administrator
        if ($new_role === 'administrator') {
            // Check if current user is administrator and in admin area
            if (!current_user_can('administrator') || !is_admin()) {
                $errors->add('role_error', '您沒有權限創建管理員帳號。');
                // Force role to subscriber
                if (is_object($user)) {
                    $user->role = 'subscriber';
                }
                $_POST['role'] = 'subscriber';
            }
        }
    }
}
add_action('user_profile_update_errors', 'restrict_admin_creation', 10, 3);

// Disable public registration through WordPress default
add_filter('pre_option_users_can_register', '__return_zero');

// cache busting to ensure new style.css sent everytime is recognized by the browser
function seed_enqueue_styles() {
    // Get the file modification time of style.css
    $version = filemtime( get_stylesheet_directory() . '/style.css' );

    // Enqueue the main stylesheet with the file modification time as the version number
    wp_enqueue_style( 
        'seed-style', 
        get_stylesheet_uri(), 
        array(), 
        $version 
    );
}
add_action( 'wp_enqueue_scripts', 'seed_enqueue_styles' );

// enqueue custom js script
function seed_enqueue_front_page_scripts() {
    // Only load this script on the front page.
    if ( is_front_page() ) {
        wp_enqueue_script(
            'seed-counter',
            get_template_directory_uri() . '/js/counter.js',
            array(), // No dependencies
            filemtime( get_stylesheet_directory() . '/js/counter.js' ), // Version for cache busting
            true // Load in footer
        );
    }
}
add_action( 'wp_enqueue_scripts', 'seed_enqueue_front_page_scripts' );


// the two space at post's first line
function post_text_indent($text){
	$return = str_replace('<p', '<p style="text-indent:2em;"', $text);
	return $return;
}

add_filter('the_content', 'post_text_indent');

// exclude resource page indent
function my_conditional_filter_removal() {
    if ( is_page( 'resources' )) {
        remove_filter( 'the_content', 'post_text_indent');
    }
}

add_action( 'wp', 'my_conditional_filter_removal' );

// use wordpress-native post type to store teaching resources(install "advenced custom field plugin")
// Register Custom Post Type for Resources
function create_resource_post_type() {
    $labels = array(
        'name'                  => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Resources', 'text_domain' ),
        'name_admin_bar'        => __( 'Resource', 'text_domain' ),
        'archives'              => __( 'Resource Archives', 'text_domain' ),
        'attributes'            => __( 'Resource Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Resource:', 'text_domain' ),
        'all_items'             => __( 'All Resources', 'text_domain' ),
        'add_new_item'          => __( 'Add New Resource', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Resource', 'text_domain' ),
        'edit_item'             => __( 'Edit Resource', 'text_domain' ),
        'update_item'           => __( 'Update Resource', 'text_domain' ),
        'view_item'             => __( 'View Resource', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Resource', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Resources list', 'text_domain' ),
        'items_list_navigation' => __( 'Resources list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter resources list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Resource', 'text_domain' ),
        'description'           => __( 'Post Type for Educational Resources', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'resource', $args );
}
add_action( 'init', 'create_resource_post_type', 0 );

/**
 * Register Featured Article Custom Post Type
 */
function create_featured_article_post_type() {
    $labels = array(
        'name'                  => _x( 'Featured Articles', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Featured Article', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Featured Articles', 'text_domain' ),
        'name_admin_bar'        => __( 'Featured Article', 'text_domain' ),
        'archives'              => __( 'Featured Article Archives', 'text_domain' ),
        'attributes'            => __( 'Featured Article Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Featured Article:', 'text_domain' ),
        'all_items'             => __( 'All Featured Articles', 'text_domain' ),
        'add_new_item'          => __( 'Add New Featured Article', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Featured Article', 'text_domain' ),
        'edit_item'             => __( 'Edit Featured Article', 'text_domain' ),
        'update_item'           => __( 'Update Featured Article', 'text_domain' ),
        'view_item'             => __( 'View Featured Article', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Featured Article', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Featured Articles list', 'text_domain' ),
        'items_list_navigation' => __( 'Featured Articles list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter featured articles list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Featured Article', 'text_domain' ),
        'description'           => __( 'Post Type for Featured Articles', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'               => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-star-filled',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'featured-articles',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'featured_article', $args );
}
add_action( 'init', 'create_featured_article_post_type', 0 );

/**
 * Register Sign Up Event Custom Post Type
 */
function create_signup_event_post_type() {
    $labels = array(
        'name'                  => _x( 'Sign Up Events', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Sign Up Event', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Sign Up Events', 'text_domain' ),
        'name_admin_bar'        => __( 'Sign Up Event', 'text_domain' ),
        'archives'              => __( 'Sign Up Event Archives', 'text_domain' ),
        'attributes'            => __( 'Sign Up Event Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Sign Up Event:', 'text_domain' ),
        'all_items'             => __( 'All Sign Up Events', 'text_domain' ),
        'add_new_item'          => __( 'Add New Sign Up Event', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Sign Up Event', 'text_domain' ),
        'edit_item'             => __( 'Edit Sign Up Event', 'text_domain' ),
        'update_item'           => __( 'Update Sign Up Event', 'text_domain' ),
        'view_item'             => __( 'View Sign Up Event', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Sign Up Event', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Sign Up Events list', 'text_domain' ),
        'items_list_navigation' => __( 'Sign Up Events list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter sign up events list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Sign Up Event', 'text_domain' ),
        'description'           => __( 'Post Type for Sign Up Events', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'custom-fields' ),
        'hierarchical'          => false,
        'public'               => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-megaphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'signup_event', $args );
}
add_action( 'init', 'create_signup_event_post_type', 0 );

/**
 * Register custom user meta fields for extended user information
 */
function register_custom_user_meta_fields() {
    // Real name (真實姓名)
    register_meta('user', 'real_name', array(
        'type' => 'string',
        'description' => '真實姓名',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // Phone number (電話號碼)
    register_meta('user', 'phone_number', array(
        'type' => 'string',
        'description' => '電話號碼',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // School (學校)
    register_meta('user', 'school', array(
        'type' => 'string',
        'description' => '學校',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // Grade (年級)
    register_meta('user', 'grade', array(
        'type' => 'string',
        'description' => '年級',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // Parent name (家長姓名)
    register_meta('user', 'parent_name', array(
        'type' => 'string',
        'description' => '家長姓名',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // Parent phone (家長電話)
    register_meta('user', 'parent_phone', array(
        'type' => 'string',
        'description' => '家長電話',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // Address (地址)
    register_meta('user', 'address', array(
        'type' => 'string',
        'description' => '地址',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // Emergency contact (緊急聯絡人)
    register_meta('user', 'emergency_contact', array(
        'type' => 'string',
        'description' => '緊急聯絡人',
        'single' => true,
        'show_in_rest' => true,
    ));
    
    // Emergency contact phone (緊急聯絡人電話)
    register_meta('user', 'emergency_phone', array(
        'type' => 'string',
        'description' => '緊急聯絡人電話',
        'single' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_custom_user_meta_fields');

/**
 * Show custom fields in user profile page
 */
function show_custom_user_profile_fields($user) {
    ?>
    <h3>額外資訊</h3>
    <table class="form-table">
        <tr>
            <th><label for="real_name">真實姓名</label></th>
            <td>
                <input type="text" name="real_name" id="real_name" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'real_name', true)); ?>" 
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="phone_number">電話號碼</label></th>
            <td>
                <input type="tel" name="phone_number" id="phone_number" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'phone_number', true)); ?>" 
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="school">學校</label></th>
            <td>
                <input type="text" name="school" id="school" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'school', true)); ?>" 
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="grade">年級</label></th>
            <td>
                <select name="grade" id="grade">
                    <option value="">請選擇</option>
                    <?php
                    $current_grade = get_user_meta($user->ID, 'grade', true);
                    $grades = array('國一', '國二', '國三', '高一', '高二', '高三', '大學', '其他');
                    foreach ($grades as $grade) {
                        $selected = ($current_grade == $grade) ? 'selected' : '';
                        echo "<option value='{$grade}' {$selected}>{$grade}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="parent_name">家長姓名</label></th>
            <td>
                <input type="text" name="parent_name" id="parent_name" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'parent_name', true)); ?>" 
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="parent_phone">家長電話</label></th>
            <td>
                <input type="tel" name="parent_phone" id="parent_phone" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'parent_phone', true)); ?>" 
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="address">地址</label></th>
            <td>
                <textarea name="address" id="address" rows="3" class="regular-text"><?php 
                    echo esc_textarea(get_user_meta($user->ID, 'address', true)); 
                ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="emergency_contact">緊急聯絡人</label></th>
            <td>
                <input type="text" name="emergency_contact" id="emergency_contact" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'emergency_contact', true)); ?>" 
                       class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="emergency_phone">緊急聯絡人電話</label></th>
            <td>
                <input type="tel" name="emergency_phone" id="emergency_phone" 
                       value="<?php echo esc_attr(get_user_meta($user->ID, 'emergency_phone', true)); ?>" 
                       class="regular-text" />
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'show_custom_user_profile_fields');
add_action('edit_user_profile', 'show_custom_user_profile_fields');

/**
 * Save custom user profile fields
 */
function save_custom_user_profile_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    
    $fields = array(
        'real_name', 'phone_number', 'school', 'grade',
        'parent_name', 'parent_phone', 'address',
        'emergency_contact', 'emergency_phone'
    );
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_user_meta($user_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('personal_options_update', 'save_custom_user_profile_fields');
add_action('edit_user_profile_update', 'save_custom_user_profile_fields');
/**
 * 取得最新的 Instagram 貼文（暫時返回 null）
 * TODO: 實作真正的 Instagram API 整合
 */
function get_latest_instagram_post($position = 'left') {
    // 暫時返回 null，讓前端使用預設圖片和文字
    return null;
}

/**
 * ========================================
 * NTU TutorTeam Custom Functionality
 * ========================================
 */

// Include custom post types (Events, Partners)
require get_template_directory() . '/inc/custom-post-types.php';

// Include meta boxes for CPTs
require get_template_directory() . '/inc/meta-boxes.php';

// Include homepage settings
require get_template_directory() . '/inc/options-homepage.php';

// Include Instagram API integration
require get_template_directory() . '/inc/instagram.php';

/**
 * Register custom image sizes for the theme
 */
function ntu_register_image_sizes() {
    // Event card thumbnail (16:9 ratio)
    add_image_size('event-card', 800, 450, true);
    
    // Event featured image (wider)
    add_image_size('event-featured', 1200, 675, true);
    
    // Partner logo (square, smaller)
    add_image_size('partner-logo', 300, 300, false);
    
    // Instagram thumbnail (square)
    add_image_size('instagram-thumb', 400, 400, true);
}
add_action('after_setup_theme', 'ntu_register_image_sizes');

/**
 * Flush rewrite rules on theme activation
 */
function ntu_rewrite_flush() {
    ntu_register_event_cpt();
    ntu_register_partner_cpt();
    ntu_register_event_category_taxonomy();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'ntu_rewrite_flush');

// featured_article 每頁顯示 3 篇
function set_featured_articles_per_page( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive('featured_article') ) {
        $query->set( 'posts_per_page', 3 ); // 每頁顯示 3 篇文章
    }
}
add_action( 'pre_get_posts', 'set_featured_articles_per_page' );
