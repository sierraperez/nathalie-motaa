

<div class="photo-item">
    <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="lightbox-trigger photo-link">
        <img
            src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
            alt="<?php echo esc_attr(get_the_title()); ?>"
            class="gallery-image">
    </a>
    <div class="single__overlay">
        <span>
            <img class="single__overlay-fullscreen" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_fullscreen.png" alt="Icône plein écran" />
        </span>
        <span class="single__overlay-eye">
            <a href="<?php echo get_post_permalink(); ?>">
                <img  class="single__overlay-eye" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_eye.png" alt="Icône oeil ouvert" />

            </a>
        </span>
        <div class="single__caption">
            <span class="single__overlay-title"><?php the_title(); ?></span>
            <span class="single__overlay-categorie"><?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie')); ?></span>
        </div>
    </div>
</div>