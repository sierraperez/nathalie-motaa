jQuery(document).ready(function ($) {
    $('#load-more').on('click', function () {
        var button = $(this);
        var nextPage = parseInt(button.attr('data-page')) + 1; // Próxima página

        $.ajax({
            url: ajax_params.ajax_url, // URL para requisições AJAX
            type: 'POST',
            data: {
                action: 'load_more_photos', // Nome da ação registrada no PHP
                page: nextPage,            // Página solicitada
            },
            success: function (response) {
                if (response.success) {
                    if (response.data.html) {
                        $('#photo-gallery').append(response.data.html); // Adiciona as imagens carregadas
                        button.attr('data-page', nextPage);  // Atualiza o número da página

                        if (response.data.no_more_posts) {
                            button.hide(); // Oculta o botão se não houver mais posts
                        } else {
                            button.text('Carregar mais');
                        }
                    }
                };
                Lightbox.init();
                
            },
            error: function (xhr, status, error) {
                console.error("Erro ao carregar mais fotos:", error);
            }
        });
    });
});



// Ativa o botao para Carregar mais fotos da mesma categoria no single photo 


jQuery(document).ready(function ($) {
    $('#load-more').on('click', function () {
        var button = $(this);
        var category = button.data('category'); // Categoria atual
        var nextPage = parseInt(button.attr('data-page')) + 1; // Próxima página
        var exclude = button.data('exclude'); // IDs a excluir

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_photos_by_category', // Nome da ação
                category: category,                    // ID da categoria
                page: nextPage,                        // Página solicitada
                exclude: exclude                       // Posts já carregados
            },
            success: function (response) {
                if (response) {
                    $('#related-photos').append(response.html); // Adiciona as imagens carregadas
                    button.attr('data-page', nextPage);         // Atualiza o número da página
                    button.data('exclude', response.new_exclude); // Atualiza a lista de excluídos

                    // Oculta o botão se não houver mais posts
                    if (response.no_more_posts) {
                        button.hide();
                    } else {
                        button.text('Ver mais');
                    }
                } else {
                    button.hide(); // Esconde o botão se não houver mais posts
                }
            }
        });
    });
<<<<<<< HEAD
    
=======
>>>>>>> 77b9d1e36f701a5d43afe5b872592c91e74ec2f6
});