class Carousel extends HTMLElement {
    constructor() {
        super();
        let template = document.querySelector("#carousel-template");
        let templateContent = template.content;

        const shadowRoot = this.attachShadow({ mode: "open" });
        shadowRoot.appendChild(templateContent.cloneNode(true));
    }



    // Element functionality written in here
}

customElements.define("image-carousel", Carousel);