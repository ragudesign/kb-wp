<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       ragudev.com
 * @since      1.0.0
 *
 * @package    Fdwp
 * @subpackage Fdwp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fdwp
 * @subpackage Fdwp/admin
 * @author     ragu <me@ragudev.com>
 */
class Fdwp_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fdwp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fdwp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fdwp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fdwp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fdwp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fdwp-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Register CPT.
	 *
	 * @since    1.0.0
	 */
	public function fdwp_faq_cpt() {

		$labels = array(
			'name' => _x('FAQ', 'post type general name'),
			'singular_name' => _x('FAQ', 'post type singular name'),
			'menu_name' => _x('FAQs', 'post type singular name'),
			'add_new' => _x('Add new', 'ir'),
			'add_new_item' => __('Add new FAQ'),
			'edit_item' => __('Edit FAQ'),
			'new_item' => __('New FAQ'),
			'view_item' => __('View FAQ'),
			'search_items' => __('Search FAQ'),
			'not_found' =>  __('Nothing found'),
			'not_found_in_trash' => __('Nothing found in trash'),
			'parent_item_colon' => ''
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'show_in_admin_bar' => false,
			'menu_position'=> 20,
			'menu_icon' => 'dashicons-editor-help',
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'show_in_graphql' => true,
			'hierarchical' => false,
			'graphql_single_name' => 'faq',
			'graphql_plural_name' => 'faqs',
			'has_archive' => false,
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'excerpt')
		);

		register_post_type( 'faq' , $args );

	}


	/**
	 * Register Tax
	 *
	 * @since    1.0.0
	 */
	public function fdwp_faq_tax() {

		$labels = array(
			'name' => _x( 'FAQ Category', 'taxonomy general name' ),
			'singular_name' => _x( 'FAQ Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Category' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item' => __( 'Edit type' ),
			'update_item' => __( 'Update type' ),
			'add_new_item' => __( 'Add new type' ),
			'new_item_name' => __( 'New type name' ),
			'menu_name'         => __( 'Types' ),
		  );
	  
		  $args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
		  );
	  
		  register_taxonomy( 'faq-cat', array( 'faq' ), $args );

	}

}
