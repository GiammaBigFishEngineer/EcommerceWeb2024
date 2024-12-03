import { Product } from './Product.js';
import { CookieUtils } from './cookies.js';
import { createProductElement } from './renderCart.js';

// Ricarica il carrello dai cookie
const loadedCart = CookieUtils.loadCartFromCookie();
loadedCart.showCart();

export function addProductToCart(id, name, price, quantity, imagePath) {

    const product = new Product(id,name,price,quantity,imagePath);
    loadedCart.addProduct(product);
    console.log("Prodotto aggiunto");
    const successAllert = document.getElementById("successAddedToCart");
    successAllert.classList.remove('d-none');

    // Seleziona un contenitore dove inserire il prodotto (ad esempio un div con id="products-list")
    const productsList = document.getElementById("products-list");
    // Aggiungi il prodotto dinamicamente alla lista
    const productElement = createProductElement(loadedCart, product);
    productsList.appendChild(productElement);

    CookieUtils.saveCartToCookie(loadedCart);
}

// Esponi la funzione al global scope
window.addProductToCart = addProductToCart;

