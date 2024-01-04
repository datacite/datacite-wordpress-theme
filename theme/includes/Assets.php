<?php

/*
 * Append styles and scripts to site
 */

class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'registerStyles']);
        add_action('wp_enqueue_scripts', [$this, 'registerScripts']);
        add_action('admin_enqueue_scripts', [$this, 'registerAdminStyles']);
    }

    public function registerStyles()
    {
      wp_enqueue_style('theme-main', get_stylesheet_directory_uri() . '/styles/main.css', false);
      wp_enqueue_style( 'barlow', 'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false );
      wp_enqueue_style( 'md-sans', 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap', false );

    }

    public function registerAdminStyles()
    {
      wp_enqueue_style('bootstrap-grid_admin_css', get_template_directory_uri() . '/assets/bootstrap-grid.css', false, '5.0.2');
      wp_enqueue_style('swiper_admin_css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.0.0/swiper-bundle.css', array(), null, false);
    }

    public function registerScripts()
    {
        wp_enqueue_script('polyfill',
            '//polyfill.io/v3/polyfill.min.js?flags=gated&amp;features=default,Object.entries,Object.values,Array.prototype.includes,Symbol.iterator,Array.prototype.@@iterator,NodeList.prototype.@@iterator,NodeList.prototype.forEach,Array.prototype.find,Array.prototype.forEach,Array.prototype.findIndex,Symbol,Array.from,URL',
            false, null, true);

//        wp_enqueue_script('theme-vendor', get_stylesheet_directory_uri() . '/scripts/vendor.js', false, THEME_VERSION, true);
        wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/bootstrap.bundle.min.js', [], '5.0.2', true);
        wp_enqueue_script('theme-main', get_stylesheet_directory_uri() . '/scripts/main.js', null, THEME_VERSION, true);
        wp_enqueue_script('particles', 'https://cdn.jsdelivr.net/npm/tsparticles@1.18.3/dist/tsparticles.min.js', null, null, false);


        wp_localize_script('theme-main', 'wp', [
            'ajax' => admin_url('admin-ajax.php'),
        ], 'before');
    }
}
