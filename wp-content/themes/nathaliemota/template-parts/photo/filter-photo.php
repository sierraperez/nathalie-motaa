<div class="filters-container">
    <div class="filter-left">
        <!-- Filtro Categoria -->
        <div class="filter-wrapper">
            <select class="photo-filter" id="categorie_id" name="categorie_id">
                <option value="">Catégorie</option>
                <?php
                // Obtém os termos da taxonomia 'categorie'
                $categories = get_terms('categorie', array('hide_empty' => false));
                foreach ($categories as $category) {
                    $selected = ($category->term_taxonomy_id == $categorie_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($category->term_taxonomy_id) . '" ' . esc_attr($selected) . '>' . esc_html($category->name) . '</option>';
                }
                ?>
            </select>
        </div>

        <!-- Filtro Formato -->
        <div class="filter-wrapper">
            <select class="photo-filter" id="format_id" name="format_id">
                <option value="">Format</option>
                <?php
                // Obtém os termos da taxonomia 'format'
                $formats = get_terms('format', array('hide_empty' => false));
                foreach ($formats as $format) {
                    $selected = ($format->term_taxonomy_id == $format_id) ? 'selected' : '';
                    echo '<option value="' . esc_attr($format->term_taxonomy_id) . '" ' . esc_attr($selected) . '>' . esc_html($format->name) . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="filter-right">
        <!-- Filtro Trier Par -->
        <div class="filter-wrapper">
            <select class="photo-filter" id="date" name="date">
                <option value="desc" <?php echo ($order === "desc") ? 'selected' : ''; ?>>Plus récent au plus ancien</option>
                <option value="asc" <?php echo ($order === "asc") ? 'selected' : ''; ?>>Plus ancien au plus récent</option>
            </select>
        </div>
    </div>
</div>
