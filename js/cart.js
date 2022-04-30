const priceArray = document.querySelectorAll(".price");

(() => {
    const cart = JSON.parse(localStorage.getItem("cart"));
    const itemTable = document.querySelector(".cartTable");

    if (!cart || !itemTable || !priceArray || priceArray.length !== 5)
        return;

    let content = "<tr><th>Product</th><th>Quantity</th><th>Price</th><th>Remove</th></tr><tbody>";

    cart.forEach(({
        title,
        quantity,
        price
    }) => {
        content += `
        <tr>
        <td>
            ${title}
        </td>
        <td>
            <button class="quantityButton" onClick="updateCart(-1, '${title}', this)">-</button>
            <input class= "quantityBox" type="number" min="1" value="${quantity}" disabled/>
            <button class="quantityButton" onClick="updateCart(+1, '${title}', this)">+</button>
        </td>
        <td>
            ${(quantity * price).toFixed(2)}$
        </td>
        <td>
            <button class="xBox" onClick="removeItem(this,'${title}')">X</button>
        </td>
        `
    });

    content += "</tbody>"
    itemTable.innerHTML = content;

    updateTotal();
})();

function updateCart(value, title, BTN) {
    if (value !== 1 && value !== -1)
        return;

    let cart = JSON.parse(localStorage.getItem("cart"));
    const quantityBox = BTN.parentElement.children[1];
    const itemPriceBox= BTN.parentElement.parentElement.children[2];
    const removeBTN= BTN.parentElement.parentElement.lastElementChild.firstElementChild;

    cart = cart.map(i => {
        if (i.title === title) {
            i.quantity = parseInt(i.quantity)+parseInt(value);
            if (i.quantity===0 ){
                removeItem(removeBTN, title);
                return null;
            }else{
                quantityBox.value=i.quantity;
                itemPriceBox.textContent=(i.quantity*i.price).toFixed(2)+"$";
            }
            
        }
        return i;
    }).filter(i=>i!==null);

    localStorage.setItem("cart", JSON.stringify(cart));

    updateTotal();
}

function removeItem(removeBTN, title) {
    let cart = JSON.parse(localStorage.getItem("cart"));

    removeBTN.parentElement.parentElement.remove();
    cart = cart.filter(i => i.title !== title);

    localStorage.setItem("cart", JSON.stringify(cart));

    updateTotal();
}



function updateTotal() {
    const cart = JSON.parse(localStorage.getItem("cart"));
    let subtotal = 0;

    cart.forEach(({
        price,
        quantity
    }) => subtotal += price * quantity);

    priceArray[0].textContent = cart.length;
    priceArray[1].textContent = subtotal.toFixed(2);
    priceArray[2].textContent = (subtotal * 0.05).toFixed(2);
    priceArray[3].textContent = (subtotal * 0.1).toFixed(2);
    priceArray[4].textContent = (subtotal * 1.15).toFixed(2);
}

