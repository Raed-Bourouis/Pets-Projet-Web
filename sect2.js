
function ToDelete(button){
    var parentDiv=button.parentNode
    for(let i=0;i<3;i++){
        parentDiv=parentDiv.parentNode
    }
    parentDiv.parentNode.removeChild(parentDiv);
}

function changerImage(link,elem){
    elem.style='background-color: black'
    var parentCircles=elem.parentNode
    var intervalle=parentCircles.querySelectorAll('div')
    intervalle.forEach(element => {
        if(element !=elem){
            element.style='background-color: #CCC;'
        }
        
    });
    var parentIm=elem.parentNode.parentNode
    var imElem=parentIm.querySelector('img')
    imElem.src=link
    imElem.style='width: 450px; height: 320px ; border-radius: 23px'


}



