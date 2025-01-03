<<<<<<< HEAD
function filtres() {
    // Evento de clique nas opções do dropdown
    $(".dropdown-option").on("click", function () {
        // Identifica o tipo de filtro (categoria, formato, ordenação)
        const filterType = $(this).closest('.custom-dropdown').find('.dropdown-selected').text().toLowerCase();

        // Atualiza o valor do campo hidden correspondente
        if (filterType === "catégorie") {
            const categorieValue = $(this).data("value");
            $("#categorie_id").val(categorieValue); // Atualiza o valor do input hidden de categoria
        } else if (filterType === "format") {
            const formatValue = $(this).data("value");
            $("#format_id").val(formatValue); // Atualiza o valor do input hidden de formato
        } else if (filterType === "trier par") {
            const orderValue = $(this).data("value");
            $("#date").val(orderValue); // Atualiza o valor do input hidden de ordenação
        }

        // Ação de filtro após a seleção
        const categorie = $("#categorie_id").val();
        const format = $("#format_id").val();
        const order = $("#date").val();
        const nonce = ajax_object.nonce; // Pega o nonce
        const ajaxurl = ajax_object.ajaxurl; // Pega a URL do AJAX

        const gallery = $("#photo-gallery");

        if (!gallery.length) {
            console.error("Erro: elemento da galeria não encontrado.");
            return;
        }

        // Requisição AJAX
        $.ajax({
            url: ajaxurl,
            method: "POST",
            data: {
                action: "filter_photos",
                nonce: nonce,
                categorie: categorie,
                format: format,
                order: order,
            },
            success: function (response) {
                console.log("Resposta do servidor:", response);
                if (response.success) {
                    gallery.html(response.data); // Atualiza a galeria com as fotos filtradas
                    Lightbox.init(); // Inicializa o Lightbox (se necessário)
                } else {
                    console.error("Erro: resposta do servidor está vazia.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Erro ao filtrar imagens:", error);
            },
        });
    });
}

$(document).ready(function () {
    filtres();  // Inicializa a função de filtros
});
=======
// Função para aplicar filtros usando AJAX
function filtres() {
  $(".form-select").on("change", function () {
      const categorie = $("#categorie_id").val();
      const format = $("#format_id").val();
      const order = $("#date").val();
      const nonce = $("#nonce").val();
      const ajaxurl = $("#ajaxurl").val();

      // Certifique-se de que a galeria está definida corretamente
      const gallery = $("#photo-gallery");

      if (!gallery.length) {
          console.error("Erro: elemento da galeria não encontrado.");
          return;
      }

      $.ajax({
          url: ajaxurl,
          method: "POST",
          data: {
              action: "filter_photos",
              nonce: nonce,
              categorie: categorie,
              format: format,
              order: order,
          },
          success: function (response) {
              // Valida o conteúdo da resposta antes de substituir
              if (response.success) {
                  gallery.html(response.data); // Substitui o conteúdo da galeria com os resultados
                    Lightbox.init();
              } else {
                  console.error("Erro: resposta do servidor está vazia.");
              }
          },
          error: function (xhr, status, error) {
              console.error("Erro ao filtrar imagens:", error);
          },
      });
  });
}

// Inicializa a função de filtros
$(document).ready(function () {
  filtres();
});

>>>>>>> 77b9d1e36f701a5d43afe5b872592c91e74ec2f6
