<?php

/**
 * The main template file
 *
 * This is the main template for displaying a gallery of photos.
 *
 * @package Nathalie_Mota
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part("template-parts/header/hero") ?>



    <?php get_template_part("template-parts/photo/filter-photo") ?>


    <!-- Galeria de Fotos -->
    <section class="galerie-photo" id="photo-gallery">
        <?php
        // Paginação com a variável paged
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 8, // Mostra apenas 8 imagens por página
            'order' => 'DESC',
            'orderby' => 'DATE',
            'paged' => $paged, // A página será dinâmica
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
        ?>
                <!-- Cada imagem da galeria -->
                <?php
                get_template_part("template-parts/photo/one-photo");
                ?>
        <?php
            }
            wp_reset_postdata(); // Reseta a query
        }
        ?>
    </section>


    <!-- Botão para carregar mais -->
    <button id="load-more" data-page="1">Charger plus</button>

    <!-- Lightbox -->
    <div id="photo-lightbox" class="photo-lightbox">
        <span class="close-lightbox">&times;</span>
        <div class="lightbox-content">
            <button class="nav-arrow left-arrow">&larr;</button>
            <img class="lightbox-image" src="" alt="Imagem em destaque">
            <button class="nav-arrow right-arrow">&rarr;</button>
        </div>
        <p class="lightbox-caption"></p> <!-- Legenda agora ficará abaixo -->
    </div>
</main>
<?php
get_footer();
?>