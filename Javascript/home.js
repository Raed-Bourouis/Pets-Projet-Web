
function redirection(link) {
    window.location.href = link;
}
const text="elcome To Our Pets Website"
function slowlyText(elem){
    let i=0;
    const interval=setInterval(()=>{
        elem.innerHTML+=text[i];
        i++; 
        if (i===text.length) {
            clearInterval(interval);
            setTimeout(()=>{elem.innerHTML='W'},4000)
        }
    },250)
    
}
var div=document.getElementById('presentation')

function repeatSlowlyText(elem) {
    slowlyText(elem)
    setTimeout(()=>{repeatSlowlyText(elem)},11000)
}
repeatSlowlyText(div);