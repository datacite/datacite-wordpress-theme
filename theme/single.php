<?php

$context = Timber::get_context();
$post = Timber::query_post();

$categories = Timber::get_terms(
  array(
    'parent' => 0,
    'taxonomy' => 'category',
    'hide_empty' => true
  )
);



$author = $post->author;
$author->author = get_field('author', 'user_'.$author->id);
$context['author'] = $author;
$context['fields'] = get_fields($post);
$context['categories'] = $categories;
$context['post'] = $post;

if(!empty($context['fields']['post']['related'])){
  foreach ($context['fields']['post']['related'] as &$post ){
    $post = new \Timber\Post($post);
    $author = $post->author;
    $author->author = get_field('author', 'user_'.$author->id);
  }
}



Timber::render('single.twig', $context);
