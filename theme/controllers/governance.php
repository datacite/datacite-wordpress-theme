<?php
/**
 * Template Name: Governance
 */


$context = Timber::get_context();
$page = new TimberPost();
$page->acf = get_fields($page);

$args = array(
  'post_type' => 'member',
  'posts_per_page' => -1,
);
$members = new Timber\PostQuery($args);

$context['members'] = $members;


$context['page'] = $page;
Timber::render('governance.twig', $context);
