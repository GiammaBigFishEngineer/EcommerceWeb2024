import { Cart } from './Cart.js';
import { Product } from './Product.js';

// Funzioni per gestire i cookie
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = `expires=${date.toUTCString()}`;
    document.cookie = `${name}=${value};${expires};path=/`;
}

function getCookie(name) {
    const cookies = document.cookie.split(';');
    for (let cookie of cookies) {
        const [key, value] = cookie.trim().split('=');
        if (key === name) {
            return value;
        }
    }
    return null;
}

// Salvare il carrello nei cookie
export function saveCartToCookie(cart) {
    const cartJSON = cart.toJSON();
    setCookie('cart', cartJSON, 1); // Salva il cookie per 1 giorno
}

// Caricare il carrello dai cookie
export function loadCartFromCookie() {
    const cartJSON = getCookie('cart');
    if (cartJSON) {
        return Cart.fromJSON(cartJSON);
    }
    return new Cart(); // Se il cookie non esiste, ritorna un carrello vuoto
}

/* Test
const cart = new Cart();
cart.clearCart();
const prod1 = new Product(0,"pizza",3.00,1,'images/img-card-example.png');
const prod2 = new Product(1,"mele",1.00,1,'images/img-card-example.png');
const prod3 = new Product(2,"pere",5.00,1,'images/img-card-example.png');
cart.addProduct(prod1);
cart.addProduct(prod2);
cart.addProduct(prod3);
cart.showCart();
saveCartToCookie(cart);
 */
