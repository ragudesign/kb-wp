<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       ragudev.com
 * @since      1.0.0
 *
 * @package    Kbwp
 * @subpackage Kbwp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Kbwp
 * @subpackage Kbwp/admin
 * @author     ragu <me@ragudev.com>
 */
class Kbwp_Admin {

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
		 * defined in Kbwp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kbwp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/kbwp-admin.css', array(), $this->version, 'all' );

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
		 * defined in Kbwp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kbwp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/kbwp-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Register CPT.
	 *
	 * @since    1.0.0
	 */
	public function kbwp_knowledge_base_cpt() {

		$labels = array(
			'name' => _x('Knowledge Base', 'post type general name'),
			'singular_name' => _x('Knowledge Base', 'post type singular name'),
			'menu_name' => _x('Knowledge Base', 'post type singular name'),
			'add_new' => _x('Add new', 'ir'),
			'add_new_item' => __('Add new FAQ'),
			'edit_item' => __('Edit KB'),
			'new_item' => __('New KB'),
			'view_item' => __('View KB'),
			'search_items' => __('Search KB'),
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
			'graphql_single_name' => 'kb',
			'graphql_plural_name' => 'kbs',
			'has_archive' => false,
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'excerpt'),
		);

		register_post_type( 'kb' , $args );

	}


	/**
	 * Register Tax
	 *
	 * @since    1.0.0
	 */
	public function kbwp_knowledge_base_tax() {

		$labels = array(
			'name' => _x( 'Knowledge Base Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Knowledge Base Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Category' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item' => __( 'Edit Category' ),
			'update_item' => __( 'Update Category' ),
			'add_new_item' => __( 'Add new Category' ),
			'new_item_name' => __( 'New Category name' ),
			'menu_name'         => __( 'Category' )
		  );
	  
		  $args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_graphql' => true,
			'graphql_single_name' => 'kbTax',
			'graphql_plural_name' => 'kbsTax',
			'show_in_rest' => true
		  );
	  
		  register_taxonomy( 'kb-cat', array( 'kb' ), $args );

	}

}
