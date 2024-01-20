<?php get_header();?>

   
    <div class="container">

        <div class="izquierda">

            <section class="contenido">

            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                <article>
                    <div class="imagen"><?php the_post_thumbnail();?></div>

                    <div class="titulo"><?php the_title();?></div>

                    <div class="contenido_article">
                        <?php the_excerpt();?>
                    </div>

                    <div class="leer_mas">
                        <a href="<?php the_permalink();?>">Leer más</a>
                    </div>
                </article>
                


                <?php endwhile;
                
                endif;
                            ?>

            






            </section>

        </div>

    
        <aside>
            <div class="aside_block">
               <?php if (is_active_sidebar("barra-lateral")){?>
                    <div class="widget-area">
                        <?php dynamic_sidebar("barra-lateral");?>
                    </div>
                <?php } ?>
            </div>
        </aside>

    </div>

<?php get_footer();?>