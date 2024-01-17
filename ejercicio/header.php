<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo("charsert");?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>

    <title><?php bloginfo("name");?></title>
</head>
<body <?php body_class();?>>

    <header>
        
        <div class="logo">
            <a href="<?php echo home_url("/");?>"><img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.jpg"></a>
        </div>

        <nav class="menu_header_container">
            <?php wp_nav_menu(
                array(
                    "theme_location" => "main-menu",
                    "menu_class" => "menu_header"
                )
                );
                ?> 
        </nav>

    </header>