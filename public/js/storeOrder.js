
ready()


//? event listenerrs

function ready() {

    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
    document.addEventListener('DOMContentLoaded', getFromLocalStorage);

}

// ? when purchaseClicked

function purchaseClicked() {


    updateCartTotal()

}

//? remove cartItem

function removeCartItem(event) {


    var buttonClicked = event.target.parentElement.parentElement
    let CartId = buttonClicked.querySelector('.valueCart-id').innerHTML;

    buttonClicked.remove()
    updateCartTotal()
    removeProductLocalStorage(CartId)
}

// ? when quantity Changed

function quantityChanged(event) {
    var input = event.target
    console.log(event.target)
    var ParentCartID = input.parentElement.parentElement
    var GetID = ParentCartID.querySelector('.valueCart-id').innerHTML
    var price = ParentCartID.querySelector('.get-price').innerHTML
    var getQuantity =input.value
    //console.log(event.target)
    /*if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }*/
    //console.log(input.value);

    updateCartTotal()
    UpdateStorageCart(GetID,getQuantity,price)

}

// ? when add to cart clicked

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement.parentElement
    console.log(shopItem);
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    var factory = shopItem.getElementsByClassName('shop-item-factory')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var inch = shopItem.getElementsByClassName('inch-cart')[0].innerText
    var id = shopItem.getElementsByClassName('Value-id')[0].innerText
    var quantity = shopItem.getElementsByClassName('quantity-cart-section')[0].value
    var unit = shopItem.getElementsByClassName('unitPipe')[0].innerText
    var fee = price * quantity
    var imageSrc = null
    const ProductInfo = {
        title : title,
        price : price,
        imageSrc : imageSrc,
        id : id,
        quantity:quantity,
        TotalCart :price,
        factory :factory,
        unit :unit,
        fee : fee,
        inch : inch
    }
    addItemToCart(ProductInfo)
    updateCartTotal()

    // total cart storage
    let totalPrice = document.querySelector('.cart-total-price').innerText
    localStorage.setItem('totalPrice',JSON.stringify(totalPrice))

}

// ? add item to cart UI

function addItemToCart(ProductInfo) {
    var cartRow = document.createElement('tr')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == ProductInfo.title) {
            Swal.fire({

                text: 'این محصول در سبد خرید موحود می باشد',
                icon: 'error',
                confirmButtonText: '!باشه'
            })
            return
        }
    }

    var cartRowContents = `

   <div class="cart-item cart-column">

              <td style="display:none" class="valueCart-id">${ProductInfo.id}</td>

                  <td class="d-flex justify-content-center"><span>تومان</span> <span class="cart-fee  ">${ProductInfo.fee}</span></td>

                 <td> <span class="d-inline-flex " >تومان</span> <span class="get-price" >${ProductInfo.price}</span></td>

                    <td><input disabled class="cart-quantity-input" type="number" value="${ProductInfo.quantity}"></td>

                    <td><span  >${ProductInfo.unit}</span></td>

                    <td><span  >${ProductInfo.inch}</span></td>

                   <td><span  >${ProductInfo.factory}</span></td>

                    <td class="text-left direction-right "><span class="cart-item-title" >${ProductInfo.title}</span></td>

                 <td><button class="btn btn-danger btn-xs cart-remove" type="button">x</button></td>
`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
    saveIntoStorage(ProductInfo);

}


// ? update Total cart


function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    //console.log(cartRows)
    var total = 0;
    var quantityElement = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]

        var priceElement = cartRow.getElementsByClassName('get-price')[0]
        var CartId = cartRow.getElementsByClassName('valueCart-id')[0]
        //console.log(CartId.innerHTML)
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        //console.log(quantityElement);
        var price = parseFloat(priceElement.innerText.replace('$', ''))

        var quantity = quantityElement.value
        //console.log(quantity)
        total = total + (price * quantity)
    }

    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText =  total + ' تومان '

}

// ? localStorage

function saveIntoStorage(course) {
    let products = getProductFromStorage();

    // add the course into the array
    products.push(course);

    // since storage only saves strings, we need to convert JSON into String
    localStorage.setItem('products', JSON.stringify(products) );

}

// ? Get the contents from storage
function getProductFromStorage() {

    let products;

    // if something exist on storage then we get the value, otherwise create an empty array
    if(localStorage.getItem('products') === null) {
        products = [];
    } else {
        products = JSON.parse(localStorage.getItem('products') );
    }
    return products;

}
// ? remove from localStorage cart
function removeProductLocalStorage(id) {
    // get the local storage data
    let ProductsLS = getProductFromStorage();

    // loop trought the array and find the index to remove
    ProductsLS.forEach(function(ProductLS, index) {
        if(ProductLS.id === id) {
            ProductsLS.splice(index, 1);
        }
    });

    // Add the rest of the array
    localStorage.setItem('products', JSON.stringify(ProductsLS));
    let totalPrice = document.querySelector('.cart-total-price').innerText
    //add total Price from storage to UI
    localStorage.setItem('totalPrice',JSON.stringify(totalPrice))

}

// ? when quantity changed update cart
function UpdateStorageCart(id,quantity,price)
{
    // console.log(id,quantity)
    let ProductsLS = getProductFromStorage();

    ProductsLS.forEach(function(ProductLS, index) {
        if(ProductLS.id === id) {
            ProductLS.quantity =quantity
            ProductLS.fee = quantity * price
            document.querySelectorAll('.cart-fee')[index].innerHTML =  ProductLS.fee
        }

    });

    let totalPrice = document.querySelector('.cart-total-price').innerText
    localStorage.setItem('totalPrice',JSON.stringify(totalPrice))

    // update fee



    // Add the rest of the array
    localStorage.setItem('products', JSON.stringify(ProductsLS));
}

// ? print to cart form localStorage
function getFromLocalStorage() {

    let ProductsLS = getProductFromStorage();

    var cartItems = document.querySelector('.cart-items')

    // LOOP throught the courses and print into the cart
    ProductsLS.forEach(function(prodcut) {

        const cartRow = document.createElement('tr')
        cartRow.classList.add('cart-row')
        // create the <tr>
        cartRow.innerHTML = `

          <td style="display:none" class="valueCart-id">${prodcut.id}</td>

                  <td class="d-flex justify-content-center"><span>تومان</span> <span class="cart-fee  ">${prodcut.fee}</span></td>

                 <td> <span class="d-inline-flex " >تومان</span> <span class="get-price" >${prodcut.price}</span></td>

                    <td><input disabled class="cart-quantity-input" type="number" value="${prodcut.quantity}"></td>

                    <td><span  >${prodcut.unit}</span></td>

                    <td><span  >${prodcut.inch}</span></td>

                   <td><span  >${prodcut.factory}</span></td>

                    <td class="text-left direction-right "><span  class="cart-item-title" >${prodcut.title}</span></td>

                 <td><button class="btn btn-danger btn-xs cart-remove" type="button">x</button></td>
`


        console.log(cartItems.appendChild(cartRow))
        cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
        cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
    });
    let TotalPrice = JSON.parse(localStorage.getItem('totalPrice'))
    document.querySelector('.cart-total-price').innerHTML = TotalPrice
}

