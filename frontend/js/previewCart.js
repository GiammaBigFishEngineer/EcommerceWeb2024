import { loadCartFromCookie } from './cookies.js';
import { createProductElement } from './renderCart.js';

// Ricarica il carrello dai cookie
const loadedCart = loadCartFromCookie();
loadedCart.showCart();
const products = loadedCart.getProducts();


products.forEach(p => {
    // Seleziona un contenitore dove inserire il prodotto (ad esempio un div con id="products-list")
    const productsList = document.getElementById("products-list");
    // Aggiungi il prodotto dinamicamente alla lista
    const productElement = createProductElement(loadedCart, p);
    productsList.appendChild(productElement);
});
