$(document).ready(function () {
  // Esconder o popup inicialmente
  $(".popup-overlay").hide();

  // Abrir o popup ao clicar no botão de contato
  $(".btn-contact, #contactBtn").on("click", function () {
    // Verifique se o elemento .reference_value existe e tem valor
    const reference_value = $(".reference_value").length
      ? $(".reference_value").text()
      : "";

    // Se houver valor de referência, preencha o campo no formulário
    if (reference_value) {
      $("#ref_photo").val(reference_value); // Preenche o campo ref_photo com a referência
      console.log("Referência preenchida no formulário:", reference_value);
    } else {
      console.warn(
        "Nenhum valor de referência encontrado. Campo ref_photo não preenchido."
      );
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

// Selecionar elementos
const lightbox = document.getElementById("photo-lightbox");
const closeLightbox = document.querySelector(".close-lightbox");
const lightboxImage = document.querySelector(".lightbox-image");
const lightboxCaption = document.querySelector(".lightbox-caption");
const leftArrow = document.querySelector(".left-arrow");
const rightArrow = document.querySelector(".right-arrow");
const galleryImages = document.querySelectorAll(".gallery-image");

let currentIndex = 0; // Índice da imagem atual

// Abrir o lightbox
galleryImages.forEach((image, index) => {
  image.addEventListener("click", () => {
    lightbox.style.display = "flex";
    updateLightbox(index);
  });
});

// Fechar o lightbox
closeLightbox.addEventListener("click", () => {
  lightbox.style.display = "none";
});

// Atualizar conteúdo do lightbox
function updateLightbox(index) {
  currentIndex = index;
  lightboxImage.src = galleryImages[currentIndex].src;
  lightboxCaption.textContent =
    galleryImages[currentIndex].alt || "Imagem em destaque";
}

// Navegar para a imagem anterior
leftArrow.addEventListener("click", () => {
  currentIndex =
    (currentIndex - 1 + galleryImages.length) % galleryImages.length;
  updateLightbox(currentIndex);
});

// Navegar para a próxima imagem
rightArrow.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % galleryImages.length;
  updateLightbox(currentIndex);
});

// Fechar o lightbox ao clicar fora da imagem
lightbox.addEventListener("click", (e) => {
  if (e.target === lightbox) {
    lightbox.style.display = "none";
  }
});



