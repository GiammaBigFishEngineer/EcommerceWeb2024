import { loadCartFromCookie } from './cookies.js';
import { addToCartList, addTotalToCart, addTotalItemCart } from './renderCheckout.js';

// Ricarica il carrello dai cookie
const loadedCart = loadCartFromCookie();
loadedCart.showCart();
const products = loadedCart.getProducts();


products.forEach(p => {
    addToCartList(p);
});
addTotalToCart(loadedCart.getTotal());
addTotalItemCart(loadedCart.getProductsCount());
