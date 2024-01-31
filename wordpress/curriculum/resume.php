<?php
/*
Template Name: Resume Template
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <title><?php wp_title(); ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<section id="resume">
   <!-- Education Section -->
   <div class="row education">
      <div class="three columns header-col">
         <h1><span>Education</span></h1>
      </div>
      <div class="nine columns main-col">
      <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                     <p>
                    <?php the_excerpt();?><p> 
         
                <?php endwhile;
                
            endif;
                        ?> 
      </div>
   </div>

</section>


