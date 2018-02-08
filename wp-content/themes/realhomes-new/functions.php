<?php
/**
 * The current version of the theme.
 *
 * @package RH
 */

// Theme version.
define( 'INSPIRY_THEME_VERSION', '3.4.0' );

// Framework Path.
define( 'INSPIRY_FRAMEWORK', get_template_directory() . '/framework/' );

// Widgets Path.
define( 'INSPIRY_WIDGETS', get_template_directory() . '/widgets/' );

// Google Maps Fallback API Key.
define( 'RH_GOOGLE_MAPS_FALLBACK_API_KEY', 'AIzaSyCbvBoCXp5dx08YZnPH95EVQeNG-pXAvSk' );

/**
 * Defined html tags to be used in
 * wp_kses function across the theme.
 */
$inspiry_allowed_tags = array(
	'a' => array(
		'href' => array(),
		'title' => array(),
		'alt' => array(),
	),
	'b' => array(),
	'br' => array(),
	'div' => array(
		'class' => array(),
		'id' => array(),
	),
	'em' => array(),
	'strong' => array(),
);

if ( ! function_exists( 'inspiry_current_design_variation' ) ) {
	/**
	 * Returns the current design variation the
	 * user has selected.
	 *
	 * @since 2.7.0
	 */
	function inspiry_current_design_variation() {
		return get_option( 'inspiry_design_variation', 'classic' );
	}
}

// Theme selected design variation.
define( 'INSPIRY_DESIGN_VARIATION', inspiry_current_design_variation() );

// Theme directory.
define( 'INSPIRY_THEME_DIR', get_template_directory() . '/assets/' . INSPIRY_DESIGN_VARIATION );

// Theme directory URI.
define( 'INSPIRY_DIR_URI', get_template_directory_uri() . '/assets/' . INSPIRY_DESIGN_VARIATION );

// Theme common directory.
define( 'INSPIRY_COMMON_DIR', get_template_directory() . '/common/' );

// Theme common directory URI.
define( 'INSPIRY_COMMON_URI', get_template_directory_uri() . '/common/' );

if ( ! function_exists( 'inspiry_theme_setup' ) ) {
	/**
	 * 1. Load text domain
	 * 2. Add custom background support
	 * 3. Add automatic feed links support
	 * 4. Add specific post formats support
	 * 5. Add custom menu support and register a custom menu
	 * 6. Register required image sizes
	 * 7. Add title tag support
	 */
	function inspiry_theme_setup() {

		/**
		 * Load text domain for translation purposes
		 */
		$languages_dir = get_template_directory() . '/languages';
		if ( file_exists( $languages_dir ) ) {
			load_theme_textdomain( 'framework', $languages_dir );
		} else {
			load_theme_textdomain( 'framework' );   // For backward compatibility.
		}

		/**
		 * Add Theme Support - Custom background
		 */
		add_theme_support( 'custom-background' );

		/**
		 * Add Automatic Feed Links Support
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add Post Formats Support
		 */
		add_theme_support( 'post-formats', array( 'image', 'video', 'gallery' ) );

		/**
		 * Add Menu Support and register a custom menu
		 */
		add_theme_support( 'menus' );
		register_nav_menus(
			array(
				'main-menu' 		=> __( 'Main Menu', 'framework' ),
				'responsive-menu'	=> __( 'Responsive Menu', 'framework' ),
			)
		);

		/**
		 * Add Post Thumbnails Support and Related Image Sizes
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150 );                            // Default Post Thumbnail dimensions.
		add_image_size( 'property-thumb-image', 244, 163, true );        // For Home page posts thumbnails/Featured Properties carousels thumb.
		add_image_size( 'property-detail-video-image', 818, 417, true ); // For Property detail page video image.
		add_image_size( 'agent-image', 210, 210, true );                 // For Agent Picture.

		if ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
			/**
			 * Modern Design Image Sizes
			 */
			add_image_size( 'partners-logo', 200, 9999, true );                	// For partner carousel logos
			add_image_size( 'modern-property-detail-slider', 1200, 680, true );	// For Property Slider on Property Details Page.
			add_image_size( 'modern-property-child-slider', 680, 510, true );	// For Gallery, Child Property, Property Card, Property Grid Card, Similar Property.
			add_image_size( 'property-listing-image', 400, 300, true );			// For Property List Card, Property Map List Card.
			add_image_size( 'post-featured-image', 850, 570, true );			// For Blog featured image.
		} elseif ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			/**
			 * Classic Design Image Sizes
			 */
			add_image_size( 'partners-logo', 200, 9999, true );                // For partner carousel logos
			add_image_size( 'post-featured-image', 830, 323, true );         // For Standard Post Thumbnails.
			add_image_size( 'gallery-two-column-image', 536, 269, true );    // For Gallery Two Column property Thumbnails.
			add_image_size( 'property-detail-slider-image', 770, 386, true );// For Property detail page slider image.
			add_image_size( 'property-detail-slider-image-two', 830, 460, true ); // For Property detail page slider image.
			add_image_size( 'property-detail-slider-thumb', 82, 60, true );  // For Property detail page slider thumb.
			add_image_size( 'grid-view-image', 246, 162, true );             // For Property Listing Grid view image.
		}

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add theme support for selective refresh
		 * of widgets in customizer.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

	}

	add_action( 'after_setup_theme', 'inspiry_theme_setup' );

}


