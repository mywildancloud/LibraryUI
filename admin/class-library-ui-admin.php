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
                    'message_youtube' => array(
    					'type' => 'notification_message',
						'icon' => 'fab fa-youtube',
    					'description' => sprintf( '
        					<h1>Tutorials</h1> 
        					<p>Watch tutorials for using the plugin on the YouTube channel.</p>
        					' ),
    					'buttons' => array (
        					array(
            				'url' => "https://youtube.com",
            				'text' => esc_html__('Watch Tutorials', 'subdomain'),
            				'class' => 'button_black'
        						),
    						)
						),
					'message_group_support' => array(
    					'type' => 'notification_message',
						'icon' => 'fa fa-users-rectangle',
    					'description' => sprintf( '
        					<h1>Group Support</h1> 
        					<p>Discussions between members and exchanging information about using plugins.</p>
        					' ),
    					'buttons' => array (
        					array(
            				'url' => "https://telegram.com",
            				'text' => esc_html__('Group Support', 'subdomain'),
            				'class' => 'button_black'
        						),
    						)
						),
					'message_ticket' => array(
    					'type' => 'notification_message',
						'icon' => 'fa fa-life-ring',
    					'description' => sprintf( '
        					<h1>Submit a Ticket</h1> 
        					<p>If you experience problems in use and find bugs, please create a ticket.</p>
        					' ),
    					'buttons' => array (
        					array(
            				'url' => "https://telegram.com",
            				'text' => esc_html__('Submit a Ticket', 'subdomain'),
            				'class' => 'button_black'
        						),
    						)
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
                    'lui_title' => array(
                        'type' => 'text',
                        'label' => esc_html__('Site Title', 'my-domain'),
                        'hint'    => esc_html__( 'this is the title of your website', 'my-domain' ),
                    ),
					'lui_tagline' => array(
                        'type' => 'textarea',
                        'label' => esc_html__('Tagline', 'my-domain'),
                        'hint'    => esc_html__( 'this is the tagline of your website', 'my-domain' ),
                    ),
					'lui_logo' => array(
                        'type' => 'image',
                        'label' => esc_html__('Logo Light', 'my-domain'),
                        'description'    => esc_html__( 'logo will be used for light mode', 'my-domain' ),
                    ),
					'lui_logo_dark' => array(
                        'type' => 'image',
                        'label' => esc_html__('Logo Dark', 'my-domain'),
                        'description'    => esc_html__( 'logo will be used for dark mode', 'my-domain' ),
                    ),
					'lui_favicon' => array(
                        'type' => 'image',
                        'label' => esc_html__('Favicon', 'my-domain'),
                    ),
					'lui_shortcode' => array(
                        'type' => 'text',
                        'label' => esc_html__('Shortcode', 'my-domain'),
						'description'    => esc_html__( 'copy the shortcode then paste it into any page builder to display the darkmode toggle', 'my-domain' ),
						'value' => '[darkmode]',
						'readonly' => true,
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
                    'lui_display' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Display', 'my-domain'),
						'description' => esc_html__('used for display headlines', 'my-domain'),
						'value' => [
							'color' => '#010101',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '48',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_h1' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Heading 1', 'my-domain'),
						'description' => esc_html__('Display H1', 'my-domain'),
						'value' => [
							'color' => '#010101',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '36',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_h2' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Heading 2', 'my-domain'),
						'description' => esc_html__('Display H2', 'my-domain'),
						'value' => [
							'color' => '#010101',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '32',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_h3' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Heading 3', 'my-domain'),
						'description' => esc_html__('Display H3', 'my-domain'),
						'value' => [
							'color' => '#010101',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '28',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_h4' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Heading 4', 'my-domain'),
						'description' => esc_html__('Display H4', 'my-domain'),
						'value' => [
							'color' => '#010101',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '20',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_h5' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Heading 5', 'my-domain'),
						'description' => esc_html__('Display H5', 'my-domain'),
						'value' => [
							'color' => '#010101',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '20',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_h6' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Heading 6', 'my-domain'),
						'description' => esc_html__('Display H6', 'my-domain'),
						'value' => [
							'color' => '#010101',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '16',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_span' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Span', 'my-domain'),
						'description' => esc_html__('Display Span', 'my-domain'),
						'value' => [
							'color' => '#4338ca',
							'font-family' => 'Inter',
							'text-transform' => 'capitalize',
							'font-size' => '14',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_p' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Paragraph', 'my-domain'),
						'description' => esc_html__('Paragraph', 'my-domain'),
						'value' => [
							'color' => '#333',
							'font-family' => 'Open Sans',
							'text-transform' => 'lowercase',
							'font-size' => '14',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
					),
					'lui_btn_text' => array(
    					'type' => 'typography',
    					'label' => esc_html__('Button', 'my-domain'),
						'description' => esc_html__('Text Color for button', 'my-domain'),
						'value' => [
							'color' => '#FFF',
							'font-family' => 'Open Sans',
							'text-transform' => 'lowercase',
							'font-size' => '14',
							],
    					'excluded' => array(
        					'subset',
        					'backup-font',
							'preview',
							'text-align',
    					)
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
                    'lui_background' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Background', 'my-domain' ),
					'description' => esc_html__( 'set the color for the background.', 'my-domain' ),
					'value' => '#FFF',
						),
					'lui_text-color' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Text Color', 'my-domain' ),
					'description' => esc_html__( 'set the color for the text color.', 'my-domain' ),
					'value' => '#333',
						),
					'lui_body' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Body', 'my-domain' ),
					'description' => esc_html__( 'set the color for the body.', 'my-domain' ),
					'value' => '#FFF',
						),
					'lui_sidebar' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Sidebar', 'my-domain' ),
					'description' => sprintf( '<p>to use sidebar colors use css classes <strong>lui--sidebar</strong></p>'),
					'value' => '#FFF',
						),
					'lui_topbar' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Topbar', 'my-domain' ),
					'description' => sprintf( '<p>to use topbar colors use css classes <strong>lui--topbar</strong></p>'),
					'value' => '#FFF',
						),
					'lui_bottombar' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Bottombar', 'my-domain' ),
					'description' => sprintf( '<p>to use bottombar colors use css classes <strong>lui--bottombar</strong></p>'),
					'value' => '#FFF',
						),
					'lui_container' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Container', 'my-domain' ),
					'description' => sprintf( '<p>to use container colors use css classes <strong>lui--container</strong></p>'),
					'value' => '#FFF',
						),
					'lui_cards' => array(
   					'type' => 'color',
   					'label' => esc_html__( 'Cards', 'my-domain' ),
					'description' => sprintf( '<p>to use cards colors use css classes <strong>lui--cards</strong></p>'),
					'value' => '#f1f5f9',
						),
					'lui_link' => array(
    				'type' => 'link_color',
    				'label' => esc_html__( 'Link Color', 'my-domain' ),
    				'value' => [
        				'regular'  => '#020617',
        				'hover'    => '#6366f1',
        				'active'   => '#4f46e5',
    						],
    				'description' => esc_html__( 'configure link text color.', 'my-domain' ),
						),
					'lui_btn_bg' => array(
    				'type' => 'link_color',
    				'label' => esc_html__( 'Button', 'my-domain' ),
    				'value' => [
        				'regular'  => '#020617',
        				'hover'    => '#6366f1',
        				'active'   => '#4f46e5',
    						],
    				'description' => esc_html__( 'configure background color for button.', 'my-domain' ),
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
                    'lui_margin' => array(
    				'type' => 'spacing',
    				'label' => esc_html__( 'Margin', 'my-domain' ),
    				'units' => ['px', 'em', 'rem'],
    				'value' => [
        				'top' => '10',
        				'right' => '20',
        				'bottom' => '30',
        				'left' => '40',
        				'unit' => 'px',
    					],
    				'description' => sprintf( '<p>set the distance between elements more consistently, use CSS classes <strong>m--t m--b m--y m--x</strong></p>'),
					'hint' => esc_html__( 'example: used m--t to provide margin-top.', 'my-domain' ),
						),
					'lui_padding' => array(
    				'type' => 'spacing',
    				'label' => esc_html__( 'Padding', 'my-domain' ),
    				'units' => ['px', 'em', 'rem'],
    				'value' => [
        				'top' => '10',
        				'right' => '20',
        				'bottom' => '30',
        				'left' => '40',
        				'unit' => 'px',
    					],
    				'description' => sprintf( '<p>set the distance between elements more consistently, use CSS classes <strong>p--t p--b p--y p--x</strong></p>'),
					'hint' => esc_html__( 'example: used p--t to provide padding-top.', 'my-domain' ),
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
                    'lui_edtior_css' => array(
    				'type' => 'ace_editor',
    				'label' => esc_html__('CSS', 'my-domain'),
					'description' => esc_html__( 'example: used .container for css classes or used #content for css id.', 'my-domain' ),
    				'lang' => 'css',
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