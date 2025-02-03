class Lightbox {
  static init() {
    const links = Array.from(document.querySelectorAll(".single__overlay-fullscreen"));
    const gallery = links.map((link) => 
      link.closest(".photo-item").querySelector("a.lightbox-trigger").getAttribute("href")
    );

    links.forEach((link) =>
      link.addEventListener("click", (e) => {
        e.preventDefault();
        const photoItem = link.closest(".photo-item");
        const imageLink = photoItem.querySelector("a.lightbox-trigger").getAttribute("href");
        const category = photoItem.querySelector(".single__overlay-categorie")?.textContent.trim() || "Sem categoria";
        const title = photoItem.querySelector(".single__overlay-title")?.textContent.trim() || "Sem título";

        new Lightbox(imageLink, gallery, category, title);
      })
    );
  }

  constructor(url, images, category, title) {
    this.element = this.buildDOM();
    this.images = images;
    this.category = category;
    this.title = title;
    this.loadImage(url);
    this.onKeyUp = this.onKeyUp.bind(this);
    document.body.appendChild(this.element);
    disableBodyScroll(this.element);
    document.addEventListener("keyup", this.onKeyUp);
  }

  loadImage(url) {
    this.url = url;
    const image = new Image();
    const container = this.element.querySelector(".lightbox__container");
    const loader = document.createElement("div");
    loader.classList.add("lightbox__loader");
    container.innerHTML = "";
    container.appendChild(loader);

    image.onload = () => {
      container.removeChild(loader);
      container.appendChild(image);

      // Atualiza as informações da categoria e título
      this.updateInfo();

      this.url = url;
    };
    image.src = url;
  }

  updateInfo() {
    this.element.querySelector(".lightbox__info-cat").textContent = `Categoria: ${this.category}`;
    this.element.querySelector(".lightbox__info-title").textContent = `Título: ${this.title}`;
  }

  onKeyUp(e) {
    if (e.key === "Escape") {
      this.close(e);
    } else if (e.key === "ArrowLeft") {
      this.prev(e);
    } else if (e.key === "ArrowRight") {
      this.next(e);
    }
  }

  close(e) {
    e.preventDefault();
    this.element.classList.add("fadeOut");
    enableBodyScroll(this.element);
    window.setTimeout(() => {
      this.element.parentElement.removeChild(this.element);
    }, 500);
    document.removeEventListener("keyup", this.onKeyUp);
  }

  next(e) {
    e.preventDefault();
    let i = this.images.findIndex((image) => image === this.url);
    if (i === this.images.length - 1) {
      i = -1;
    }
    this.loadNewImage(this.images[i + 1]);
  }

  prev(e) {
    e.preventDefault();
    let i = this.images.findIndex((image) => image === this.url);
    if (i === 0) {
      i = this.images.length;
    }
    this.loadNewImage(this.images[i - 1]);
  }

  loadNewImage(url) {
    const photoItem = document.querySelector(`a.lightbox-trigger[href="${url}"]`)?.closest(".photo-item");
    if (photoItem) {
      this.category = photoItem.querySelector(".single__overlay-categorie")?.textContent.trim() || "Sem categoria";
      this.title = photoItem.querySelector(".single__overlay-title")?.textContent.trim() || "Sem título";
    }

    this.loadImage(url);
  }

  buildDOM() {
    const dom = document.createElement("div");
    dom.classList.add("lightbox");
    dom.innerHTML = `
      <button class="lightbox__close"></button>
      <button class="lightbox__next">Suivant</button>
      <button class="lightbox__prev">Précédent</button>
      <div class="lightbox__container"></div>
      <div class="lightbox__info">
        <span class="lightbox__info-cat"></span>
        <span class="lightbox__info-title"></span>
      </div>
      <div class="lightbox__overlay"></div>
    `;

    dom.querySelector(".lightbox__close").addEventListener("click", this.close.bind(this));
    dom.querySelector(".lightbox__next").addEventListener("click", this.next.bind(this));
    dom.querySelector(".lightbox__prev").addEventListener("click", this.prev.bind(this));

    return dom;
  }
}

// Inicializa a Lightbox após carregamentos AJAX
console.log("lightbox");
$(document).on("ajaxComplete", function () {
  Lightbox.init();
});
Lightbox.init();
