<?php

if ( ! isset( $content_width ) ) $content_width = 1250;

if(!function_exists('book_rev_lite_theme_setup')) {

	function book_rev_lite_theme_setup() { 

		// Make theme available for translation
		load_theme_textdomain('book-rev-lite', get_template_directory() . '/languages');

		// Add theme support for featured images.
		add_theme_support( 'post-thumbnails' ); 

		// Add theme support for automatic feed links in the header.
		add_theme_support( 'automatic-feed-links' );
		register_nav_menus( array(
		    'primary' => __( 'Primary Header Menu', 'book-rev-lite' ),
		));

		// Setup theme customizer settings & controls.
		require_once(get_template_directory() . "/inc/cc_settings.php");
		
	}	
}

// Initialize the comments template function callback.
require_once(get_template_directory() . "/templates/bookrev_comments_cb_template.php");

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'book_rev_lite_required_plugins' );
function book_rev_lite_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'WP Product Review',
			'slug' 		=> 'wp-product-review',
			'required' 	=> false,
		),
		array(
		
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'book-rev-lite',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'book-rev-lite' ),
			'menu_title'                       			=> __( 'Install Plugins', 'book-rev-lite' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'book-rev-lite' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'book-rev-lite' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'book-rev-lite' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','book-rev-lite' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','book-rev-lite' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','book-rev-lite' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','book-rev-lite' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','book-rev-lite' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','book-rev-lite' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','book-rev-lite' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins','book-rev-lite' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins','book-rev-lite' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'book-rev-lite' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'book-rev-lite' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'book-rev-lite' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

/**
 * book_rev_lite_load_req_scripts loads the required scrips and enqueues the required theme styles.
 */
if(!function_exists('book_rev_lite_load_req_scripts')) {
	function book_rev_lite_load_req_scripts() {
		
		// Register and enqueue jQuery Superfish Plugin.
		wp_enqueue_script( 'book-rev-lite-superfish-js', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ) );

		// Register and enqueue jQuery Cycle Plugin.
		wp_enqueue_script( 'book-rev-lite-jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.min.js', array( 'jquery' ) );

		// Register and enqueue jQuery Cycle Plugin.
		wp_enqueue_script( 'book-rev-lite-modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ) );

		// Load the main JavaScript file.
		wp_enqueue_script( 'book-rev-lite-main-js', get_template_directory_uri() . '/js/master.js', array( 'jquery', "book-rev-lite-jquery-cycle" ));

		// Load the css framework.
		wp_enqueue_style( 'book-rev-lite-css-framework', get_template_directory_uri() . '/css/framework.css'); 

		// Register and enqueue the main stylesheet.
		wp_enqueue_style( 'book-rev-lite-main-css', get_stylesheet_uri()); 

		wp_enqueue_style( 'book-rev-lite-arvo-font', '//fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic'); 

		wp_enqueue_style( 'book-rev-lite-titilium-font', '//fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic');  

		// Load the responsive css styles.
		wp_enqueue_style( 'book-rev-lite-css-responsive', get_template_directory_uri() . '/css/responsive.css'); 

		// Load FontAwesome Icon Pack.
		wp_enqueue_style( 'book-rev-lite-icons-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	}
}

// Sanitize hexadecimal input
if(!function_exists('book_rev_lite_sanitize_hex')) {
	function book_rev_lite_sanitize_hex($hex) {
		if($hex === "") return '';
		if(preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $hex)) return $hex;
		return null;
	}	
}

// Register theme specific sidebars.
if(!function_exists('book_rev_lite_register_sidebars')) {
	function book_rev_lite_register_sidebars() {
		register_sidebar( array(
			'name'          => 'Primary Sidebar',
			'id'            => 'book_rev_lite_primary_sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div><!-- end .widget -->',
			'before_title'  => '<header><h2>',
			'after_title'   => '</h2></header>',
		));

		register_sidebar( array(
			'name'          => 'Footer Sidebar',
			'id'            => 'book_rev_lite_footer_sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div><!-- end .widget -->',
			'before_title'  => '<header><h2>',
			'after_title'   => '</h2></header>',
		));
	}
}
// Custom recursive array search function
if(!function_exists('book_rev_lite_recursive_array_search')) {
	function book_rev_lite_recursive_array_search($needle,$haystack) {
	    foreach($haystack as $key=>$value) {
	        $current_key=$key;
	        if($needle===$value OR (is_array($value) && book_rev_lite_recursive_array_search($needle,$value) !== false)) {
	            return $current_key;
	        }
	    }
	    return false;
	}
}

// Replaces the title template with specific category or field
if(!function_exists("book_rev_lite_string_template_category_replace")) {
	function book_rev_lite_string_template_category_replace($title, $categ, $tpl) {
		$fcb_title = get_theme_mod($title);
		preg_match_all("/{{([^}]*)}}/", $fcb_title, $fcb_title_output);
			if(book_rev_lite_recursive_array_search("{{".$tpl."}}", $fcb_title_output) !== false) {
				$selected_category_id = get_theme_mod($categ);
				$fcb_title = str_replace("{{".$tpl."}}", get_cat_name($selected_category_id), $fcb_title);
				echo $fcb_title; 
			} else {
				echo $fcb_title;
			}
	}
}
// Display limited content
if(!function_exists('book_rev_lite_get_limited_content')) {
	function book_rev_lite_get_limited_content($id, $character_count, $after) {
		$content = get_the_excerpt();
		echo mb_strimwidth($content, 0, $character_count, $after);
	}	
}

function book_rev_lite_excerpt_length($length) {
    return 200;
}
add_filter('excerpt_length', 'book_rev_lite_excerpt_length');

// Display Review Grade
if(!function_exists('book_rev_lite_get_review_grade')) {
	function book_rev_lite_get_review_grade($id) {
		if(function_exists('cwppos_show_review')) {	
			$postMeta = array();
			for($i=1; $i <= 5; $i++) { 
				$pmi = get_post_meta($id, 'option_'.$i.'_grade');
				if(!empty($pmi[0])) array_push($postMeta, $pmi[0]);
			}
			if(!empty($postMeta)) {
				$total = 0;
				foreach ($postMeta as $key => $value) $total += $value;
				return round($total / count($postMeta), 0) / 10;
			}
		}
	}	
}


if(!function_exists('book_rev_lite_display_review_grade')) {
	function book_rev_lite_display_review_grade($grade) {
		echo $grade . "/10";
	}	
}

if(!function_exists('book_rev_lite_get_product_review_colors')) {
	function book_rev_lite_get_product_review_colors() {
		if(function_exists('cwppos_show_review')) {
			$c['default'] = cwppos('cwppos_rating_default');
			$c['weak']    = cwppos('cwppos_rating_weak');
			$c['nb']      = cwppos('cwppos_rating_notbad');
			$c['good']    = cwppos('cwppos_rating_good');
			$c['vg']      = cwppos('cwppos_rating_very_good');
			return $c;
		}
	}	
}

/**
 * In case WP Product Review plugin is installed and active this function
 * is responsable for generating the required classes based on what grade
 * is passed. 
 * 
 * @return null [] 
 */
if(!function_exists('book_rev_lite_display_review_class')) {
	function book_rev_lite_display_review_class($grade) {
		if(function_exists('cwppos_show_review')) {
			if($grade <= 2.5) echo 'weak';
			if($grade > 2.5 && $grade <= 5) echo 'nb';
			if($grade > 5 && $grade <= 7.5)  echo 'good';
			if($grade > 7.5 && $grade <= 10) echo "vg";
		}
	}	
}

/**
 * Function responsable for filtering the title in case its empty.
 * @return string [description]
 */
if(!function_exists('book_rev_lite_filter_default_title')) {
	function book_rev_lite_filter_default_title($title) {
		if($title == "") { $title = __("Default Title", "cwp"); }
		return $title;
	}	
}


/**
 * Custom numeric pagination.
 */
if(!function_exists('book_rev_lite_numeric_pagination')) {
	function book_rev_lite_numeric_pagination() {
		$links = paginate_links( array( 'type' => 'array','prev_text' => '«', 'next_text' => '»' ) );
	}	
}

if(!function_exists("book_rev_lite_excerpt_filter")) {
	function book_rev_lite_excerpt_filter() {
		return '...';
	}
}

/**
 * If WP Product Review plugin is installed and active define the required template
 * specific functions in order for the review wrap up template part of the theme to 
 * function properly.  
 */

	if(!function_exists("book_rev_lite_wpr_get_title")) {
	    function book_rev_lite_wpr_get_title() {
	        if(function_exists('cwppos_show_review')) {
	            return get_post_meta(get_the_ID(), "cwp_rev_product_name", true);
	        }
	    }
	}

	if(!function_exists("book_rev_lite_wpr_get_status")) {
	    function book_rev_lite_wpr_get_status() {
	        if(function_exists('cwppos_show_review')) {
	            return get_post_meta(get_the_ID(), "cwp_meta_box_check", true);
	        }
	    }
	}

	if(!function_exists("book_rev_lite_wpr_get_product_image")) {
	    function book_rev_lite_wpr_get_product_image() {
	    	if(get_post_meta(get_the_ID(), "cwp_rev_product_image", true)) {
	    		return get_post_meta(get_the_ID(), "cwp_rev_product_image", true);
	    	} else {
	    		return get_theme_mod("default-product-image-upload");
	    	}
	    }		
	}

	if(!function_exists("book_rev_lite_wpr_get_review_options")) {
	    function book_rev_lite_wpr_get_review_options() {
	        if(function_exists('cwppos_show_review')) {
    	        for($i=1; $i<6; $i++) $review_options[$i]['grade'] = get_post_meta(get_the_ID(), "option_".$i."_grade", true) ? get_post_meta(get_the_ID(), "option_".$i."_grade", true) : ""; 
    	        for($i=1; $i<6; $i++) $review_options[$i]['name'] =  get_post_meta(get_the_ID(), "option_".$i."_content", true) ? get_post_meta(get_the_ID(), "option_".$i."_content", true) : "";
    	        return $review_options;
	        }
	    }		
	}
    
    if(!function_exists("book_rev_lite_wpr_get_pros")) {
	    function book_rev_lite_wpr_get_pros() {
	        if(function_exists('cwppos_show_review')) {
    	        for($i=1;$i<=5;$i++){
    	            if(get_post_meta(get_the_ID(), "cwp_option_".$i."_pro", true)) $pros[$i] = get_post_meta(get_the_ID(), "cwp_option_".$i."_pro", true);
    	        }
    	        if(isset($pros)) return $pros;
	        }
	    }  	
    }

    if(!function_exists("book_rev_lite_wpr_get_cons")) {
	    function book_rev_lite_wpr_get_cons() {
	        if(function_exists('cwppos_show_review')) {
    	        for($i=1;$i<=5;$i++){
    	            if(get_post_meta(get_the_ID(), "cwp_option_".$i."_cons", true)) $cons[$i] = get_post_meta(get_the_ID(), "cwp_option_".$i."_cons", true);
    	        }
    	        if(isset($cons)) return $cons;
	        }
	    }
    }

    if(!function_exists("book_rev_lite_wpr_get_affiliate_text")) {
	    function book_rev_lite_wpr_get_affiliate_text() {
	        if(function_exists('cwppos_show_review')) {
	            return get_post_meta(get_the_ID(), "cwp_product_affiliate_text", true); 
	        }
	    }	
    }

    if(!function_exists("book_rev_lite_wpr_get_affiliate_link")) {
	    function book_rev_lite_wpr_get_affiliate_link() {
	        if(function_exists('cwppos_show_review')) {
	            return get_post_meta(get_the_ID(), "cwp_product_affiliate_link", true); 
	        }
	    }	
    }
	



/**
 * Hooks & Filters
 */

// Default Widget Title Filter.
add_filter('widget_title', 'book_rev_lite_filter_default_title');

// Default Post Title Filter.
add_filter('the_title', 'book_rev_lite_filter_default_title');

// Excerpt "[...]" filter.
add_filter('excerpt_more', 'book_rev_lite_excerpt_filter');

// After theme setup hook.
add_action( 'after_setup_theme', 'book_rev_lite_theme_setup' ); 

// Enqueue required scripts hook.
add_action( 'wp_enqueue_scripts', 'book_rev_lite_load_req_scripts' );

// Hook Customizer. 
add_action( 'customize_register', 'book_rev_lite_theme_customizer' );

// Register theme specific sidebars.
add_action( 'widgets_init', 'book_rev_lite_register_sidebars' );