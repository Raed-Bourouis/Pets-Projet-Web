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




// hetha code l chat (last resort)

document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slidercontent');
    const nextBtn = document.getElementById('next');
    const prevBtn = document.getElementById('prev');

    let currentSlide = 0;

    function goToSlide(n) {
        slides[currentSlide].classList.add('hidden');
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.remove('hidden');
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





// <!-- 

//             <div class="slidercontent " id="slide-3">

//                 <div id="slide-photo">
//                     <img
//                         src="https://www.amarillo.com/gcdn/authoring/authoring-images/2023/08/28/NAGN/70702629007-shelter-4-of-28.jpg">
//                 </div>


//                 <div class="slidercontent hidden" id="slide-4">

//                     <div id="slide-photo">
//                         <img
//                             src="https://www.amarillo.com/gcdn/authoring/authoring-images/2023/08/28/NAGN/70702629007-shelter-4-of-28.jpg">
//                     </div>


//                     <div id="slide-text">
//                         <p class="title">Here's how you can get involved</p>
//                         <p class="subtitle">2. Review and Appointment Setup:</p>
//                         <p class="regtext"> After reviewing your application, we'll schedule an
//                             appointment to
//                             meet with you and discuss potential volunteer opportunities. This meeting allows us to learn
//                             more
//                             about your interests, skills, and availability, ensuring we find the best fit for you within
//                             our
//                             organization.</p>
//                     </div>

//                 </div>

//                 <div class="slidercontent" id="slide-4">

//                     <div id="slide-photo">
//                         <img
//                             src="https://www.amarillo.com/gcdn/authoring/authoring-images/2023/08/28/NAGN/70702629007-shelter-4-of-28.jpg">
//                     </div>
//                     <div id="slide-text">
//                         <p class="title">Here's how you can get involved</p>
//                         <p class="subtitle">3. Join Our Team:</p>
//                         <p class="regtext">Once you're accepted into our volunteer program, you'll become an
//                             integral part of
//                             the Pets Haven team. Whether you're helping care for animals, assisting with adoption
//                             events, or
//                             providing administrative support, your contributions make a meaningful difference in the
//                             lives of
//                             our furry friends.</p>
//                     </div>

//                 </div>


//                 <div class="slidercontent" id="slide-5">

//                     <div id="slide-photo">
//                         <img
//                             src="https://www.amarillo.com/gcdn/authoring/authoring-images/2023/08/28/NAGN/70702629007-shelter-4-of-28.jpg">
//                     </div>


//                     <div id="slide-text">
//                         <p class="title">Here's how you can get involved</p>
//                         <p class="subtitle">4.Training and Support:</p>
//                         <p class="regtext"> As a volunteer, you'll receive training and ongoing support to
//                             help you
//                             succeed in your role. Whether you're a seasoned animal lover or new to volunteering, we'll
//                             provide
//                             the guidance and resources you need to make a positive impact.</p>
//                     </div>

//                 </div>


//                 <div class="slidercontent" id="slide-6">

//                     <div id="slide-photo">
//                         <img
//                             src="https://www.amarillo.com/gcdn/authoring/authoring-images/2023/08/28/NAGN/70702629007-shelter-4-of-28.jpg">
//                     </div>


//                     <div id="slide-text">
//                         <p class="title">Here's how you can get involved</p>
//                         <p class="subtitle">5. Make a Difference:</p>
//                         <p class="regtext"> By volunteering with Pets Haven, you're not just donating your
//                             time; you're
//                             changing lives. Your efforts help us provide essential care, love, and support to animals in
//                             need,
//                             giving them a second chance at a happy and healthy life.</p>
//                     </div>

//                 </div>

//             -->
