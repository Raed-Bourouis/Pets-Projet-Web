// display cart items in the HTML
const cartContainer = document.getElementById('cart-items');
function generateDom(cartItems){
    cartItems.forEach(item => {
        debugger;
        // create a table row for each item
        const row = document.createElement('tr');
        row.innerHTML = `
        <td >${item.name}</td>
        <td >${item.price.toFixed(2)} TND</td>
        <td ><input type="number" style='width:40px' value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)"></td>
        <td >${(item.price * item.quantity).toFixed(2)} TND</td>
        <td ><a onclick="removeItem(${item.id})"><i class="fa fa-trash" style="color:red"></i></a></td>
    `;
        cartContainer.appendChild(row);
    });
    // total number of items and total price
// arrondir le prix à 2 chiffres après la virgule 'tofixed'
    const totalPrice = cartItems.reduce((acc, item) => acc + (item.price * item.quantity), 0).toFixed(2);
// calculer le nombre total d'articles dans le panier
    const totalItems = cartItems.reduce((acc, item) => acc + item.quantity, 0);

    document.getElementById('total-items').textContent = totalItems;
    document.getElementById('total-price').textContent = totalPrice;
}




// update quantity of a specific item
function updateQuantity(id, quantity) {
    const item = cartItems.find(item => item.id === id);
    item.quantity = parseInt(quantity);
    // update the cart after quantity change
    updateCart();
}

// remove an item from the cart
function removeItem(id) {
    const index = cartItems.findIndex(item => item.id === id);
    if (index !== -1) {
        cartItems.splice(index, 1);
        // update the cart after item removal
        updateCart();
    }
}

// clear the entire cart
function clearCart() {
    cartItems.length = 0;
    // update the cart after clearing
    updateCart();
}

// update the entire cart view
function updateCart() {
    while (cartContainer.firstChild) {
        cartContainer.removeChild(cartContainer.firstChild);
    }
    cartItems.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.name}</td>
            <td>${item.price.toFixed(2)} TND</td>
            <td><input type="number" style='width:40px' value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)"></td>
            <td>${(item.price * item.quantity).toFixed(2)} TND</td>
            <td><a onclick="removeItem(${item.id})"><i class="fa fa-trash" style="color:red"></i></button></td>
        `;
        cartContainer.appendChild(row);
    });

    // update total number of items and total price
    const totalItems = cartItems.reduce((acc, item) => acc + item.quantity, 0);
    const totalPrice = cartItems.reduce((acc, item) => acc + (item.price * item.quantity), 0);
    document.getElementById('total-items').textContent = totalItems;
    document.getElementById('total-price').textContent = totalPrice;
}
