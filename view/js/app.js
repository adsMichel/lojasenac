let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let listProductHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let iconCartSpan = document.querySelector('.icon-cart span');
let totalPriceHTML = document.querySelector('.totalPrice');

let listProduct = [];
let carts = [];

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
                newProduct.dataset.id = product.id;
                newProduct.innerHTML = `
                    <img class="menu-img img-fluid" src="${product.imagem}" alt="">
                    <h4>${product.nome}</h4>
                    <p class="ingredients">${product.autor}</p>
                    <p class="price">$${product.preco}</p>
                    <button type="button" class="addCart btn btn-sm btn-outline-warning button-hover-background fs-6">Adicionar ao carrinho</button>
                `;
                listProductHTML.appendChild(newProduct);
            })
        }
    }

    listProductHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if (positionClick.classList.contains('addCart')) {
            let product_id = positionClick.parentElement.dataset.id;
            addToCart(product_id);
            // alert("Adicionado ao carrinho!");
        }
    })

    const addToCart = (product_id) => {
        let positionThisProductInCart = carts.findIndex((value) => value.product_id == product_id);
        if (carts.length <= 0) {
            carts = [{
                product_id: product_id,
                quantity: 1
            }]
        } else if (positionThisProductInCart < 0) {
            carts.push({
                product_id: product_id,
                quantity: 1
            })
        } else {
            carts[positionThisProductInCart].quantity = carts[positionThisProductInCart].quantity + 1;
        }
        addCartToHTML();
        addCartToMemory();
    }

    const addCartToHTML = () => {
        listCartHTML.innerHTML = '';
        let totalQuantity = 0;
        let totalPrice = 0;
        if (carts.length > 0) {
            carts.forEach(cart => {
                totalQuantity = totalQuantity + cart.quantity;
                totalPrice = totalPrice + (listProduct.find((value) => value.id == cart.product_id).preco * cart.quantity);
                let newCart = document.createElement('div');
                newCart.classList.add('item');
                newCart.dataset.id = cart.product_id;
                let positionProduct = listProduct.findIndex((value) => value.id == cart.product_id);
                let info = listProduct[positionProduct];
                newCart.innerHTML = `
                    <div class="image">
                        <img src="${info.imagem}" alt="">
                    </div>
                    <div class="name">
                        ${info.nome}
                    </div>
                    <div class="totalPrice">
                        R$ ${info.preco * cart.quantity}
                    </div>
                    <div class="quantity">
                        <span class="minus">
                            <</span>
                                <span>${cart.quantity}</span>
                                <span class="plus">></span>
                    </div>`;
                listCartHTML.appendChild(newCart);
            })
        }
        iconCartSpan.innerText = totalQuantity;
        totalPriceHTML.innerText = totalPrice;
    }

    const addCartToMemory = () => {
        localStorage.setItem('cart', JSON.stringify(carts));
    }

    listCartHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
            let product_id = positionClick.parentElement.parentElement.dataset.id;
            let type = 'minus';
            if (positionClick.classList.contains('plus')) {
                type = 'plus';
            }
            changeQuantity(product_id, type);
        }
    })

    const changeQuantity = (product_id, type) => {
        let positionItemInCart = carts.findIndex((value) => value.product_id == product_id);
        if (positionItemInCart >= 0) {
            switch (type) {
                case 'plus':
                    carts[positionItemInCart].quantity = carts[positionItemInCart].quantity + 1;
                    break;
                default:
                    let valueChange = carts[positionItemInCart].quantity - 1;
                    if (valueChange > 0) {
                        carts[positionItemInCart].quantity = valueChange;
                    } else {
                        carts.splice(positionItemInCart, 1);
                    }
                    break;
            }
        }
        addCartToMemory();
        addCartToHTML();
    }

const initApp = () => {
    fetch('http://lojasenac.test/view/produtos.php')
        .then(response => response.json())
        .then(data => {
            listProduct = data;
            addDataToHTML();

            // Recuperar carrinho da memoria
            if (localStorage.getItem('cart')) {
                carts = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        })
}

initApp();