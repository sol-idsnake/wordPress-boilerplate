<?

/**
 * 
 * Loads Gutenberg Fullscreen fix
 * 
 **/
function gutenberg_scripts()
{
    if (is_admin()) {
        wp_enqueue_script(
            'custom-gutenberg',
            get_template_directory_uri() . '/dist/js/gutenberg.js'
        );
    }
}
add_action('admin_enqueue_scripts', 'gutenberg_scripts');

/**
 * 
 * Loads theme assets
 * 
 **/
function playground_styles()
{
    // Register theme stylesheet.
    $theme_version = wp_get_theme()->get('Version');
    $version_string = $theme_version;
    $basic_css_v = sprintf(
        '%s.%s',
        $version_string,
        filemtime(get_template_directory() . '/style.css')
    );
    $custom_css_v = sprintf(
        '%s.%s',
        $version_string,
        filemtime(get_template_directory() . '/dist/css/theme.min.css')
    );
    $custom_js_v = sprintf(
        '%s.%s',
        $version_string,
        filemtime(get_template_directory() . '/dist/js/theme.min.js')
    );

    wp_dequeue_style('wp-block-library');
    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/style.css',
        array(),
        $basic_css_v
    );
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@400;600&display=swap');
    wp_enqueue_style(
        'custom-css',
        get_template_directory_uri() . '/dist/css/theme.min.css',
        array(),
        $custom_css_v
    );

    // wp_enqueue_script('jquery');
    wp_enqueue_script(
        'custom-js',
        get_template_directory_uri() . '/dist/js/theme.min.js',
        array(),
        $custom_js_v
    );
}
add_action('wp_enqueue_scripts', 'playground_styles');
