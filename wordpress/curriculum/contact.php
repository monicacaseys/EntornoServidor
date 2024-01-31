<?php
/*
Template Name: Contact Template
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
   <style>
    body{
        color: white;
    }
    .wpforms-field-label {
    color: white !important; 
  }
  .wpforms-16-field_0-last{
    color: white !important;
  }
    </style>
</head>
<body <?php body_class(); ?>>
<?php if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
            <article class="single">
                

                <div class="titulo"><?php the_title();?></div>

                <div class="contenido_article">
                    <?php the_content();?>
                </div>
            </article>
            


            <?php endwhile;
            
            endif;
                        ?>