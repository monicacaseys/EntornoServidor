<?php
/*
Template Name: About Template
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
 <section id="about" >
      <div class="row">

         <div class="three columns">

            <img class="profile-pic"><?php the_post_thumbnail();?>

         </div>

         <div class="nine columns main-col">
         <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>

                   
                  
                     <h2 class="titulo">
                     <?php the_title();?></h2>
                     <p>
                    <?php the_excerpt();?><p> 
         
                <?php endwhile;
                
            endif;
                        ?> 
           <!---- <h2>About Me</h2>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
            eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
            voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.
            </p>

            <div class="row">

               <div class="columns contact-details">

                  <h2>Contact Details</h2>
                  <p class="address">
						   <span>Jonathan Doe</span><br>
						   <span>1600 Amphitheatre Parkway<br>
						         Mountain View, CA 94043 US
                     </span><br>
						   <span>(123)456-7890</span><br>
                     <span>anyone@website.com</span>
					   </p>-->

               </div>

            </div> 

         </div>  

      </div> 

   </section> <!-- About Section End-->
