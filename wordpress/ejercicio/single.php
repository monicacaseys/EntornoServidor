<?php get_header();?>
<div>
<div class="container">

    <div class="izquierda">
        <section class="contenido">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) { the_post(); ?>
                       <article class = "single">
                    <div class="imagen"><?php the_post_thumbnail();?></div>

                    <div class="titulo"><?php the_title();?></div>

                    <div class="contenido_article">
                        <?php the_content();?>
                    </div>

                </article>

                <?php }
                
                    }
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