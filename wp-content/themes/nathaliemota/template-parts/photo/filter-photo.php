<div class="filter-area swiper-container">
    <form class="form-select flexrow swiper-wrapper" method="post">
        <!-- Campos ocultos para AJAX -->
        <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('nathalie_mota_nonce'); ?>">
        <input type="hidden" name="ajaxurl" id="ajaxurl" value="<?php echo admin_url('admin-ajax.php'); ?>">

        <div class="filters">
            <!-- Filtro de Categorias -->
            <select class="custom-select" id="categorie_id" name="categorie_id">
                <option value="">catégorie</option>
                <?php
                // Obtém os termos da taxonomia 'categorie'
                $categories = get_terms('categorie', array('hide_empty' => false));
                foreach ($categories as $category) {
                    // Escapa os valores e seleciona dinamicamente se necessário
                    $selected = ($category->term_taxonomy_id == $categorie_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($category->term_taxonomy_id) . '" ' . esc_attr($selected) . '>' . esc_html($category->name) . '</option>';
                }
                ?>
            </select>

            <!-- Filtro de Formatos -->
            <select class="custom-select" id="format_id" name="format_id">
                <option value="">format</option>
                <?php
                // Obtém os termos da taxonomia 'format'
                $formats = get_terms('format', array('hide_empty' => false));
                foreach ($formats as $format) {
                    // Escapa os valores e seleciona dinamicamente se necessário
                    $selected = ($format->term_taxonomy_id == $format_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($format->term_taxonomy_id) . '" ' . esc_attr($selected) . '>' . esc_html($format->name) . '</option>';
                }
                ?>
            </select>

            <!-- Filtro de Data -->
            <select class="custom-select" id="date" name="date">
                <option value="desc" <?php echo ($order === "desc") ? 'selected' : ''; ?>>Plus récent au plus ancien</option>
                <option value="asc" <?php echo ($order === "asc") ? 'selected' : ''; ?>>Plus ancien au plus récent</option>
            </select>
        </div>
    </form>
</div>
