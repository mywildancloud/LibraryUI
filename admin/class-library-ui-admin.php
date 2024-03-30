<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://libraryui.cloud
 * @since      1.0.0
 *
 * @package    Library_Ui
 * @subpackage Library_Ui/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Library_Ui
 * @subpackage Library_Ui/admin
 * @author     LibraryUI.cloud <edpwildan@gmail.com>
 */
class Library_Ui_Admin {

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
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Library_Ui_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Library_Ui_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/library-ui-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Library_Ui_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Library_Ui_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/library-ui-admin.js', array( 'jquery' ), $this->version, false );

	}

}

add_filter('wpcfto_options_page_setup', function ($setups) {
    $setups[] = array(
        /*
         * Here we specify option name. It will be a key for storing in wp_options table
         */
        'option_name' => 'lui_settings',
        
        'title' => esc_html__('Library UI', 'my-domain'),
        'sub_title' => esc_html__('by LibraryUI.cloud', 'my-domain'),
        'logo' => 'https://library.addonsejoli.pro/wp-content/uploads/2024/02/Pasted-image-at-2023-01-24-at-14.37.01-PM.png',

        /*
         * Next we add a page to display our awesome settings.
         * All parameters are required and same as WordPress add_menu_page.
         */
        'page' => array(
            'page_title' => 'Library UI',
            'menu_title' => 'Library UI',
            'menu_slug' => 'lui_options_settings',
            'icon' => 'dashicons-sos',
            'position' => 40,
        ),

        /*
         * And Our fields to display on a page. We use tabs to separate settings on groups.
         */
        'fields' => array(
            // tabs menu
            'lui_home' => array(
                // And its name obviously
                'icon' => 'fa fa-meteor',
                'name' => esc_html__('Dashboard', 'my-domain'),
				'label' => esc_html__('Dashboard', 'my-domain'),
				'fields' => array(
                    // Field key and its settings. Full info about fields read in documentation.
                    'awesome_1' => array(
                        'type' => 'text',
                        'label' => esc_html__('Awesome Field label', 'my-domain'),
                        'value' => 'Awesome default value',
                    ),
                )
            ),
			'lui_general' => array(
                // And its name obviously
                'icon' => 'fa fa-lightbulb',
                'name' => esc_html__('General', 'my-domain'),
				'label' => esc_html__('General Setting', 'my-domain'),
				'fields' => array(
                    // Field key and its settings. Full info about fields read in documentation.
                    'awesome_1' => array(
                        'type' => 'text',
                        'label' => esc_html__('Awesome Field label', 'my-domain'),
                        'value' => 'Awesome default value',
                    ),
                )
            ),
			'lui_typography' => array(
                // And its name obviously
                'icon' => 'fa fa-font',
                'name' => esc_html__('Typography', 'my-domain'),
				'label' => esc_html__('Typography', 'my-domain'),
				'fields' => array(
                    // Field key and its settings. Full info about fields read in documentation.
                    'awesome_1' => array(
                        'type' => 'text',
                        'label' => esc_html__('Awesome Field label', 'my-domain'),
                        'value' => 'Awesome default value',
                    ),
                )
            ),
			'lui_colors' => array(
                // And its name obviously
                'icon' => 'fa fa-palette',
                'name' => esc_html__('Colors', 'my-domain'),
				'label' => esc_html__('Global Colors', 'my-domain'),
				'fields' => array(
                    // Field key and its settings. Full info about fields read in documentation.
                    'awesome_1' => array(
                        'type' => 'text',
                        'label' => esc_html__('Awesome Field label', 'my-domain'),
                        'value' => 'Awesome default value',
                    ),
                )
            ),
			'lui_spacings' => array(
                // And its name obviously
                'icon' => 'fa fa-up-right-and-down-left-from-center',
                'name' => esc_html__('Spacings', 'my-domain'),
				'label' => esc_html__('Margin and Padding', 'my-domain'),
				'fields' => array(
                    // Field key and its settings. Full info about fields read in documentation.
                    'awesome_1' => array(
                        'type' => 'text',
                        'label' => esc_html__('Awesome Field label', 'my-domain'),
                        'value' => 'Awesome default value',
                    ),
                )
            ),
			'lui_custom_css' => array(
                // And its name obviously
                'icon' => 'fa fa-code',
                'name' => esc_html__('Custom CSS', 'my-domain'),
				'label' => esc_html__('Custom CSS', 'my-domain'),
				'fields' => array(
                    // Field key and its settings. Full info about fields read in documentation.
                    'awesome_1' => array(
                        'type' => 'text',
                        'label' => esc_html__('Awesome Field label', 'my-domain'),
                        'value' => 'Awesome default value',
                    ),
                )
            ),
        )
    );

    return $setups;
});

$lui_options = get_option('lui_settings', array());
/*
 * Where 'my_awesome_settings' is the same setup option name.
 */