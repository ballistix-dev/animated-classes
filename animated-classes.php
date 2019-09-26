<?php
/*
Plugin Name: Dash Animated Classes
Description: Animates an elements by using animate.css. <strong>To use:</strong> add <code>data-animate="[animation]"</code> to the element, this will trigger the animation as it shows on screen. Visit <a href="https://daneden.github.io/animate.css/" target="_blank">https://daneden.github.io/animate.css/</a> for animations.
Plugin URI: http://#
Author: Marcel Badua
Author URI: http://#
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

/*
Copyright (C) 2019  Marcel Badua  bitterdash@gmail.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('DASH_ANIMATED_CLASSES_PLUGIN'))
{
	class DASH_ANIMATED_CLASSES_PLUGIN
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Register custom post types
			//require_once(sprintf("%s/post-types/post_type_template.php", dirname(__FILE__)));
			//$DASH_ANIMATED_CLASSES_PLUGIN_Template = new DASH_ANIMATED_CLASSES_PLUGIN_Template();

			add_action('wp_enqueue_scripts', array(&$this, 'enqueue_styles_scripts'));

		} // END public function __construct

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate

		// Add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=$dash_animated_classes_plugin">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}

		public function enqueue_styles_scripts()
        {
						wp_enqueue_style(
                'animate.css',
                plugins_url('/animated-classes/css/animate.css', dirname(__FILE__)),
                array(),
                '3.7.2',
                'all'
            );

            wp_enqueue_style(
                'dash_animated_classes',
                plugins_url('/animated-classes/css/dash_animated_classes.css', dirname(__FILE__)),
                array(),
                '1.0.0',
                'all'
            );
            wp_enqueue_script(
                'dash_animated_classes',
                plugins_url('/animated-classes/js/dash_animated_classes.js', dirname(__FILE__)),
                array('jquery'),
                '1.0.0',
                TRUE
                );
        }

	} // END class DASH_ANIMATED_CLASSES_PLUGIN
} // END if(!class_exists('DASH_ANIMATED_CLASSES_PLUGIN'))

if(class_exists('DASH_ANIMATED_CLASSES_PLUGIN'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('DASH_ANIMATED_CLASSES_PLUGIN', 'activate'));
	register_deactivation_hook(__FILE__, array('DASH_ANIMATED_CLASSES_PLUGIN', 'deactivate'));

	// instantiate the plugin class
	$dash_animated_classes_plugin= new DASH_ANIMATED_CLASSES_PLUGIN();

}
