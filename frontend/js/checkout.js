import { loadCartFromCookie } from './cookies.js';
import { addToCartList, addTotalToCart, addTotalItemCart } from './utils.js';

// Ricarica il carrello dai cookie
const loadedCart = loadCartFromCookie();
console.log("Carrello ricaricato:");
loadedCart.showCart();
console.log("Totale:", loadedCart.getTotal());
const products = loadedCart.getProducts();


products.forEach(p => {
    addToCartList(p);
});
addTotalToCart(loadedCart.getTotal());
addTotalItemCart(loadedCart.getProductsCount());
