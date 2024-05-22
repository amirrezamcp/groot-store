let $ = document

let productsCategorizationContainer = $.getElementById('products-Categorization-Container')

function productsCategoryAdd (imgAddress, title) { 

    let productCategorizationBox = $.createElement ('div')
    productCategorizationBox.className = 'product-Categorization-Box'

    let productImg = $.createElement('img')
    productImg.className = 'category-Img'
    productImg.setAttribute('src', '../assets/img/product/'+ imgAddress +'.jpg')
    productImg.setAttribute('alt', 'category-img')

    let productTitle = $.createElement('h3')
    productTitle.className = 'category-Title'
    productTitle.innerHTML = title

    productCategorizationBox.appendChild(productImg)
    productCategorizationBox.appendChild(productTitle)

    productsCategorizationContainer.appendChild(productCategorizationBox)
}

productsCategoryAdd ('01', 'گردنبند متن')

