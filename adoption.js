function validateform(event){

}
function mustbeayes() {
    var x = document.getElementById("correct-yes").checked;
    if (!x) {
        alert("You must verify that all of the information you have provided is correct");
        var error=document.getElementById("error");
        error.innerHTML="<p>Error: You did not confirm your information</p>";
        error.style="color:red";
        return false;
    } else {
        return true;
    }
}
