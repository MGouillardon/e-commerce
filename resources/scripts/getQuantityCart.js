import { fetchToJSON } from "./utils";
import setCart from "./writeQuantityCard";
const GET_QUANTITY_CART = "/getQuantityCart";

export default async () => {
  let data = await fetchToJSON(GET_QUANTITY_CART);
  setCart(data.cart);
}