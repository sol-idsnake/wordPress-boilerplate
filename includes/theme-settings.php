<?

/**
 * Essential theme supports
 **/
function theme_setup()
{
    /** tag-title **/
    add_theme_support('title-tag');

    /** post thumbnail **/
    add_theme_support('post-thumbnails');

    /** HTML5 support **/
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));

    /** Add support for responsive embedded content **/
    add_theme_support('responsive-embeds');

    register_nav_menus(
        array(
            'primary' => esc_html__('Header menu'),
            'footer' => esc_html__('Footer menu'),
        )
    );
}
add_action('after_setup_theme', 'theme_setup');
