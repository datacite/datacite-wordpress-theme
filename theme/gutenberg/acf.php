<?php

add_action( 'acf/init', 'my_acf_init' );

function my_acf_init() {

  if ( ! function_exists( 'acf_register_block' ) ) {
    return;
  }

  acf_register_block( array(
    'name'            => 'how_do_we_work',
    'title'           => __( 'How do we work', 'mohito' ),
    'description'     => __( 'How do we work section', 'mohito' ),
    'render_callback' => 'we_work_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'our_service',
    'title'           => __( 'Our service', 'mohito' ),
    'description'     => __( 'Our service section', 'mohito' ),
    'render_callback' => 'our_service_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'our_values',
    'title'           => __( 'Our values', 'mohito' ),
    'description'     => __( 'Our values section', 'mohito' ),
    'render_callback' => 'our_values_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'front_page_hero',
    'title'           => __( 'Front page Hero', 'mohito' ),
    'description'     => __( 'Front page section', 'mohito' ),
    'render_callback' => 'front_page_hero_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'contact_form',
    'title'           => __( 'Contact Form', 'mohito' ),
    'description'     => __( 'Contact Form section', 'mohito' ),
    'render_callback' => 'contact_form_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'blog_section',
    'title'           => __( 'Blog Section', 'mohito' ),
    'description'     => __( 'Blog Section section', 'mohito' ),
    'render_callback' => 'blog_section_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'logos_section',
    'title'           => __( 'Logos Section', 'mohito' ),
    'description'     => __( 'Logos Section section', 'mohito' ),
    'render_callback' => 'logos_section_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'governance_strategic',
    'title'           => __( 'Governance Strategic', 'mohito' ),
    'description'     => __( 'Governance Strategic', 'mohito' ),
    'render_callback' => 'governance_strategic_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'governance_reports',
    'title'           => __( 'Governance Reports', 'mohito' ),
    'description'     => __( 'Governance Reports', 'mohito' ),
    'render_callback' => 'governance_reports_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'governance_hero',
    'title'           => __( 'Governance Hero', 'mohito' ),
    'description'     => __( 'Governance Hero', 'mohito' ),
    'render_callback' => 'governance_hero_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'governance_members',
    'title'           => __( 'Governance Members', 'mohito' ),
    'description'     => __( 'Governance Members', 'mohito' ),
    'render_callback' => 'governance_members_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'governance_form',
    'title'           => __( 'Governance Form', 'mohito' ),
    'description'     => __( 'Governance Form', 'mohito' ),
    'render_callback' => 'governance_form_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );

  acf_register_block( array(
    'name'            => 'governance_past_members',
    'title'           => __( 'Governance Past Members', 'mohito' ),
    'description'     => __( 'Governance Past Members', 'mohito' ),
    'render_callback' => 'governance_past_members_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'section' ),
    'supports'        => ['customClassName' => false, 'align' => false, 'reusable' => true, 'html' => false],
  ) );
}



function we_work_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  Timber::render( 'block/how-do-we-work-block.twig', $context );
}
function our_service_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  Timber::render( 'block/our-service-block.twig', $context );
}
function our_values_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  Timber::render( 'block/our-values-block.twig', $context );
}
function front_page_hero_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $count = $context['fields']['hero']['news']['range'];
  $context['news'] = Timber::get_posts( ['post_type' => 'post', 'posts_per_page' => $count] );

  Timber::render( 'block/front-page-hero-block.twig', $context );
}
function contact_form_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  Timber::render( 'block/contact-form-block.twig', $context );
}
function blog_section_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;


  foreach ($context['fields']['blog']['post'] as &$post ){
    $post = new \Timber\Post($post);
    $author = $post->author;
    $author->author = get_field('author', 'user_'.$author->id);

    $categories = get_the_category($post->ID);
    $post->categories = $categories;

  }


  Timber::render( 'block/blog-section-block.twig', $context );
}
function logos_section_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  Timber::render( 'block/logos-section-block.twig', $context );
}
function governance_strategic_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  Timber::render( 'block/governance-strategic-block.twig', $context );
}
function governance_reports_block_render_callback( $block, $content = '', $is_preview = false ) {
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  Timber::render( 'block/governance-reports-block.twig', $context );
}
function governance_hero_block_render_callback( $block, $content = '', $is_preview = false ) {

  $page = new TimberPost();
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;
  $context['page'] = $page;


  Timber::render( 'block/governance-hero-block.twig', $context );
}
function governance_members_block_render_callback( $block, $content = '', $is_preview = false ) {

  $context = Timber::context();
  $context['block'] = $block;
  $context['is_preview'] = $is_preview;
  $context['fields'] = get_fields();



  foreach ($context['fields']['governance_members']['members'] as &$post ){
    $post = new \Timber\Post($post);
    $post->fields = get_fields();
    $post->social = get_field('members', $post->ID);
  }



  Timber::render( 'block/governance-members-block.twig', $context );
}
function governance_form_block_render_callback( $block, $content = '', $is_preview = false ) {

  $page = new TimberPost();
  $context = Timber::context();

  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;
  $context['page'] = $page;




  Timber::render( 'block/governance-form-block.twig', $context );
}
function governance_past_members_block_render_callback( $block, $content = '', $is_preview = false ) {

  $page = new TimberPost();
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;
  $context['page'] = $page;

//  $args = array(
//    'post_type' => 'past-member',
//    'posts_per_page' => -1,
//  );
//
//  $posts = new Timber\PostQuery($args);
//  $context['posts'] = $posts;

//  foreach ( $posts as &$post ){
//    $post = new \Timber\Post($post);
//    $post->fields = get_fields();
//    $post->social = get_field('members', $post->ID);
//  }

  $years = [];
  $posts = $context['fields']['past_members']['members'];

  foreach ($posts as $post ){
    $post->fields = get_fields($post);

    $startDate = $post->past_members_start_date;
    $endDate = $post->past_members_end_date;

    $getRangeYear   = range(gmdate('Y', strtotime($startDate)), gmdate('Y', strtotime($endDate)));

    $post->dateRange = $getRangeYear;
    $years[] = $getRangeYear;

    $years = array_flatten($years);
    $years = array_unique($years, SORT_DESC);
    rsort($years);
  }

  $context['years'] = $years;

  Timber::render( 'block/governance-past-members-block.twig', $context );
}



