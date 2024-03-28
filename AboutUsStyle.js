window.addEventListener("scroll", reveal);

function reveal() {
    var sect = document.querySelectorAll(".section");

    for (let i=0;i<sect.length ;i++) {
        let windowHeight = window.innerHeight;
        let top = sect[i].getBoundingClientRect().top; 
        var revealpoint=150;
        if(top < windowHeight - revealpoint) {
            sect[i].classList.add("active");
        }
        else{
            sect[i].classList.remove("active"); // hedhiya bech y3awed yscrolli t3awed mil louwel w jdid kil loop

        }
}
}

window.onload = function() {
    reveal();
};


