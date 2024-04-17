window.addEventListener("load", () => {
    const slides = document.querySelectorAll('.slidercontent');
    const nextBtn = document.getElementById('next');
    const prevBtn = document.getElementById('prev');

    let currentSlide = 0;

    function goToSlide(n) {
        const direction = n < currentSlide ? 'left' : 'right';
        slides[currentSlide].classList.add('hidden');
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.remove('hidden');
        slides[currentSlide].classList.add(`slide-in-${direction}`);
        setTimeout(() => { slides[currentSlide].classList.remove(`slide-in-${direction}`); }, 1500)
    }

    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    function prevSlide() {
        goToSlide(currentSlide - 1);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Automatic slideshow
    // setInterval(nextSlide, 5000);
});
