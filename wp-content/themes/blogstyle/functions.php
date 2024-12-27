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

// function load_stylesheets(){
//   wp_register_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css' );
//   wp_enqueue_style('Font_Awesome');
//   wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js', null, null, true );
//   wp_enqueue_script('jQuery');

// }
// add_action( 'wp_enqueue_scripts',  'load_stylesheets');

function create_slider_post_type() {
	$labels = array(
			'name'                  => _x('Sliders', 'Post type general name', 'textdomain'),
			'singular_name'         => _x('Slider', 'Post type singular name', 'textdomain'),
			'menu_name'             => _x('Sliders', 'Admin Menu text', 'textdomain'),
			'name_admin_bar'        => _x('Slider', 'Add New on Toolbar', 'textdomain'),
			'add_new'               => __('Add New', 'textdomain'),
			'add_new_item'          => __('Add New Slider', 'textdomain'),
			'new_item'              => __('New Slider', 'textdomain'),
			'edit_item'             => __('Edit Slider', 'textdomain'),
			'view_item'             => __('View Slider', 'textdomain'),
			'all_items'             => __('All Sliders', 'textdomain'),
			'search_items'          => __('Search Sliders', 'textdomain'),
			'parent_item_colon'     => __('Parent Sliders:', 'textdomain'),
			'not_found'             => __('No sliders found.', 'textdomain'),
			'not_found_in_trash'    => __('No sliders found in Trash.', 'textdomain'),
			'featured_image'        => _x('Slider Image', 'Overrides the “Featured Image” phrase for this post type.', 'textdomain'),
			'set_featured_image'    => _x('Set slider image', 'Overrides the “Set featured image” phrase.', 'textdomain'),
			'remove_featured_image' => _x('Remove slider image', 'Overrides the “Remove featured image” phrase.', 'textdomain'),
			'use_featured_image'    => _x('Use as slider image', 'Overrides the “Use as featured image” phrase.', 'textdomain'),
			'archives'              => _x('Slider archives', 'The post type archive label.', 'textdomain'),
			'insert_into_item'      => _x('Insert into slider', 'Overrides the “Insert into post” phrase.', 'textdomain'),
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'slider'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-images-alt2', // Icon for the admin menu
			'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'), // Fields enabled for this post type
	);

	register_post_type('slider', $args);
}
add_action('init', 'create_slider_post_type');

function create_gallery_post_type() { 
	register_post_type('gallery', 
		array( 
			'labels' => array( 
					'name' => __( 'Galleries' ), 
					'singular_name' => __( 'Gallery' ),
					'all_items' => __( 'All Images'),
			), 
			'public' => true, 
			'has_archive' => true, 
			'supports' => array( 'title', 'editor', 'thumbnail' ), 
			'rewrite' => array( 'slug' => 'gallery' ),
			'rewrite' => array('slug' => 'gallery'),
		) 
	); 
} 
add_action( 'init', 'create_gallery_post_type' );

function gallery_meta_box() {
	add_meta_box(
			'gallery_images',             // Unique ID
			'Gallery Images',             // Box title
			'gallery_meta_box_callback',  // Content callback
			'gallery'                     // Post type
	);
}
add_action('add_meta_boxes', 'gallery_meta_box');

function gallery_meta_box_callback($post) {
	wp_nonce_field('save_gallery_images', 'gallery_images_nonce');
	$gallery_images = get_post_meta($post->ID, 'gallery_images', true);
	?>
	<input type="hidden" id="gallery_images" name="gallery_images" value="<?php echo esc_attr($gallery_images); ?>">
	<button type="button" class="button upload-gallery-images">Upload Images</button>
	<div id="gallery-preview">
			<?php
			if (!empty($gallery_images)) {
					$images = explode(',', $gallery_images);
					foreach ($images as $image_id) {
							echo wp_get_attachment_image($image_id, 'thumbnail');
					}
			}
			?>
	</div>
	<?php
}

function save_gallery_images($post_id) {
	if (!isset($_POST['gallery_images_nonce']) || !wp_verify_nonce($_POST['gallery_images_nonce'], 'save_gallery_images')) {
			return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
	}
	if (isset($_POST['gallery_images'])) {
			update_post_meta($post_id, 'gallery_images', sanitize_text_field($_POST['gallery_images']));
	}
}
add_action('save_post', 'save_gallery_images');

function blog_by_category_shortcode($atts) {
	$atts = shortcode_atts(array(
			'category' => '',    // Category slug
			'posts_per_page' => 4,
	), $atts, 'blog_by_category');

	$query = new WP_Query(array(
			'category_name' => $atts['category'],
			'posts_per_page' => $atts['posts_per_page'],
	));

	if ($query->have_posts()) {
			$output = '<div class="posts-list">';
			while ($query->have_posts()) {
					$query->the_post();
					$output .= '<div class="post-item">';
					$output .= '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
					$output .= '<p>' . get_the_excerpt() . '</p>';
					$output .= '</div>';
			}
			$output .= '</div>';

			wp_reset_postdata();
			return $output;
	} else {
			return '<p>No posts found in this category.</p>';
	}
}
add_shortcode('blog_by_category', 'blog_by_category_shortcode');


