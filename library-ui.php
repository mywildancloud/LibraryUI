<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://libraryui.cloud
 * @since             1.0.0
 * @package           Library_Ui
 *
 * @wordpress-plugin
 * Plugin Name:       Library UI
 * Plugin URI:        https://libraryui.cloud
 * Description:       A template library consisting of designs, prototypes and wireframes for creating websites easily.
 * Version:           1.0.0
 * Author:            LibraryUI.cloud
 * Author URI:        https://libraryui.cloud/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       library-ui
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LIBRARY_UI_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-library-ui-activator.php
 */
function activate_library_ui() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-library-ui-activator.php';
	Library_Ui_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-library-ui-deactivator.php
 */
function deactivate_library_ui() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-library-ui-deactivator.php';
	Library_Ui_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_library_ui' );
register_deactivation_hook( __FILE__, 'deactivate_library_ui' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-library-ui.php';

/**
 * add nuxy framework form theme options
 */
require_once(dirname(__FILE__) . '/NUXY.php');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_library_ui() {

	$plugin = new Library_Ui();
	$plugin->run();

}
run_library_ui();

/* add shortcode darkmode */
function lui_dark_mode() {
	$dark = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="lui-dark" id="lui-dark" viewBox="0 0 20 20" onclick="luiDarkSwitcher()">
	<g id="switcher-icon" transform="translate(-384 -141)">
	  <g id="sun" transform="translate(14)">
		<path id="brightness-high-fill" d="M15,10a5,5,0,1,1-5-5A5,5,0,0,1,15,10ZM10,0a.625.625,0,0,1,.625.625v2.5a.625.625,0,0,1-1.25,0V.625A.625.625,0,0,1,10,0Zm0,16.25a.625.625,0,0,1,.625.625v2.5a.625.625,0,0,1-1.25,0v-2.5A.625.625,0,0,1,10,16.25ZM20,10a.625.625,0,0,1-.625.625h-2.5a.625.625,0,0,1,0-1.25h2.5A.625.625,0,0,1,20,10ZM3.75,10a.625.625,0,0,1-.625.625H.625a.625.625,0,0,1,0-1.25h2.5A.625.625,0,0,1,3.75,10ZM17.071,2.929a.625.625,0,0,1,0,.884L15.3,5.581A.625.625,0,0,1,14.42,4.7l1.767-1.768a.625.625,0,0,1,.884,0ZM5.58,14.42a.625.625,0,0,1,0,.884L3.813,17.071a.625.625,0,1,1-.884-.884L4.7,14.42A.625.625,0,0,1,5.58,14.42Zm11.491,2.651a.625.625,0,0,1-.884,0L14.42,15.3a.625.625,0,1,1,.884-.884l1.767,1.768a.625.625,0,0,1,0,.884ZM5.58,5.581a.625.625,0,0,1-.884,0L2.929,3.813a.625.625,0,1,1,.884-.884L5.58,4.7a.625.625,0,0,1,0,.885Z" transform="translate(370 141)" fill="#f6f7f8"/>
	  </g>
	  <g id="moon" transform="translate(-11.084 2.917)">
		<g id="moon-stars-fill" transform="translate(398 141)">
		  <path id="Path_17" data-name="Path 17" d="M5.384.246a.673.673,0,0,1,.072.76A6.317,6.317,0,0,0,4.668,4.07a6.506,6.506,0,0,0,6.567,6.444,6.684,6.684,0,0,0,1.376-.142.711.711,0,0,1,.727.28.642.642,0,0,1-.028.791,7.531,7.531,0,0,1-5.822,2.726A7.416,7.416,0,0,1,0,6.827,7.343,7.343,0,0,1,4.6.053a.681.681,0,0,1,.786.193Z" transform="translate(0 -0.001)" fill="#181818"/>
		  <path id="Path_18" data-name="Path 18" d="M9.979,2.23a.154.154,0,0,1,.292,0l.274.823a1.23,1.23,0,0,0,.777.777l.823.274a.154.154,0,0,1,0,.292l-.823.274a1.228,1.228,0,0,0-.777.777l-.274.823a.154.154,0,0,1-.292,0L9.7,5.448a1.228,1.228,0,0,0-.777-.777L8.1,4.4a.154.154,0,0,1,0-.292l.823-.274A1.228,1.228,0,0,0,9.7,3.053l.274-.823ZM12.153.071a.1.1,0,0,1,.194,0l.183.548a.818.818,0,0,0,.519.519l.548.183a.1.1,0,0,1,0,.194l-.548.183a.819.819,0,0,0-.519.519l-.183.548a.1.1,0,0,1-.194,0l-.183-.548a.819.819,0,0,0-.519-.519L10.9,1.514a.1.1,0,0,1,0-.194l.548-.183A.818.818,0,0,0,11.97.619l.183-.548Z" transform="translate(0.501 -0.001)" fill="#181818"/>
		</g>
	  </g>
	</g>
  </svg>';
	return $dark;
}
add_shortcode('darkmode', 'lui_dark_mode');

/* add darkmode switcher */
add_action('wp_footer', function() {
	?>
	<style>
			.lui-dark {
				width: 24px;
				height: 24px;
				cursor: pointer;
			}
			g#moon{
				opacity: 1;
				transition: .5s opacity ease-in;
			}

			g#sun{
				opacity: 0;
				transition: .5s opacity ease-in;
			}
			.dark g#moon{
				opacity: 0;
			}

			.dark g#sun{
				opacity: 1;
			}

			body.dark {
				background-color: #333 !important;
				color:#FFF;
}
</style>
	<script>
		function luiDarkSwitcher() {
		  var element = document.getElementById("lui-dark");
		  document.body.classList.toggle("dark");
			}
			// Dark Mode
		var cookieStorage = {
			setCookie: function setCookie(key, value, time, path) {
				var expires = new Date();
				expires.setTime(expires.getTime() + time);
				var pathValue = '';
				if (typeof path !== 'undefined') {
					pathValue = 'path=' + path + ';';
				}
				document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
			},
			getCookie: function getCookie(key) {
				var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
				return keyValue ? keyValue[2] : null;
			},
			removeCookie: function removeCookie(key) {
				document.cookie = key + '=; Max-Age=0; path=/';
			}
		};
	
		jQuery('.lui-dark').click(function() {
			//Show either moon or sun
			jQuery('.lui-dark').toggleClass('active');
			//If dark mode is selected
			if (jQuery('.lui-dark').hasClass('active')) {
				//Add dark mode class to the body
				jQuery('body').addClass('dark');
				cookieStorage.setCookie('light', 'true', 2628000000, '/');
			} else {
				jQuery('body').removeClass('dark');
				setTimeout(function() {
					cookieStorage.removeCookie('light');
				}, 100);
			}
		})
	
		//Check Storage. Display user preference 
		if (cookieStorage.getCookie('light')) {
			jQuery('body').addClass('dark');
			jQuery('.lui-dark').addClass('active');
		}
		// End Dark Mode
	</script>
	<?php
});
