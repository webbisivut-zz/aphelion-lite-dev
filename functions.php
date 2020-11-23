<?php
/**
 * Aphelion Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aphelion_Lite
 */

require_once dirname( __FILE__ ) . '/inc/template-constants.php';

if ( ! function_exists( 'aphelion_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aphelion_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Aphelion Lite, use a find and replace
		 * to change 'aphelion-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aphelion-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'aphelion-lite' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'aphelion_lite_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'aphelion_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aphelion_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aphelion_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'aphelion_lite_content_width', 0 );

if ( ! function_exists( 'aphelion_comment' ) ) {
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own aphelion_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * --------------------------
	 */
	function aphelion_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'aphelion' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( _e( '(Edit)', 'aphelion' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
			// Proceed with normal comments.
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<header class="comment-meta comment-author vcard">
					<?php
						echo get_avatar( $comment, 44 );
						printf( '<cite class="fn">%1$s %2$s</cite>',
							get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'aphelion' ) . '</span>' : ''
						);
						printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'aphelion' ), get_comment_date(), get_comment_time() )
						);
					?>
				</header><!-- .comment-meta -->
	
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'aphelion' ); ?></p>
				<?php endif; ?>
	
				<section class="comment-content comment">
					<?php comment_text(); ?>
					<?php edit_comment_link( _e( 'Edit', 'aphelion' ), '<p class="edit-link">', '</p>' ); ?>
				</section><!-- .comment-content -->
	
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => _e( 'Reply', 'aphelion' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</article><!-- #comment-## -->
		<?php
			break;
		endswitch; // end comment_type check
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aphelion_lite_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Top header left', 'aphelion-lite' ),
			'id'            => 'sidebar-top-left',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Top header right', 'aphelion-lite' ),
			'id'            => 'sidebar-top-right',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aphelion-lite' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar for pages', 'aphelion-lite' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'aphelion-lite' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'aphelion-lite' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'aphelion-lite' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'aphelion-lite' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'aphelion-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'aphelion_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aphelion_lite_scripts() {
	wp_enqueue_style( 'aphelion-lite-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'aphelion-lite-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'modernizr-custom-js', get_template_directory_uri() . '/assets/js/modernizr.custom.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'classie-js', get_template_directory_uri() . '/assets/js/classie.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'aphelion-lite-default-js', get_template_directory_uri() . '/assets/js/defaults.min.js', array(), _S_VERSION, true );

	if(_SHOW_STICKY_HEADER) {
		wp_enqueue_script( 'aphelion-lite-sticky-js', get_template_directory_uri() . '/assets/js/sticky-header.min.js', array(), _S_VERSION, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'aphelion-lite-css', get_template_directory_uri() . '/assets/css/frontend.min.css', true, _S_VERSION );
	wp_enqueue_style( 'aphelion-grid-system-css', get_template_directory_uri() . '/assets/css/grid-system.min.css', true, _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'aphelion_lite_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';