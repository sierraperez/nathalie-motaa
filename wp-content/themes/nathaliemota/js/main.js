$(document).ready(function () {
  // Esconder o popup inicialmente
  $(".popup-overlay").hide();

  // Abrir o popup ao clicar no botão de contato
  $(".btn-contact, #contactBtn").on("click", function () {
    // Verifique se o elemento .reference_value existe e tem valor
    const reference_value = $(".reference_value").length ? $(".reference_value").text() : "";

    // Se houver valor de referência, preencha o campo no formulário
    if (reference_value) {
      $("#ref_photo").val(reference_value);  // Preenche o campo ref_photo com a referência
      console.log("Referência preenchida no formulário:", reference_value);
    } else {
      console.warn("Nenhum valor de referência encontrado. Campo ref_photo não preenchido.");
    }

    // Exibe o popup
    $(".popup-overlay").show();
  });

  // Fechar o popup ao clicar no botão de fechar
  $(".popup-close").on("click", function () {
    $(".popup-overlay").hide();
  });

  // Fechar o popup ao clicar fora dele
  $(".popup-overlay").on("click", function (event) {
    if (event.target === this) {
      $(this).hide();
    }
  });
});





  // Função para adicionar eventos de clique às imagens
  function attachImageEvents() {
    const overlay = $("#photo-overlay");
    const overlayImage = $(".overlay-image");
    const overlayCaption = $(".overlay-caption");

    $(".galerie-photo img").on("click", function () {
      const imgSrc = $(this).attr("src");
      const caption = $(this).attr("alt") || "Sem descrição disponível";

      overlayImage.attr("src", imgSrc);
      overlayCaption.text(caption);
      overlay.css("display", "flex");
    });

    $(".close-overlay").on("click", function () {
      overlay.hide();
    });

    overlay.on("click", function (event) {
      if (event.target === this) {
        overlay.hide();
      }
    });
  }

  // Chama a função inicialmente
  attachImageEvents();