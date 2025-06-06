<?php
/**
 * Article functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Article
 * @since Article 1.0
 */

if (!function_exists('article_support')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Article 1.0
     *
     * @return void
     */
    function article_support()
    {
        // Enqueue editor styles.
        add_editor_style('style.css');

        // Make theme available for translation.
        load_theme_textdomain('article-gutenberg');
    }

}

add_action('after_setup_theme', 'article_support');

if (!function_exists('article_styles')) {
    /**
     * Enqueue scripts and styles.
     *
     * @since Article 1.0
     *
     * @return void
     */
    function article_scripts()
    {
        // Register theme stylesheet.
        wp_register_style(
            'article-style',
            get_template_directory_uri() . '/style.css',
            array(),
            wp_get_theme()->get('Version')
        );

        // Enqueue theme stylesheet.
        wp_enqueue_style('article-style');

        // Register theme script.
        wp_register_script(
            'article-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array(),
            wp_get_theme()->get('Version')
        );

        // Enqueue theme script.
        wp_enqueue_script('article-script');
    }
}

add_action('wp_enqueue_scripts', 'article_scripts');
