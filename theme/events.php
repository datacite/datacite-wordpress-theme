<?php

$context = Timber::get_context();
$page = new TimberPost();
$posts = new Timber\PostQuery();

$page->acf = get_fields($page);

$context['page'] = $page;
$context['posts'] = $posts;


Timber::render('events.twig', $context);