/**
 * Custom Post Types
 */
require_once( INSPIRY_FRAMEWORK . 'include/agent-post-type.php' );        // Agent CPT.
require_once( INSPIRY_FRAMEWORK . 'include/property-post-type.php' );     // Property CPT.
require_once( INSPIRY_FRAMEWORK . 'include/partners-post-type.php' );     // Partner CPT.
require_once( INSPIRY_FRAMEWORK . 'include/slide-post-type.php' );        // Slide CPT.


/**
 * Google Fonts
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/google-fonts/google-fonts.php' );


/**
 * Customizer
 */
require_once( INSPIRY_FRAMEWORK . 'customizer/customizer.php' );


/**
 * Meta Boxes
 */
require_once( INSPIRY_FRAMEWORK . 'meta-box/inspiry-meta-box.php' );


/**
 * Admin Menu
 *
 * @since 3.3.1
 */
if ( file_exists( INSPIRY_FRAMEWORK . 'include/admin/class-rh-admin-menu.php' ) ) {
	require_once( INSPIRY_FRAMEWORK . 'include/admin/class-rh-admin-menu.php' );
}


/**
 * Design Selector Page.
 *
 * @since 3.0.0
 */
if ( file_exists( INSPIRY_FRAMEWORK . 'include/design-page/design-page-init.php' ) ) {
	require_once( INSPIRY_FRAMEWORK . 'include/design-page/design-page-init.php' );
}


/*
 * TGM plugin activation
 */
if ( file_exists( INSPIRY_FRAMEWORK . 'include/tgm/inspiry-required-plugins.php' ) ) {
	require_once( INSPIRY_FRAMEWORK . 'include/tgm/inspiry-required-plugins.php' );
}


/**
 * Load functions files
 */
require_once( INSPIRY_FRAMEWORK . 'functions/load.php' );


/**
 * Shortcodes
 */
require_once( INSPIRY_FRAMEWORK . 'include/shortcodes/columns.php' );
require_once( INSPIRY_FRAMEWORK . 'include/shortcodes/elements.php' );
// if visual composer is installed then include related mapping code for properties shortcode.
if ( class_exists( 'Vc_Manager' ) ) {
	require_once( get_template_directory() . '/framework/include/shortcodes/vc-map.php' );
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 828;
}


