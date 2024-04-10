// document.addEventListener('DOMContentLoaded', function() {

// var sliderElements = document.getElementsByClassName("slidercontent");
// let nextDom = document.getElementById('next');
// let prevDom = document.getElementById('prev');






// function sliderNext() {
//     let idx
//     let idxNext
//     for(let i=0; i<sliderElements.length;i++){
//         if(sliderElements[i].classList.contains('active')) {idx = i ; break}
//     }

    
//     if(idx==(sliderElements.length-1)){idxNext=0}
//     else {idxNext=idx+1}
    
//     sliderElements[idx].classList.add('hidden')
//     sliderElements[idx].classList.remove('active')
//     sliderElements[idxNext].classList.add('active')
//     sliderElements[idxNext].classList.remove('hidden')


// }


// function sliderPrev() {
//     let idx
//     let idxNext

//     for(let i=0; i<sliderElements.length;i++){
//         if(sliderElements[i].classList.contains('active')) {idx = i ; break}
//     }

//     if(idx==0){idxNext=(sliderElements.length-1)}
//     else {idxPrev=idx-1}
    
//     sliderElements[idx].classList.add('hidden')
//     sliderElements[idx].classList.remove('active')
//     sliderElements[idxPrev].classList.add('active')
//     sliderElements[idxPrev].classList.remove('hidden')


// }

// nextDom.addEventListener("click", sliderNext)
// prevDom.addEventListener("click", sliderPrev)



// })







// document.addEventListener('DOMContentLoaded', function() {
//     const slides = document.querySelectorAll('.slidercontent');
//     const nextBtn = document.getElementById('next');
//     const prevBtn = document.getElementById('prev');

//     let currentSlide = 0;

//     function goToSlide(n) {
//         if (n !== currentSlide && n >= 0 && n < slides.length) {
//             const direction = n > currentSlide ? 'right' : 'left';
//             slides[currentSlide].classList.add(`slide-out-${direction}`);
//             slides[n].classList.remove('hidden');
//             slides[n].classList.add(`slide-in-${direction}`);
//             setTimeout(() => {
//                 slides[currentSlide].classList.add('hidden');
//                 slides[currentSlide].classList.remove(`slide-out-${direction}`);
//                 slides[n].classList.remove(`slide-in-${direction}`);
//                 currentSlide = n;
//             }, 1000);
//         }
//     }

//     function nextSlide() {
//         goToSlide((currentSlide + 1) % slides.length);
//     }

//     function prevSlide() {
//         goToSlide((currentSlide - 1 + slides.length) % slides.length);
//     }

//     nextBtn.addEventListener('click', nextSlide);
//     prevBtn.addEventListener('click', prevSlide);

//     // Initialize the first slide
//     slides[currentSlide].classList.remove('hidden');
// });




document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slidercontent');
    const nextBtn = document.getElementById('next');
    const prevBtn = document.getElementById('prev');

    let currentSlide = 0;

    function goToSlide(n) {
        const direction = n < currentSlide ? 'left':'right';
        let aux = currentSlide;
        slides[aux].classList.add('hidden');
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.remove('hidden');
        slides[currentSlide].classList.add(`slide-in-${direction}`);
        setTimeout(()=>{slides[currentSlide].classList.remove(`slide-in-${direction}`);},2500)
        

        
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
