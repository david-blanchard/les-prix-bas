class ProductPage 
{
    constructor() {
        this.quantityCounter = document.querySelector('span[id="quantity"][name="count"]')
        this.cartSum = document.querySelector('button[id="cart-cta"] span[id="cart-total"][name="price"]')
        this.cartCounter = document.querySelector('button[id="cart-cta"] span[id="cart-count"][name="quantity"]')
        this.productPrice = document.querySelector('div[id="price-tag"][name="unit-price"]')
    }

    get quantity() {
        let count = parseInt(this.quantityCounter.innerHTML) 
        count = count === NaN ? 1 : count

        return count
    }

    get cartCount() {
        var count = parseInt(this.cartCounter.innerHTML) 
        count = count === NaN ? 1 : count

        return count
    }

    get priceTag() {
        let price = parseFloat(this.productPrice.innerText)
        price = price === NaN ? 1.00 : price

        return price
    }

    bindImages() {
        document.querySelectorAll('img[name="picto"]').forEach(item => {
            item.src = item.dataset['src']
        })
    }
    
    attachImageEvents() {
        var mainPicto = document.querySelector('#main-picto img[name="picto"]')

        document.querySelectorAll('button[name="btn-picto"]').forEach(item => {
            item.onclick = e => {
                mainPicto.src = e.target.dataset['src']
            }
        })
    }

    attachQuantityEvents() {

        document.querySelectorAll('a[name="quantity-handler"]').forEach(item => {
            var operand = item.id
            item.onclick = () => {
                var inc = (operand === 'more') ? 1 : (operand === 'less') ? -1 : 0
                var count = this.quantity + inc
                count = count < 1 ? 1 : count
                this.quantityCounter.innerHTML = count
            }
        })
    }

    attachAddToCartEvent() {
        var addToCart = document.querySelector('button[id="add-to-cart"]')

        addToCart.onclick = () => {
            let q = this.quantity + this.cartCount

            this.cartCounter.innerHTML = q
            this.cartSum.innerHTML =  (q * this.priceTag).toFixed(2)
        }
    }
}

(() => {
    var page = new ProductPage()
    page.attachImageEvents()
    page.bindImages()
    page.attachQuantityEvents()
    page.attachAddToCartEvent()

})()