if ( ! function_exists( 'inspiry_theme_sidebars' ) ) {
	/**
	 * Sidebars, Footer and other Widget areas
	 */
	function inspiry_theme_sidebars() {

		// Location: Default Sidebar.
		register_sidebar( array(
			'name' => __( 'Default Sidebar', 'framework' ),
			'id' => 'default-sidebar',
			'description' => __( 'Widget area for default sidebar on news and post pages.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Sidebar Pages.
		register_sidebar( array(
			'name' => __( 'Pages Sidebar', 'framework' ),
			'id' => 'default-page-sidebar',
			'description' => __( 'Widget area for default page template sidebar.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Sidebar for contact page.
		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			register_sidebar( array(
				'name' => __( 'Contact Sidebar', 'framework' ),
				'id' => 'contact-sidebar',
				'description' => __( 'Widget area for contact page sidebar.', 'framework' ),
				'before_widget' => '<section class="widget clearfix %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="title">',
				'after_title' => '</h3>',
			) );
		}

		// Location: Sidebar Property.
		register_sidebar( array(
			'name' => __( 'Property Sidebar', 'framework' ),
			'id' => 'property-sidebar',
			'description' => __( 'Widget area for property detail page sidebar.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Sidebar Properties List.
		register_sidebar( array(
			'name' => __( 'Properties List Sidebar', 'framework' ),
			'id' => 'property-listing-sidebar',
			'description' => __( 'Widget area for sidebar in properties list, grid and archive pages.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Sidebar dsIDX.
		register_sidebar( array(
			'name' => __( 'dsIDX Sidebar', 'framework' ),
			'id' => 'dsidx-sidebar',
			'description' => __( 'Widget area for dsIDX related pages.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Footer First Column.
		register_sidebar( array(
			'name' => __( 'Footer First Column', 'framework' ),
			'id' => 'footer-first-column',
			'description' => __( 'Widget area for first column in footer.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Footer Second Column.
		register_sidebar( array(
			'name' => __( 'Footer Second Column', 'framework' ),
			'id' => 'footer-second-column',
			'description' => __( 'Widget area for second column in footer.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Footer Third Column.
		register_sidebar( array(
			'name' => __( 'Footer Third Column', 'framework' ),
			'id' => 'footer-third-column',
			'description' => __( 'Widget area for third column in footer.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Footer Fourth Column.
		if ( 'classic' === INSPIRY_DESIGN_VARIATION ) {
			register_sidebar( array(
				'name' => __( 'Footer Fourth Column', 'framework' ),
				'id' => 'footer-fourth-column',
				'description' => __( 'Widget area for fourth column in footer.', 'framework' ),
				'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="title">',
				'after_title' => '</h3>',
			) );
		}

		// Location: Sidebar Agent.
		register_sidebar( array(
			'name' => __( 'Agent Sidebar', 'framework' ),
			'id' => 'agent-sidebar',
			'description' => __( 'Sidebar widget area for agent detail page.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Location: Home Search Area.
		register_sidebar( array(
			'name' => __( 'Home Search Area', 'framework' ),
			'id' => 'home-search-area',
			'description' => __( 'Widget area for only IDX Search Widget. Using this area means you want to display IDX search form instead of default search form.', 'framework' ),
			'before_widget' => '<section id="home-idx-search" class="clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="home-widget-label">',
			'after_title' => '</h3>',
		) );

		// Location: Property Search Template.
		register_sidebar( array(
			'name' => __( 'Property Search Sidebar', 'framework' ),
			'id' => 'property-search-sidebar',
			'description' => __( 'Widget area for property search template with sidebar.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		) );

		// Create additional sidebar to use with visual composer if needed.
		if ( class_exists( 'Vc_Manager' ) ) {

			// Additional Sidebars.
			register_sidebars( 4, array(
				'name' => __( 'Additional Sidebar %d', 'framework' ),
				'description' => __( 'An extra sidebar to use with Visual Composer if needed.', 'framework' ),
				'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="title">',
				'after_title' => '</h3>',
			) );

		}

		// Create additional sidebar to use with Optima Express if needed.
		if ( class_exists( 'iHomefinderAdmin' ) ) {

			// Additional Sidebars.
			register_sidebar( array(
				'name' => __( 'Optima Express Sidebar', 'framework' ),
				'id' => 'optima-express-page-sidebar',
				'description' => __( 'An extra sidebar to use with Optima Express if needed.', 'framework' ),
				'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="title">',
				'after_title' => '</h3>',
			) );

		}

	}

	add_action( 'widgets_init', 'inspiry_theme_sidebars' );
}


/**
 * Custom Widgets
 */
include_once( INSPIRY_WIDGETS . 'featured-properties-widget.php' );
include_once( INSPIRY_WIDGETS . 'property-types-widget.php' );
include_once( INSPIRY_WIDGETS . 'advance-search-widget.php' );
include_once( INSPIRY_WIDGETS . 'agent-properties-widget.php' );
include_once( INSPIRY_WIDGETS . 'agent-featured-properties-widget.php' );
if ( 'modern' === INSPIRY_DESIGN_VARIATION ) {
	include_once( INSPIRY_WIDGETS . 'rh-contact-information-widget.php' );
}


if ( ! function_exists( 'register_theme_widgets' ) ) {
	/**
	 * Register custom widgets
	 */
	function register_theme_widgets() {
		register_widget( 'Featured_Properties_Widget' );
		register_widget( 'Property_Types_Widget' );
		register_widget( 'Advance_Search_Widget' );
		register_widget( 'Agent_Properties_Widget' );
		register_widget( 'Agent_Featured_Properties_Widget' );
	}

	add_action( 'widgets_init', 'register_theme_widgets' );
}



if ( ! function_exists( 'inspiry_google_fonts' ) ) :
	/**
	 * Google fonts enqueue url
	 */
	function inspiry_google_fonts() {
		$fonts_url            = '';
		$font_families        = array();
		$inspiry_heading_font = get_option( 'inspiry_heading_font', 'Default' );
		$inspiry_secondary_font = get_option( 'inspiry_secondary_font', 'Default' );
		$inspiry_body_font    = get_option( 'inspiry_body_font', 'Default' );

		/*
		 * Heading Font
		 */
		if ( ! empty( $inspiry_heading_font ) && ( 'Default' !== $inspiry_heading_font ) ) {
			$font_families[] = $inspiry_heading_font;
		} else {
			/* Lato is theme's default heading font */
			$font_families[] = 'Lato:400,400i,700,700i';
		}

		/*
		 * Secondary Font
		 */
		if ( ! empty( $inspiry_secondary_font ) && ( 'Default' !== $inspiry_secondary_font ) ) {
			$font_families[] = $inspiry_secondary_font;
		} else {
			/* Robot is theme's default secondary font */
			$font_families[] = 'Roboto:400,400i,500,500i,700,700i';
		}

		/*
		 * Body Font
		 */
		if ( ! empty( $inspiry_body_font ) && ( 'Default' !== $inspiry_body_font ) ) {
			$font_families[] = $inspiry_body_font;
		}

		if ( ! empty( $font_families ) ) {
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;


if ( ! function_exists( 'inspiry_apply_google_maps_arguments' ) ) :
	/**
	 * This function adds google maps arguments to admins side maps displayed in meta boxes
	 *
	 * @param string $google_maps_url - Google Maps URL.
	 * @since 1.0.0
	 */
	function inspiry_apply_google_maps_arguments( $google_maps_url ) {

		/* default map query arguments */
		$google_map_arguments = array();

		return esc_url_raw(
			add_query_arg(
				apply_filters(
					'inspiry_google_map_arguments',
					$google_map_arguments
				),
				$google_maps_url
			)
		);

	}

	// add_filter( 'rwmb_google_maps_url', 'inspiry_apply_google_maps_arguments' );
endif;


if ( ! function_exists( 'inspiry_google_maps_api_key' ) ) :
	/**
	 * This function adds API key ( if provided in settings ) to google maps arguments
	 *
	 * @param string $google_map_arguments - Google Maps Arguments.
	 * @since 1.0.0
	 */
	function inspiry_google_maps_api_key( $google_map_arguments ) {
		/* Get Google Maps API Key if available */
		$google_maps_api_key = get_option( 'inspiry_google_maps_api_key' );
		if ( ! empty( $google_maps_api_key ) ) {
			$google_map_arguments['key'] = urlencode( $google_maps_api_key );
		} else {
			$google_map_arguments['key'] = RH_GOOGLE_MAPS_FALLBACK_API_KEY;
		}

		return $google_map_arguments;
	}

	add_filter( 'inspiry_google_map_arguments', 'inspiry_google_maps_api_key' );
endif;


if ( ! function_exists( 'inspiry_google_maps_language' ) ) :
	/**
	 * This function add current language to google maps arguments
	 *
	 * @param string $google_map_arguments - Google Maps Arguments.
	 * @since 1.0.
	 */
	function inspiry_google_maps_language( $google_map_arguments ) {
		/* Localise Google Map if related theme options is set */
		if ( 'true' == get_option( 'theme_map_localization' ) ) {
			if ( function_exists( 'wpml_object_id_filter' ) ) {                         // FOR WPML.
				$google_map_arguments['language'] = urlencode( ICL_LANGUAGE_CODE );
			} else {                                                                    // FOR Default.
				$google_map_arguments['language'] = urlencode( get_locale() );
			}
		}

		return $google_map_arguments;
	}

	add_filter( 'inspiry_google_map_arguments', 'inspiry_google_maps_language' );
endif;


if ( ! function_exists( 'inspiry_google_maps_api_notice' ) ) :

	/**
	 * Google Maps API Key notice for dashboard
	 *
	 * @since 2.7.0
	 */
	function inspiry_google_maps_api_notice() {
		$google_maps_api_key = get_option( 'inspiry_google_maps_api_key' );
		if ( empty( $google_maps_api_key ) ) {
			?>
			<div class="notice notice-warning is-dismissible">
				<p>
					<a href="http://realhomes.inspirythemes.biz/doc/#google-maps-api-key" target="_blank"><?php esc_html_e( 'Google Maps API key', 'framework' ); ?></a> <?php esc_html_e( 'is missing. It is required to display Google Maps on your website. You have to add it in settings given under', 'framework' ); ?>
					<strong><?php esc_html_e( 'Appearance > Customize > Misc', 'framework' ); ?></strong>
				</p>
			</div>
			<?php
		}
	}

	add_action( 'admin_notices', 'inspiry_google_maps_api_notice' );
endif;


if ( ! function_exists( 'inspiry_update_page_templates' ) ) {

	/**
	 * Function to update page templates.
	 *
	 * @since 3.0.0
	 */
	function inspiry_update_page_templates() {

		if ( ! is_page_template() ) {
			return;
		}

		$page_id = get_queried_object_id();
		if ( ! empty( $page_id ) ) {
			$page_template = get_post_meta( $page_id, '_wp_page_template', true );
		}

		if ( empty( $page_template ) ) {
			return;
		}

		$latest_templates = array(
			/*
			 * Updated properties list template
			 */
			'template-property-listing.php'           => 'templates/list-layout.php',
			'templates/template-property-listing.php' => 'templates/list-layout.php',
			/*
			 * Updated properties grid template
			 */
			'template-property-grid-listing.php'           => 'templates/list-layout.php',
			'templates/template-property-grid-listing.php' => 'templates/grid-layout.php',
			/*
			 * Updated properties with half map template
			 */
			'template-map-based-listing.php'           => 'templates/half-map-layout.php',
			'templates/template-map-based-listing.php' => 'templates/half-map-layout.php',
			/*
			 * Updated favorites template
			 */
			'template-favorites.php'           => 'templates/favorites.php',
			'templates/template-favorites.php' => 'templates/favorites.php',
			/*
			 * Updated my properties template
			 */
			'template-my-properties.php'           => 'templates/my-properties.php',
			'templates/template-my-properties.php' => 'templates/my-properties.php',
			/*
			 * Updated agents list template
			 */
			'template-agent-listing.php'           => 'templates/agents-list.php',
			'templates/template-agent-listing.php' => 'templates/agents-list.php',
			/*
			 * Updated compare properties template
			 */
			'template-compare.php'           => 'templates/compare-properties.php',
			'templates/template-compare.php' => 'templates/compare-properties.php',
			/*
			 * Updated contact template
			 */
			'template-contact.php'           => 'templates/contact.php',
			'templates/template-contact.php' => 'templates/contact.php',
			/*
			 * Updated dsIDXpress template
			 */
			'template-dsIDX.php'           => 'templates/dsIDXpress.php',
			'templates/template-dsIDX.php' => 'templates/dsIDXpress.php',
			/*
			 * Updated edit profile template
			 */
			'template-edit-profile.php'           => 'templates/edit-profile.php',
			'templates/template-edit-profile.php' => 'templates/edit-profile.php',
			/*
			 * Updated full width template
			 */
			'template-fullwidth.php'           => 'templates/full-width.php',
			'templates/template-fullwidth.php' => 'templates/full-width.php',
			/*
			 * Updated 2 Columns Gallery template
			 */
			'template-gallery-2-columns.php'           => 'templates/2-columns-gallery.php',
			'templates/template-gallery-2-columns.php' => 'templates/2-columns-gallery.php',
			/*
			 * Updated 3 Columns Gallery template
			 */
			'template-gallery-3-columns.php'           => 'templates/3-columns-gallery.php',
			'templates/template-gallery-3-columns.php' => 'templates/3-columns-gallery.php',
			/*
			 * Updated 4 Columns Gallery template
			 */
			'template-gallery-4-columns.php'           => 'templates/4-columns-gallery.php',
			'templates/template-gallery-4-columns.php' => 'templates/4-columns-gallery.php',
			/*
			 * Updated home template
			 */
			'template-home.php'           => 'templates/home.php',
			'templates/template-home.php' => 'templates/home.php',
			/*
			 * Updated login template
			 */
			'template-login.php'           => 'templates/login-register.php',
			'templates/template-login.php' => 'templates/login-register.php',
			/*
			 * Updated membership plans template
			 */
			'template-memberships.php'           => 'templates/membership-plans.php',
			'templates/template-memberships.php' => 'templates/membership-plans.php',
			/*
			 * Updated optima express template
			 */
			'template-optima-express.php'           => 'templates/optima-express.php',
			'templates/template-optima-express.php' => 'templates/optima-express.php',
			/*
			 * Updated search template
			 */
			'template-search.php'           => 'templates/properties-search.php',
			'templates/template-search.php' => 'templates/properties-search.php',
			/*
			 * Updated search template with right sidebar
			 */
			'template-search-right-sidebar.php'           => 'templates/properties-search-right-sidebar.php',
			'templates/template-search-right-sidebar.php' => 'templates/properties-search-right-sidebar.php',
			/*
			 * Updated search template with left sidebar
			 */
			'template-search-sidebar.php'           => 'templates/properties-search-left-sidebar.php',
			'templates/template-search-sidebar.php' => 'templates/properties-search-left-sidebar.php',
			/*
			 * Updated submit property template
			 */
			'template-submit-property.php'           => 'templates/submit-property.php',
			'templates/template-submit-property.php' => 'templates/submit-property.php',
			/*
			 * Updated users list template
			 */
			'template-users-listing.php'           => 'templates/users-lists.php',
			'templates/template-users-listing.php' => 'templates/users-lists.php',
		);

		if ( ! empty( $page_template ) && array_key_exists( $page_template, $latest_templates ) ) {

			$updated_template = $latest_templates[ $page_template ];
			update_post_meta( $page_id, '_wp_page_template', $updated_template );
			echo '<meta HTTP-EQUIV="Refresh" CONTENT="1">';

		} elseif ( ! empty( $page_template ) &&
				   false !== strpos( $page_template, 'template-' ) &&
				   false === strpos( $page_template, 'templates/' ) ) {

				update_post_meta( $page_id, '_wp_page_template', 'templates/' . $page_template );
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1">';
		}

	}

	add_action( 'wp_head', 'inspiry_update_page_templates' );
}

// Enable shortcodes in text widgets.
add_filter( 'widget_text','do_shortcode' );

// To remove auto p tags in text widget.
remove_filter( 'widget_text_content', 'wpautop' );

/*
 * Disable Gutenberg for required post types.
 */
add_filter( 'gutenberg_can_edit_post_type', 'inspiry_gutenberg_can_edit_post_type' );
function inspiry_gutenberg_can_edit_post_type( $can_edit, $post_type ) {
	If ( in_array( $post_type, array( 'post', 'page', 'property', 'agent', 'slide', 'partner' ) ) ) {
        return false;
	}
	return $can_edit;
}