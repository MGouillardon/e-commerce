let addBtn = document.querySelector(".add");
let cart = document.getElementById("cart-js");

addBtn.addEventListener("click", async () => {
  let response = await fetch("/addCart");
  let data = await response.json();
  let quantityCart = Object.values(data);
  setCartQuantity(quantityCart);
});

function setCartQuantity(quantityCart) {
    let cartQuantity = document.createElement('div');
    cartQuantity.classList.add('cart-quantity');
    cart.appendChild(cartQuantity);
    cartQuantity.innerHTML = quantityCart;

}