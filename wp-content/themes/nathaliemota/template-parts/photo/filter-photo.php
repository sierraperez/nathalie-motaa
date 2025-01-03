<div class="filters-container">
    <div class="filter-left ">
        <!-- Filtro Categoria -->
        <div class="filter-wrapper">
            <div class="custom-dropdown">
                <div class="dropdown-selected">Catégorie</div>
                <div class="dropdown-options">
                    <div class="dropdown-option" data-value="">Catégorie</div>
                    <?php
                    // Obtém os termos da taxonomia 'categorie'
                    $categories = get_terms('categorie', array('hide_empty' => false));
                    foreach ($categories as $category) {
                        echo '<div class="dropdown-option" data-value="' . esc_attr($category->term_taxonomy_id) . '">' . esc_html($category->name) . '</div>';
                    }
                    ?>
                </div>
                <input type="hidden" id="categorie_id" name="categorie_id" value="">
            </div>
        </div>
    </div>
    <div class="filter-midle">
        <!-- Filtro Formato -->
        <div class="filter-wrapper">
            <div class="custom-dropdown">
                <div class="dropdown-selected">Format</div>
                <div class="dropdown-options">
                    <div class="dropdown-option" data-value="">Format</div>
                    <?php
                    // Obtém os termos da taxonomia 'format'
                    $formats = get_terms('format', array('hide_empty' => false));
                    foreach ($formats as $format) {
                        echo '<div class="dropdown-option" data-value="' . esc_attr($format->term_taxonomy_id) . '">' . esc_html($format->name) . '</div>';
                    }
                    ?>
                </div>
                <input type="hidden" id="format_id" name="format_id" value="">
            </div>
        </div>
    </div>

    <div class="filter-right ">
        <!-- Filtro Trier Par -->
        <div class="filter-wrapper">
            <div class="custom-dropdown">
                <div class="dropdown-selected">Trier par</div>
                <div class="dropdown-options">
                    <div class="dropdown-option" data-value="desc">Plus récent au plus ancien</div>
                    <div class="dropdown-option" data-value="asc">Plus ancien au plus récent</div>
                </div>
                <input type="hidden" id="date" name="date" value="desc">
            </div>
        </div>
    </div>
</div>
