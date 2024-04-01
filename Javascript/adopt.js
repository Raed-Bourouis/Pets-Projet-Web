function redirection(link) {
    window.location.href = link;
}

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
    var x=document.createElement("button")
    x.style="border-radius:50%; background-color:red;color:white;float:right;margin-right:40px"
    x.innerText="X"
    x.addEventListener("mouseenter",()=>{
        x.style='cursor:pointer ;border-radius:50%; background-color:red;color:white;float:right;margin-right:40px'
    })
    
    var fenetre=document.createElement("div")
    var contenu=document.createElement("div")

    fenetre.appendChild(contenu)
    
    // name
    var h11=document.createElement("h1")
    h11.innerHTML="Name"
    h11.style="font-family: 'Averia Libre'; color: #88B04B"

    var input1=document.createElement("input")
    input1.type='text'
    input1.placeholder="Write here..."
    input1.required
    input1.style="font-size: larger; width:500px;height:30px"

    //age
    var h12=document.createElement("h1")
    h12.innerHTML="Age"
    h12.style="font-family: 'Averia Libre'; color: #88B04B"

    var input12=document.createElement("input")
    input12.type='text'
    input12.placeholder="Write here..."
    input12.style="font-size: larger; width:500px;height:30px"

    // description
    var h1=document.createElement("h1")
    h1.innerHTML="Description"
    h1.style="font-family: 'Averia Libre'; color: #88B04B"

    var input=document.createElement("input")
    input.type='text'
    input.placeholder="Write here..."
    input.style="font-size: larger; width:500px;height:80px"
    var ch=input.value

    var submit=document.createElement('button')
    submit.innerText='Submit'
    submit.style='margin-left:40%; margin-top:20px; border-radius:20px;background-color: green;color:white; font-size:larger'
    submit.addEventListener("mouseenter",()=>{
        submit.style='cursor:pointer ;margin-left:40%; margin-top:20px; border-radius:20px;background-color: green;color:white; font-size:larger'
    })
    // submit.onclick=Enregistrer()

    var br=document.createElement('br')
     
    //ajouter les elements au contenu
    contenu.appendChild(x)
    contenu.appendChild(h11)
    contenu.appendChild(input1)
    contenu.appendChild(h12)
    contenu.appendChild(input12)
    contenu.appendChild(h1)
    contenu.appendChild(input)
    contenu.appendChild(br)
    contenu.appendChild(submit)
    contenu.style="width: 100%; height: 100%; padding: 20px";

    fenetre.style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */ width: 700px; height: 550px; border-radius: 10px;"
    document.body.appendChild(fenetre);

    var container=document.querySelector('.container')
    container.style='filter: blur(20px)'

    x.onclick=()=>{Close(fenetre,container)}

    var parentDiv=button.parentNode.parentNode
    
    submit.onclick=()=>{
        Enregistrer(parentDiv,input.value,input1.value,input12.value,fenetre,container)
    
    }
}

function Close(fenetre,container){
    container.style='none';
    document.body.removeChild(fenetre);

}

function Enregistrer(parent,txt,txt1,txt12,fenetre,container){
    var p=parent.querySelector('p')
    var h1=parent.querySelector('h1')
    var h4=parent.querySelector('h4')
    if(txt !=''){p.innerHTML=txt;}
    if(txt1 !=''){h1.innerHTML=txt1;}
    if(txt12 !=''){h4.innerHTML=txt12;}
    Close(fenetre,container)

}
