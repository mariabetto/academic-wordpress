<?php
/**
 * Academic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Academic
 * @since Academic 1.0
 */

if (!function_exists('academic_support')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Academic 1.0
     *
     * @return void
     */
    function academic_support()
    {
        // Enqueue editor styles.
        add_editor_style('style.css');

        // Make theme available for translation.
        load_theme_textdomain('academic');
    }

}

add_action('after_setup_theme', 'academic_support');

if (!function_exists('academic_styles')) {
    /**
     * Enqueue scripts and styles.
     *
     * @since Academic 1.0
     *
     * @return void
     */
    function academic_scripts()
    {
        // Register theme stylesheet.
        wp_register_style(
            'academic-style',
            get_template_directory_uri() . '/style.css',
            array(),
            wp_get_theme()->get('Version')
        );

        // Enqueue theme stylesheet.
        wp_enqueue_style('academic-style');

        // Register theme script.
        wp_register_script(
            'academic-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array(),
            wp_get_theme()->get('Version')
        );

        // Enqueue theme script.
        wp_enqueue_script('academic-script');
    }
}

add_action('wp_enqueue_scripts', 'academic_scripts');
