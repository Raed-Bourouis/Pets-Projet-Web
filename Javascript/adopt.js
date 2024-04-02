
function redirection(link) {
    window.location.href = link;
}

function ToDelete(button) {
    var parentDiv = button.parentNode;
    for (let i = 0; i < 3; i++) {
        parentDiv = parentDiv.parentNode;
    }
    parentDiv.parentNode.removeChild(parentDiv);
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

function Modifier(button) {
    var x = document.createElement("button");
    x.style.borderRadius = '50%';
    x.style.backgroundColor = 'red';
    x.style.color = 'white';
    x.style.float = 'right';
    x.style.marginRight = '40px';
    x.innerHTML = '<i class="fa-solid fa-xmark"></i> ';
    x.style.border="none";

    x.addEventListener("mouseenter", () => {
        x.style.cursor = 'pointer';
    });

    var fenetre = document.createElement("div");
    var contenu = document.createElement("div");

    fenetre.appendChild(contenu);

    // Name
    var h11 = document.createElement("h1");
    h11.innerHTML = "Name";
    h11.style.fontFamily = '"Playfair Display", sans-serif';
    h11.style.color = '#333';
    h11.style.marginBottom = '10px';
    h11.style.fontSize=" 18px";

    var input1 = document.createElement("input");
    input1.type = 'text';
    input1.placeholder = "Enter name";
    input1.required;
    input1.style.fontSize = '16px';
    input1.style.width = 'calc(100% - 50px)';
    input1.style.padding = '10px';
    input1.style.border = '1px solid #ddd';
    input1.style.borderRadius = '4px';
    input1.style.backgroundColor = 'rgba(249, 249, 249, 0.8);';
    input1.style.marginBottom = '15px';

    // Age
    var h12 = document.createElement("h1");
    h12.innerHTML = "Age";
    h12.style.fontFamily = '"Playfair Display", sans-serif';
    h12.style.color = '#333';
    h12.style.marginBottom = '10px';
    h12.style.fontSize=" 18px";

    var input12 = document.createElement("input");
    input12.type = 'text';
    input12.placeholder = "Enter age";
    input12.style.fontSize = '16px';
    input12.style.width = 'calc(100% - 50px)';
    input12.style.padding = '10px';
    input12.style.border = '1px solid #ddd';
    input12.style.borderRadius = '4px';
    input12.style.backgroundColor = 'rgba(249, 249, 249, 0.8);';
    input12.style.marginBottom = '15px';

    // Description
    var h1 = document.createElement("h1");
    h1.innerHTML = "Description";
    h1.style.fontFamily = '"Playfair Display", sans-serif';
    h1.style.color = '#333';
    h1.style.marginBottom = '10px';
    h1.style.fontSize= '18px' ;

    var input = document.createElement("textarea");
    input.placeholder = "Enter description";
    input.style.width='calc(100% - 50px)'
    input.style.fontSize = '16px';
    input.style.padding = '10px';
    input.style.border = '1px solid #ddd';
    input.style.borderRadius = '4px';
    input.style.backgroundColor = 'rgba(249, 249, 249, 0.8);';
    input.style.marginBottom = '20px';

    var submit = document.createElement('button');
    submit.innerText = 'Submit';
    submit.style.borderRadius = '25px';
    submit.style.fontFamily="'Playfair Display',sans-serif"
    submit.style.backgroundColor = '#4CAF50';
    submit.style.color = 'white';
    submit.style.fontSize = '18px';
    submit.style.border = 'none';
    submit.style.width = '100px';    
    submit.style.display = 'block';
    submit.style.marginLeft = 'auto';
    submit.style.marginRight = 'auto';
    submit.style.marginTop = '15px';
    submit.style.padding = '15px 0';
    submit.style.cursor = 'pointer';

    var br = document.createElement('br');

    contenu.appendChild(x);
    contenu.appendChild(h11);
    contenu.appendChild(input1);
    contenu.appendChild(h12);
    contenu.appendChild(input12);
    contenu.appendChild(h1);
    contenu.appendChild(input);
    contenu.appendChild(br);
    contenu.appendChild(submit);
    contenu.style.width = '100%';
    contenu.style.height = '100%';
    contenu.style.padding = '20px';

    // Style the window
    fenetre.style.position = 'fixed';
    fenetre.style.top = '50%';
    fenetre.style.left = '50%';
    fenetre.style.transform = 'translate(-50%, -50%)';
    fenetre.style.backgroundColor = ''; 
    fenetre.style.width = '600px';
    fenetre.style.maxWidth = '80%';
    fenetre.style.height = 'auto';
    fenetre.style.borderRadius = '10px';
    fenetre.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.4)'; 

    var overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';

    document.body.appendChild(overlay);

    document.body.appendChild(fenetre);

    var container = document.querySelector('.container');
    container.style.filter = 'blur(20px)';
    var sect1=document.querySelector('#section1') ;
    sect1.style.filter='blur(20px)';

    x.onclick = () => { Close(fenetre, container, sect1,overlay); };
    document.body.style.overflow = 'hidden';//bech ili wra il fenetre mayscrollich
    var parentDiv = button.parentNode.parentNode;

    submit.onclick = () => {
        Enregistrer(parentDiv, input.value, input1.value, input12.value, fenetre, container,sect1 ,overlay);
    };
}

function Close(fenetre, container,sect1, overlay) {
    container.style.filter = 'none';
    sect1.style.filter= 'none';
    document.body.removeChild(fenetre);
    document.body.removeChild(overlay);
    document.body.style.overflow = 'auto'; //bech tarja3 tnajem tscrolli 

}

function Enregistrer(parent, txt, txt1, txt12, fenetre, container, sect1 ,overlay) {
    var p = parent.querySelector('p');
    var h1 = parent.querySelector('h1');
    var h4 = parent.querySelector('h4');
    if (txt !== '') { p.innerHTML = txt; }
    if (txt1 !== '') { h1.innerHTML = txt1; }
    if (txt12 !== '') { h4.innerHTML = txt12; }
    Close(fenetre, container, sect1, overlay);
}
