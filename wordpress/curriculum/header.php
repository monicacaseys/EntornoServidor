<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <title><?php wp_title(); ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
   <?php wp_head(); ?>
   <style>
   html {
   scroll-behavior: smooth;
}
   </style>
</head>
<body <?php body_class(); ?>>


   <!-- Header
   ================================================== -->
   <header id="home">
   <nav id="nav-wrap" class="menu_header_container">
      
            <?php wp_nav_menu(
                array(
                    "theme_location" => "main-menu",
                    "menu_class" => "nav", //cambiar etso con lo que pone en el menu comentado
                    "menu_id" => "nav"
                )
                );
                ?> 
        </nav>
        
        <?php if ( is_home() || is_front_page() ) : ?>
   <div class="row banner">
      <div class="banner-text">
         <h1 class="responsive-headline"><?php bloginfo( 'name' ); ?></h1>
         <h3><?php bloginfo( 'description' ); ?></h3>
         
      </div>
   </div>
<?php endif; ?>


      <!-- <nav id="nav-wrap"> NO SE COMO MOSTARAR EL TEXTO DEL HOME EN SU SITIO

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
            <li><a class="smoothscroll" href="#about">About</a></li>
	         <li><a class="smoothscroll" href="#resume">Resume</a></li>
            <li><a class="smoothscroll" href="#portfolio">Works</a></li>
            <li><a class="smoothscroll" href="#testimonials">Testimonials</a></li>
            <li><a class="smoothscroll" href="#contact">Contact</a></li>
         </ul> 

      </nav>  end #nav-wrap -->

   <!--    <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline">I'm Jonathan Doe.</h1>
            <h3>I'm a Manila based <span>graphic designer</span>, <span>illustrator</span> and <span>webdesigner</span> creating awesome and
            effective visual identities for companies of all sizes around the globe. Let's <a class="smoothscroll" href="#about">start scrolling</a>
            and learn more <a class="smoothscroll" href="#about">about me</a>.</h3>
            <hr />
            <ul class="social">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
               <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p> -->

   </header> <!-- Header End -->
