<?php get_header();?>

   
    <div class="container">

        <div class="izquierda">

            <section>

            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                <article class="single">
                    <div class="imagen"><?php the_post_thumbnail();?></div>

                    <div class="titulo"><?php the_title();?></div>

                    <div class="contenido_article">
                        <?php the_content();?>
                    </div>
                </article>
                


                <?php endwhile;
                
                endif;
                            ?>

            






            </section>

        </div>

    
        <aside>
            <div class="aside_block">
                <h2>Los más visitados</h2>
                <ul class="aside_list">
                    <li>
                        Item 1
                    </li>

                    <li>
                        Item 2
                    </li>

                    <li>
                        Item 3
                    </li>

                    <li>
                        Item 4
                    </li>

                    <li>
                        Item 5
                    </li>
                </ul>
            </div>
        </aside>

    </div>

<?php get_footer();?>