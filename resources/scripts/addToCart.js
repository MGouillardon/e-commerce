let addButtons = document.querySelectorAll(".add");
let cartQuantity = document.querySelector(".cart-quantity");
let cart = document.getElementById("cart-js");

for (let addBtn of addButtons) {
  addBtn.addEventListener("click", async () => {
    let response = await fetch("/addCart");
    let data = await response.json();
    let quantityCart = Object.values(data);
    setDisplayQuantityCart(quantityCart);
    setCartQuantity(quantityCart);
  });
}

function setDisplayQuantityCart(quantityCart){
  if(quantityCart > 0){
    cartQuantity.style.display = "flex";
  }
}

function setCartQuantity(quantityCart) {
  cartQuantity.innerHTML = quantityCart;
}


