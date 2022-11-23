export default (quantityCart) => {
  setDisplayQuantityCart(quantityCart);
  setCartQuantity(quantityCart);
};
let cartQuantity = document.querySelector(".cart-quantity");

function setDisplayQuantityCart(quantityCart) {
  if (quantityCart > 0) {
    cartQuantity.style.display = "flex";
  } else {
    cartQuantity.style.display = "none";
  }
}

function setCartQuantity(quantityCart) {
  cartQuantity.innerHTML = quantityCart;
}
