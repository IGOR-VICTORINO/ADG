let currentSlide = 0;

function moveSlide(direction) {
    const track = document.querySelector('.carousel-track');
    const cardWidth = document.querySelector('.card').offsetWidth + 20; // Largura do card + margem
    const containerWidth = document.querySelector('.carousel-container').offsetWidth;
    const totalSlides = track.children.length;
    const maxSlide = totalSlides - Math.floor(containerWidth / cardWidth);

    currentSlide += direction;
    if (currentSlide < 0) {
        currentSlide = 0;
    } else if (currentSlide > maxSlide) {
        currentSlide = maxSlide;
    }

    track.style.transform = `translateX(-${currentSlide * cardWidth}px)`;
}
let contador = 0;

function iniciarContagem() {
    if (contador <= 75) {
        document.querySelector('.contador').textContent = contador + "%";
        contador++;
        setTimeout(iniciarContagem, 40); // Atualiza a cada 100 milissegundos
    }
}

// Iniciar contagem automaticamente ao carregar a página
window.onload = iniciarContagem;

const observar = new IntersectionObserver(entries => {
    console.log(entries)

    if(entries[0].intersectionRatio >= 1){
    entries[0].target.classList.add("myContainer-off")
    }else{
        IntersectionObserver 
    }
},{
    threshold:[0, .5, 1]
})

Array.from(document.querySelectorAll('.myContainer')).forEach(element =>{
        observar.observe(element)
})