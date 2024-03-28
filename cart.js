    // exemple
    const cartItems = [
        { id: 1, name: 'Cat food', price: 99.99, quantity: 2 },
        { id: 2, name: 'Dog food', price: 49.99, quantity: 1 }
    ];

    // Display cart items
    const cartContainer = document.getElementById('cart-items');
    cartItems.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.name}</td>
            <td>${item.price.toFixed(2)} TND</td>
            <td><input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)"></td>
            <td>${(item.price * item.quantity).toFixed(2)} TND</td>
            <td><button onclick="removeItem(${item.id})">Remove</button></td>
        `;
        cartContainer.appendChild(row);
    });

    // Update cart 
    const totalItems = cartItems.reduce((acc, item) => acc + item.quantity, 0);
    const totalPrice = cartItems.reduce((acc, item) => acc + (item.price * item.quantity), 0);
    document.getElementById('total-items').textContent = totalItems;
    document.getElementById('total-price').textContent = totalPrice.toFixed(2);

    // Functions to update cart
    function updateQuantity(id, quantity) {
        const item = cartItems.find(item => item.id === id);
        item.quantity = parseInt(quantity);
        updateCart();
    }

    function removeItem(id) {
        const index = cartItems.findIndex(item => item.id === id);
        if (index !== -1) {
            cartItems.splice(index, 1);
            updateCart();
        }
    }

    function clearCart() {
        cartItems.length = 0;
        updateCart();
    }

    function updateCart() {
        while (cartContainer.firstChild) {
            cartContainer.removeChild(cartContainer.firstChild);
        }

        cartItems.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>${item.price.toFixed(2)} TND</td>
                <td><input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)"></td>
                <td>${(item.price * item.quantity).toFixed(2)} TND</td>
                <td><button onclick="removeItem(${item.id})">Remove</button></td>
            `;
            cartContainer.appendChild(row);
        });

        const totalItems = cartItems.reduce((acc, item) => acc + item.quantity, 0);
        const totalPrice = cartItems.reduce((acc, item) => acc + (item.price * item.quantity), 0);
        document.getElementById('total-items').textContent = totalItems;
        document.getElementById('total-price').textContent = totalPrice.toFixed(2);
    }