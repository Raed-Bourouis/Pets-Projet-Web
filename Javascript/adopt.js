function Close() {
    var form = document.getElementById('myForm');
    form.style.display = 'none';
}
function redirection(link) {
    window.location.href = link;
}


function changerImage(link, elem) {
    elem.style.backgroundColor = 'black';
    var parentCircles = elem.parentNode;
    var intervalle = parentCircles.querySelectorAll('div');
    intervalle.forEach(element => {
        if (element !== elem) {
            element.style.backgroundColor = '#CCC';
        }
    });
    var parentIm = elem.parentNode.parentNode;
    var imElem = parentIm.querySelector('img');
    imElem.src = link;
    imElem.style.width = '450px';
    imElem.style.height = '320px';
    imElem.style.borderRadius = '35px';
}





