<?php

$context = Timber::get_context();

$s = $context['search_query'] = get_search_query();

global $paged;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$posts = new Timber\PostQuery([
  'posts_per_page' => -1,
  'post_type' => array('post','page'),
  's' => get_search_query(),
  'order' => 'desc',
]);

$context['results'] = [];

foreach($posts as $key => $value) {
  $context['results'][$key] = $value;
}





Timber::render('search.twig', $context );


