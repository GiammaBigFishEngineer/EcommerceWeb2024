import { Product } from './Product.js';

export class Cart {
    constructor(){
        this.products = [];
    }

    addProduct(product){
        if (!(product instanceof Product)) {
            throw new Error("Only Product instances can be added to the cart");
        }

        const existingProduct = this.products.find(p => p.id === product.id);

        if (existingProduct) {
            existingProduct.quantity += product.quantity;
        } else {
            this.products.push(product);
        }
    }

    getTotal() {
        return this.products.reduce((total, product) => total + (product.price * product.quantity), 0);
    }

    showCart() {
        if (this.products.length === 0) {
            console.log("Il carrello è vuoto!");
        } else {
            console.log("Prodotti nel carrello:");
            this.products.forEach(product => {
                console.log(`- ${product.name} (x${product.quantity}): €${(product.price * product.quantity).toFixed(2)}`);
            });
        }
    }

    getProductsCount(){
        return parseInt(this.products.length);
    }

    // Metodo per serializzare il carrello
    toJSON() {
        return JSON.stringify(this.products);
    }

    // Metodo per ripristinare il carrello da una stringa JSON
    static fromJSON(json) {
        const cart = new Cart();
        const products = JSON.parse(json);
        products.forEach(p => {
            cart.addProduct(new Product(p.id, p.name, p.price, p.quantity));
        });
        return cart;
    }

    getProducts(){
        return this.products;
    }
    
}