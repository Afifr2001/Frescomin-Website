(() => {
    const addToCartBTN = document.getElementsByClassName('AddCart')[0];
    let title = document.getElementsByClassName('Producttitle')[0];
    const quantity = document.getElementsByClassName('quantityBotton')[0];
    const cart = JSON.parse(localStorage.getItem("cart"));
    if (!addToCartBTN || !title || !quantity || !cart)
        return;
    title = title.textContent.trim();
    const item = cart.find(i => i.title === title);
    if (item) {
        addToCartBTN.innerHTML = "<strong>Update Cart<strong>";
        quantity.value = item.quantity;
    }else{
        addToCartBTN.innerHTML = "<strong>Add to Cart<strong>";
        quantity.value = 1;
    }
    
})();

function des(moreDesc) {
    var description = document.getElementsByClassName("description")
    if (!description || description.length !== 1) {
        alert("error")
        return
    }
    description[0].classList.toggle("hidden");
    if (description[0].classList.contains("hidden")) {
        moreDesc.innerHTML = "<strong>More Description</strong></button>"
    } else {
        moreDesc.innerHTML = "<strong>Less Description</strong></button>"
    }
}

function plus() {
    var quantity = document.getElementsByClassName('quantityBotton')[0];
    let val = parseInt(quantity.value);
    val++
    quantity.value = val;
}



function minus() {
    var quantity = document.getElementsByClassName('quantityBotton')[0];
    let val = parseInt(quantity.value);
    if (val > 1) {
        val--
        quantity.value = val;
    }
}

function addToCart(event, addToCartBTN) {
    event.preventDefault();
    var title = document.getElementsByClassName('Producttitle')[0].textContent.trim();
    var price = document.getElementsByClassName('price')[0].textContent.trim();
    var quantity = document.getElementsByClassName('quantityBotton')[0].value;
    const item = {
        title,
        price,
        quantity
    };
    let cart = JSON.parse(localStorage.getItem("cart"));
    if (!cart || cart.length === 0) {
        cart = [item];
    } else {
        if (cart.filter(i => i.title === title).length !== 0) {
            cart.map(i => {
                if (i.title === title)
                    i.quantity = quantity;
                return i;
            })
        } else {
            cart = cart.concat([item]);
        }
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    addToCartBTN.innerHTML = "<strong>Update Cart<strong>";
}