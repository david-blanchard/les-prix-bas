class ProductPage 
{

    bindImages() {
        document.querySelectorAll('img[name="picto"]').forEach(item => {
            item.src = item.dataset['src'];
        });
    }
    attachEvents() {
        document.querySelectorAll('button[name="btn-picto"]').forEach(item => {
            item.onclick = function(e) {
                console.log({target: e.target});
                var mainPicto = document.querySelector('#main-picto img[name="picto"]');
                mainPicto.src = e.target.dataset['src'];
            }
        });
    }
}

$(document).ready(() => {
    var ppage = new ProductPage()
    ppage.attachEvents()
    ppage.bindImages()
})