
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
    imElem.style='width: 450px; height: 320px ; border-radius: 35px'


}

function Modifier(button){
    var x=document.createElement("div")
    x.style="border-radius:50%; background-color:red;color:white;width:20px;text-align:center;float:right"
    x.innerText="X"

    var fenetre=document.createElement("div")
    var contenu=document.createElement("div")

    fenetre.appendChild(contenu)

    var h1=document.createElement("h1")
    h1.innerHTML="Description"
    h1.style="font-family: 'Averia Libre'; color: #88B04B"

    var input=document.createElement("input")
    input.type='text'
    input.style="font-size: larger; width:500px;height:80px"

    contenu.appendChild(x)
    contenu.appendChild(h1)
    contenu.appendChild(input)
    contenu.style="width: 100%; height: 100%; padding: 20px";

    fenetre.style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */ width: 700px; height: 400px; border-radius: 10px;"
    document.body.appendChild(fenetre);
    



    var container=document.querySelector('.container')
    container.style='filter: blur(50px)'
}


