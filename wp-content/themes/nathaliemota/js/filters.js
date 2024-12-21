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
                  attachImageEvents(); // Reaplica os eventos às imagens filtradas
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

