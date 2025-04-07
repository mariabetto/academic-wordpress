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
        load_theme_textdomain('academic-gutenberg');
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

/**
 * This function will connect wp_mail to your authenticated
 * SMTP server. This improves reliability of wp_mail, and 
 * avoids many potential problems.
 *
 * For instructions on the use of this script, see:
 * https://butlerblog.com/easy-smtp-email-wordpress-wp_mail/
 * 
 * Values for constants are set in wp-config.php
 */
add_action('phpmailer_init', 'send_smtp_email');
function send_smtp_email($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->Username   = SMTP_USER;
    $phpmailer->Password   = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_NAME;
}
