<?php


// include('gutenberg/acf-json.php');
include('gutenberg/acf.php');
include('utilities/utilities.php');

add_action( 'pre_get_posts', function( $q )
{
  if ( $q->is_home() && $q->is_main_query() && $q->get( 'paged' ) > 1 )
    $q->set( 'post__not_in', get_option( 'sticky_posts' ) );

} );


if (!class_exists('Timber')) {
  add_action('admin_notices', function () {
    echo '<div class="error"><p>Timber not activated</p></div>';
  });

  return '<p>Timber not activated</p>';
}
if (!class_exists('ACF')) {
  add_action('admin_notices', function () {
    echo '<div class="error"><p>ACF not activated</p></div>';
  });

  return '<p>ACF not activated</p>';
}

// DEFINITIONS
define('THEME_DOMAIN', wp_get_theme()['TextDomain']);
define('THEME_VERSION', wp_get_theme()['Version']);
define('PER_PAGE', get_option('posts_per_page'));

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/autoload.php';

Timber::$dirname = ['views'];

Ajax::init();
Mail::$templatesLocation = [__DIR__, __DIR__ . '/views/email'];

/**
 * Enqueue editor styles.
 */
if ( ! function_exists( 'my_theme_setup' ) ) :
  function my_theme_setup()  {

    // Enqueue the style sheet in the editor.
    add_editor_style( 'style.css' );
  }
  add_action( 'after_setup_theme', 'my_theme_setup' );
endif;
/**
 * Registers an editor stylesheet for the theme.
 */


class StarterSite extends TimberSite
{
  public function __construct()
  {
    add_theme_support('post-formats', []);
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('editor-styles');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
//     add_theme_support('woocommerce');


    add_filter('timber_context', [$this, 'addToContext']);
    add_filter('get_twig', [TwigFilters::class, 'register']);

    add_action('init', [Posts::class, 'register']);
    add_action('init', [Taxonomies::class, 'register']);

    add_action('admin_init', function () {
      add_editor_style(get_stylesheet_directory_uri() . '/styles/editor-style.css');

    });

    register_nav_menus( array(
      'first-col-menu'  => __( 'First column menu', 'mohito' ),
      'second-col-menu'  => __( 'Second column menu', 'mohito' ),
      'third-col-menu'  => __( 'Third column menu', 'mohito' ),
      'fourth-col-menu'  => __( 'Fourth column menu', 'mohito' ),
      'fifth-col-menu'  => __( 'Fifth column menu', 'mohito' ),
      'sixth-col-menu'  => __( 'Sixth column menu', 'mohito' ),
      'seventh-col-menu'  => __( 'Seventh column menu', 'mohito' ),
      'eight-col-menu'  => __( 'Eight column menu', 'mohito' ),
      'ninth-col-menu'  => __( 'Ninth column menu', 'mohito' )
    ) );


    $this->optionsPage();
    $this->hideMenus();
    $this->options = AcfAdds::getOptions();

    new Base();
    new Assets();

    parent::__construct();
  }



  private function optionsPage()
  {
    if (function_exists('acf_add_options_page')) {
      acf_add_options_page(['page_title' => 'Page settings']);
    }
  }

  private function hideMenus()
  {
    add_action('admin_menu', function () {
      // hide ACF menu for everyone except user mohito
      $user = wp_get_current_user();

      // if ('mohito' !== $user->user_login || ) {
      //   remove_menu_page('edit.php?post_type=acf-field-group');
      //   remove_submenu_page('options-general.php', 'menu_editor');
      // }
    });
  }


  public function addToContext($context)
  {
    $context['menu'] = new TimberMenu('main-menu');
    $context['first_column'] = new TimberMenu('first-col-menu');
    $context['second_column'] = new TimberMenu('second-col-menu');
    $context['third_column'] = new TimberMenu('third-col-menu');
    $context['fourth_column'] = new TimberMenu('fourth-col-menu');
    $context['fifth_column'] = new TimberMenu('fifth-col-menu');
    $context['sixth_column'] = new TimberMenu('sixth-col-menu');
    $context['seventh_column'] = new TimberMenu('seventh-col-menu');
    $context['eight_column'] = new TimberMenu('eight-col-menu');
    $context['ninth_column'] = new TimberMenu('ninth-col-menu');

    $context['theme']->version = THEME_VERSION;;

    $context['search_query'] = get_search_query();
    $context['site'] = $this;
    $context['options'] = $this->options;


    return $context;
  }

}

function display_datacite_post_author( $post_id ) {

  $post_authors = get_post_authors( $post_id );
  
  if ( empty( $post_authors ) or $post_authors[0]->id == 0 ) return $content;

  $author   = $post_authors[0];
  $name     = get_post_meta( $author->id, '_molongui_guest_author_display_name', true );

  echo '<span class="blog-section__link">';

  if ( get_post_thumbnail_id( $author->id ) ) {
    echo wp_get_attachment_image( get_post_thumbnail_id( $author->id ), [24, 24], false, [ 'class' => 'author__icon' ] );
    //echo '<img src="'.get_the_post_thumbnail_url( $author->id ).'">';
  } else {
    echo '<img class="author__icon" src="'. get_avatar_url( $author->id ) .'" alt="Author avatar">';
  }

  echo '</span>';
  echo '<span class="author__name"><span class="blog-section__link">'.$name.'</span></span>';
 
  return $content;
}

new StarterSite();









