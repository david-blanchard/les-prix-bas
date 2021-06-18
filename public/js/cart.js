class Cart {
    constructor() {
        this.cartSumComponent = document.querySelector(
            'span[id="cart-cta"] span[id="cart-total"][name="price"]'
        );
        this.cartCountComponent = document.querySelector(
            'span[id="cart-cta"] span[id="cart-count"][name="quantity"]'
        );
    }

    update(data) {
        this.cartCountComponent.innerText = data.quantity
        this.cartSumComponent.innerText = (data.total * 0.75).toFixed(2).replace('.', ',')
    }

    retrieve() {
        const context = this;
        const session = new ServerSession();
        session.retrieve(
            {
                type: "Cart",
            },
            function (data) {
                context.update(data)
            }
        )
    }

    store(productId, quantity) {
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
                context.update(data)
            }
        )
    }
}

(() => {
    const cart = new Cart()
    cart.retrieve()
})()