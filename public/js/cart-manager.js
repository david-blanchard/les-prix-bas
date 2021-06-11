class CartManager {
    constructor() {
        this.cartSumComponent = document.querySelector(
            'button[id="cart-cta"] span[id="cart-total"][name="price"]'
        );
        this.cartCountComponent = document.querySelector(
            'button[id="cart-cta"] span[id="cart-count"][name="quantity"]'
        );
    }

    updateCart(data) {
        this.cartCountComponent.innerText = data.quantity
        this.cartSumComponent.innerText = (data.total * 0.75).toFixed(2).replace('.', ',')
    }

    retrieveCart() {
        const context = this;
        const session = new ServerSession();
        session.retrieve(
            {
                type: "Cart",
            },
            function (data) {
                context.updateCart(data)
            }
        )
    }

    storeCart(productId, quantity) {
        const context = this;
        const session = new ServerSession();
        session.store(
            {
                type: "Cart",
                content: [
                    {
                        productId: productId,
                        quantity: quantity,
                    },
                ],
            },
            function (data) {
                console.log({data: data})
                context.updateCart(data)
            }
        )
    }
}

(() => {
    const cartMan = new CartManager()
    cartMan.retrieveCart()
})()