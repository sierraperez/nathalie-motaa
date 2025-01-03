<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nathalie_Mota
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();
    ?>
        <div class="photo-info-container">
            <div class="photo-container">
                <div class="photo-info-left">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                    <p>REFERENCE : <span class="reference_value"><?php echo get_field("reference"); ?></span></p>
                    <p>CATEGORIE : <?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></p>
                    <p>FORMAT : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
                    <p>TYPE : <?php echo get_field("type"); ?></p>
                    <p>ANNEE : <?php echo get_the_date('Y'); ?></p>
                </div>
                <div class="photo-info-right">
                    <img class="img-single" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo the_title_attribute(); ?>">
                </div>

            </div>
            <?php
            // Navegação entre posts com miniaturas e setas
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>

            <div class="photo-info-nav">
                <div class="photo-info-interest">
                    <p>Cette photo vous intéresse ?</p>
                </div>

                <?php
                // Obtém a referência do post
                $post_reference = get_post_meta(get_the_ID(), 'reference', true);
                ?>
                <!-- Botão para abrir o formulário -->
                <div>
                    <button id="contactBtn" class="photo-contact-btn open-contact-modal"
                        data-photo-ref="<?php echo esc_attr($post_reference); ?>">Contact
                    </button>
                </div>
                <div class="bloc-photo-miniature">
					<div class="photo-miniature__fleche">
						<div>
							<?php
							$previous_post = get_previous_post();
							if ($previous_post) {
								$prev_title = strip_tags(str_replace('"', '', $previous_post->post_title));
								$prev_id = $previous_post->ID;
								echo '<a href="' . get_permalink($prev_id) . '" title="' . $prev_title . '" class="prev-link">';
								if (has_post_thumbnail($prev_id)) {
							?>
									<div class="photo-miniature-gauche">
										<?php echo get_the_post_thumbnail($prev_id, array(81, 71)); ?>
									</div>
							<?php
								} else {
									echo '<img src="' . get_template_directory_uri() . '/assets/img/no-image.jpeg" alt="Pas de photo" width="77px"><br>';
								}
								echo '<img src="' . get_template_directory_uri() . '/assets/img/precedent.png" alt="Photo précédente"></a>';
							}
							?>
						</div>
						<div>
							<?php
							$next_post = get_next_post();
							if ($next_post) {
								$next_title = strip_tags(str_replace('"', '', $next_post->post_title));
								$next_id = $next_post->ID;
								echo '<a href="' . get_permalink($next_id) . '" title="' . $next_title . '" class="next-link">';
								if (has_post_thumbnail($next_id)) {
							?>
									<div class="photo-miniature-droite">
										<?php echo get_the_post_thumbnail($next_id, array(81, 71)); ?>
									</div>
							<?php
								} else {
									echo '<img src="' . get_template_directory_uri() . '/assets/img/no-image.jpeg" alt="Pas de photo" width="77px"><br>';
								}
								echo '<img src="' . get_template_directory_uri() . '/assets/img/suivant.png" alt="Photo suivante"></a>';
							}
							?>
						</div>
					</div>
				</div>
            </div>
        </div>

    <?php
    endwhile; // End of the loop.
    ?>
    <div class="aime">
        <h3> Vous aimerez AUSSI</h3>
    </div>
    <div class="sugestion" id="related-photos">
        <?php
        // Obtém a categoria atual do post
        $categories = get_the_terms($post->ID, 'categorie');
        if ($categories && !is_wp_error($categories)) {
            $category_ids = wp_list_pluck($categories, 'term_id');

            // Query inicial: Mostra 2 posts da mesma categoria
            $args = array(
                'post_type'      => 'photo',
                'posts_per_page' => 2,
                'post__not_in'   => array($post->ID), // Exclui o post atual
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field'    => 'term_id',
                        'terms'    => $category_ids,
                    ),
                ),
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/photo/one-photo');
                endwhile;
            endif;

            wp_reset_postdata();
        }
        ?>
    </div>

    <!-- Botão para carregar mais -->
    <button id="load-more"
        data-category="<?php echo esc_attr($category_ids[0]); ?>"
        data-page="1"
        data-exclude="<?php echo get_the_ID(); ?>">Charger plus</button>


</main><!-- #main -->

<?php
get_footer();
