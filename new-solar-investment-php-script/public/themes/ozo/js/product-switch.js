var productTabs = Array.from(document.querySelectorAll('[role="product-switch"]'));
var productsBags = Array.from(document.getElementsByClassName('products-bag'))
//console.log(productsBags)



productTabs.map(tab => {
    tab.addEventListener('click', showProducts, false)
})

function showProducts(e){
    let targetButton = e.target;
    let targetID = targetButton.getAttribute('data-target');
    
    // remove active classes from other tabs
    focusActiveButton(targetButton);

    // hide  all other products
    hideAllProducts();

    // show targeted products
    showTargetedProducts(targetID)
}

function focusActiveButton(targetButton){
    productTabs.map(tab => {
        tab.classList.remove('active')
    })

    targetButton.classList.add('active')
}

function hideAllProducts(){
    productsBags.map(productBag => {
        productBag.classList.add('hide');
        //console.log(productBag)
    })

    
}

function showTargetedProducts(id){
    document.getElementById(id).classList.remove('hide')
}

productTabs[0].click()