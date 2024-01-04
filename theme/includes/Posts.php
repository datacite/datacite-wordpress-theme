<?php


class Posts
{
    public static $slugs = [
        'member' => "post/new",
        'past-member' =>  "post/new"
    ];

    public static function getSlug($postType, $lang = null)
    {

        if (!empty(self::$slugs) && isset(self::$slugs[$postType])) {
            return self::$slugs[$postType];
        }

        return $postType;
    }

    public static function register()
    {
        register_post_type('member', [
            'labels' => [
                'name' => __('Members', THEME_DOMAIN),
                'singular_name' => __('New member', THEME_DOMAIN),
                'add_new' => __('Add member', THEME_DOMAIN),
                'add_new_item' => __('Add new member', THEME_DOMAIN),
                'edit_item' => __('Edit member', THEME_DOMAIN),
                'new_item' => __('New member', THEME_DOMAIN),
                'all_items' => __('All members', THEME_DOMAIN),
                'view_item' => __('Show members', THEME_DOMAIN),
                'search_items' => __('Search member', THEME_DOMAIN),
                'not_found' => __('Not found', THEME_DOMAIN),
                'not_found_in_trash' => __('Not found in trash', THEME_DOMAIN)
            ],
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => [
                'slug' => self::getSlug('member')
            ],
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'menu_icon' => 'dashicons-format-gallery',
            'supports' => ['title', 'thumbnail', 'page-attributes']
        ]);

      register_post_type('past-member', [
        'labels' => [
          'name' => __('Past Members', THEME_DOMAIN),
          'singular_name' => __('New past member', THEME_DOMAIN),
          'add_new' => __('Add past member', THEME_DOMAIN),
          'add_new_item' => __('Add new past member', THEME_DOMAIN),
          'edit_item' => __('Edit past member', THEME_DOMAIN),
          'new_item' => __('New past member', THEME_DOMAIN),
          'all_items' => __('All past members', THEME_DOMAIN),
          'view_item' => __('Show past members', THEME_DOMAIN),
          'search_items' => __('Search past member', THEME_DOMAIN),
          'not_found' => __('Not found', THEME_DOMAIN),
          'not_found_in_trash' => __('Not found in trash', THEME_DOMAIN)
        ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => [
          'slug' => self::getSlug('past-member')
        ],
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-businessman',
        'supports' => ['title', 'thumbnail', 'page-attributes']
      ]);
    }
}
