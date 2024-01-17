<?php 
/* 
Template Name: Pagina de contacto
*/
?>
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




</div>

<?php get_footer();?>