export class Product{
    constructor(id,name,price,quantity){
        this.id = id;
        this.name = name;
        this.price = price;
        //is the quantity inside cart
        this.quantity = quantity;
    }

    getId(){
        return this.id;
    }

    getQuantity(){
        return this.quantity;
    }

    getName(){
        return this.name;
    }
}