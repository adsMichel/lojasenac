let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let listProductHTML = document.querySelector('.listProduct');

let listProduct = [];

iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
})
closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
})

const addDataToHTML = () => {
    listProductHTML.innerHTML = '';
        if (listProduct.length > 0) {
            listProduct.forEach(product => {
                let newProduct = document.createElement('div');
                newProduct.classList.add('item','col-lg-4', 'menu-item');
                newProduct.innerHTML = `
                    <img class="menu-img img-fluid" src="${product.image}" alt="">
                    <h4>${product.name}</h4>
                    <p class="ingredients">${product.ingredients}</p>
                    <p class="price">$${product.price}</p>
                    <button type="button" class="btn btn-sm btn-outline-warning button-hover-background fs-6">Adicionar ao carrinho</button>
                `;
                listProductHTML.appendChild(newProduct);
            })
        }
    }

const initApp = () => {
    fetch('assets/js/products.json')
        .then(response => response.json())
        .then(data => {
            listProduct = data;
            addDataToHTML();
        })
}

initApp();