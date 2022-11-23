import { fetchToJSON } from "./utils";
import setCart from "./writeQuantityCard";

let addButtons = document.querySelectorAll(".add");
const ADD_CART = "/addCart";

export default () => {
  for (let addBtn of addButtons) {
    addBtn.addEventListener("click", async () => {
      let data = await fetchToJSON(ADD_CART);
      setCart(data.cart);
    });
  }
};
