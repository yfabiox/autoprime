document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelector("#carousel-slides");
    const indicators = document.querySelectorAll("#carousel-indicators button");
    const prevBtn = document.querySelector("#prev-btn");
    const nextBtn = document.querySelector("#next-btn");

    let currentIndex = 0;

    const updateCarousel = () => {
        const width = slides.children[0].offsetWidth;
        slides.style.transform = `translateX(-${currentIndex * width}px)`;

        // Atualizar indicadores
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle("bg-gray-800", index === currentIndex);
            indicator.classList.toggle("bg-gray-400", index !== currentIndex);
        });
    };

    // Botão anterior
    prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex === 0) ? slides.children.length - 1 : currentIndex - 1;
        updateCarousel();
    });

    // Botão seguinte
    nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % slides.children.length;
        updateCarousel();
    });

    // Indicadores
    indicators.forEach((indicator, index) => {
        indicator.addEventListener("click", () => {
            currentIndex = index;
            updateCarousel();
        });
    });

    // Iniciar na posição inicial
    updateCarousel();

    
});




