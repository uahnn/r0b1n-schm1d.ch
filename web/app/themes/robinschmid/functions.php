<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Require Composer autoloader if installed on it's own
 */
if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require_once $composer;
}

/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 */
array_map(function ($file) {
    if (!locate_template("src/{$file}.php", true, true)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage
 *
 * We do this so that the Template Hierarchy will look in themes/sage/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage
 *
 * This is not fully compatible with Live Preview without the use of a plugin to update the template option.
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/templates
 */
if (is_customize_preview()) {
    return;
}
add_filter('template', function ($stylesheet) {
    return dirname($stylesheet);
});
if (basename($stylesheet = get_option('template')) !== 'templates') {
    update_option('template', "{$stylesheet}/templates");
    wp_redirect($_SERVER['REQUEST_URI']);
    exit();
}

load_theme_textdomain('sage', get_template_directory() . '/languages');

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'page_title' => 'Header Einstellungen',
        'menu_title' => 'Header',
        'menu_slug' => 'header-settings',
        'parent' => 'options-general.php',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Footer Einstellungen',
        'menu_title' => 'Footer',
        'menu_slug' => 'footer-settings',
        'parent' => 'options-general.php',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function robinschmid_search_form($form)
{

    $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url('/') . '" >
<div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
<input type="text" placeholder="'. __('Suchen') .'" class="search-form__field" value="' . get_search_query() . '" name="s" id="s" />
<input type="submit" id="searchsubmit" class="search-form__submit" value="' . esc_attr__('Search') . '" />
</div>
</form>';

    return $form;
}

add_filter('get_search_form', 'robinschmid_search_form');