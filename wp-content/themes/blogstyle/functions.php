<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'blogstyle_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function blogstyle_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'blogstyle_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'blogstyle_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function blogstyle_editor_style() {
		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'blogstyle_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'blogstyle_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function blogstyle_enqueue_styles() {
		wp_enqueue_style(
			'blogstyle-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'blogstyle_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'blogstyle_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since BlogStyle 1.0
	 *
	 * @return void
	 */
	function blogstyle_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'blogstyle' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'blogstyle_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'blogstyle_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since BlogStyle 1.0
	 *
	 * @return void
	 */
	function blogstyle_pattern_categories() {

		register_block_pattern_category(
			'blogstyle_page',
			array(
				'label'       => __( 'Pages', 'blogstyle' ),
				'description' => __( 'A collection of full page layouts.', 'blogstyle' ),
			)
		);

		register_block_pattern_category(
			'blogstyle_post-format',
			array(
				'label'       => __( 'Post formats', 'blogstyle' ),
				'description' => __( 'A collection of post format patterns.', 'blogstyle' ),
			)
		);
	}
endif;
add_action( 'init', 'blogstyle_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'blogstyle_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since BlogStyle 1.0
	 *
	 * @return void
	 */
	function blogstyle_register_block_bindings() {
		register_block_bindings_source(
			'blogstyle/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'blogstyle' ),
				'get_value_callback' => 'blogstyle_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'blogstyle_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'blogstyle_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since BlogStyle 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function blogstyle_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

function load_stylesheets()
{
  wp_register_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css' );
  wp_enqueue_style('Font_Awesome');
  wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js', null, null, true );
  wp_enqueue_script('jQuery');

}
add_action( 'wp_enqueue_scripts',  'load_stylesheets');


