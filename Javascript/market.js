function search() {
    const input = document.getElementById("searchinput").value.toUpperCase();
    const products = document.getElementById("product-listing");
    const prod = products.querySelectorAll(".product");
    const pnom =products.getElementsByTagName('h2');

    for (let i = 0; i < pnom.length; i++) {
        let h = prod[i].getElementsByTagName('h2')[0];
        if (h) {
            let textValue = h.textContent || h.innerHTML;
            if (textValue.toUpperCase().indexOf(input) > -1) {
                prod[i].style.display = "";
            } else {
                prod[i].style.display = "none";
            }
        }
    }
}
document.addEventListener("keyup", search);
