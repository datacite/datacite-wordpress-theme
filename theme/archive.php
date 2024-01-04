<?php

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$page = new TimberPost();


$categories = Timber::get_terms(
  array(
    'parent' => 0,
    'taxonomy' => 'category',
    'hide_empty' => true
  )
);

$tags = Timber::get_terms(
  array(
    'parent' => 0,
    'taxonomy' => 'post_tag',
    'hide_empty' => true
  )
);

$archives = new TimberArchives(array(
  'type' => 'monthly',
  'format'=>'html',
));


$context['categories'] = $categories;
$context['tags'] = $tags;


$pages = get_pages(array(
  'meta_key' => '_wp_page_template',
  'meta_value' => 'controllers/blog.php'
));

global $paged;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(

  'post_type' => 'post',
  'paged' => $paged,

);


global $wp_query;

$big = 999999999; // need an unlikely integer

$args = array(
  'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format'    => '?paged=%#%',
  'current'   => max( 1, get_query_var('paged') ),
  'total'     => $wp_query->max_num_pages,
  'next_text' => '&#62;',
  'prev_text' => '&#60;'
);
$pagination = paginate_links($args);



$context['page'] = $page;
$context['fields'] = get_fields($page);
$context['pagination'] = $pagination;

$context['archives'] = new TimberArchives( $args );


Timber::render('archive.twig', $context);
