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
function saveCartToCookie(cart) {
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


// Esempio d'uso
const cart = new Cart();
cart.addProduct(new Product(0, "Mela", 0.5, 3));
cart.addProduct(new Product(1, "Pane", 1.2, 1));
cart.addProduct(new Product(2, "Pera", 2.0, 5));
cart.addProduct(new Product(3, "pizza", 4.0, 2));

// Salva nei cookie
saveCartToCookie(cart);

