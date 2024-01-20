<?php 
/* 
Template Name: Pagina de listadod e libros
*/
?>

<?php get_header();?>

   
<div class="container">

    <div class="izquierda">

        <section>

        <?php 
        $wp_query = null; 
        $wp_query = new WP_Query(); 
        $args = array(
            "post_type" => "book",
            "order_by" => "title",
            "order" => "ASC"
        );
        $wp_query -> query($args); 
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); 
            $post_id = get_the_ID(); 
            // Pillamos el ISBN 
            $isbn = get_post_meta($post_id, "info_libro_isbn"); 
            $encuadernacion = get_post_meta($post_id, "info_libro_encuadernacion"); 
            $tapa = get_post_meta($post_id, "info_libro_tapa");
            ?>
            <article class="single">
                <div class="imagen"><?php the_post_thumbnail();?></div>

                <div class="titulo">
                <a href= "<?php the_permalink();?>"> <?php the_title();?></a>
            </div>
                <div class="isbn">ISBN: <?php echo $isbn[0];?></div>
                <div class="isbn">Tipo de encuadernación: <?php echo $encuadernacion[0];?></div> 
                <div class="isbn">Tipo de tapa: <?php echo $tapa[0];?></div>
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