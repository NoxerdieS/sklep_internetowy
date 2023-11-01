const addProductBtn = document.querySelector('.admin__add--addBtn')
const popupCloseBtn = document.querySelector('.admin__contentContainer--closeBtn')
const popupShadow = document.querySelector('.admin__popup--shadow')
const popup = document.querySelector('.admin__popup')
const searchBtn = document.querySelector('#searchBtn')

addProductBtn.addEventListener('click', () => {
    popup.classList.add('visible')
    popupShadow.classList.add('visible')
})
popupCloseBtn.addEventListener('click', () => {
    popup.classList.remove('visible')
    popupShadow.classList.remove('visible')
})
searchBtn.addEventListener('click', () => {
    const searchBar = document.querySelector('#searchBar')
    const searchRes = document.querySelectorAll('.admin__product--name')
    const adminProducts = document.querySelector('.admin__products')
    adminProducts.innerHTML =''
    searchRes.forEach(element =>{
        if(element.innerHTML.includes(searchBar.value)){
            adminProducts.appendChild(element.parentElement)
        }
    })

    let searchResetBtn = document.createElement('i')
    searchResetBtn.classList.add('fa-solid', 'fa-x')
    searchResetBtn.setAttribute('id', 'resetSearchBtn')
    searchBtn.replaceWith(searchResetBtn)
    searchResetBtn = document.querySelector('#resetSearchBtn')
    searchResetBtn.addEventListener('click', () => {
        searchBar.value = ""
        adminProducts.innerHTML = ""
        searchRes.forEach(element =>{
            adminProducts.appendChild(element.parentElement)
        })
        searchResetBtn.replaceWith(searchBtn)
    })


})
window.addEventListener("DOMContentLoaded", () => {
    let addForm = document.querySelector("#create-product-form");
    
    addForm.addEventListener("submit", () => {
        addForm = document.querySelector("#create-product-form");
        const formData = new FormData(addForm);
        let filename = window.location.pathname;
        filename = filename.substring(filename.lastIndexOf('/')+1, filename.lastIndexOf('.'))
        fetch(`../../php/admin_panel/add_item.php?file=${filename}`, {
            method: 'POST',
            body: formData
        })
        .then((res) =>{
            return res.text();
            // res to error phpa przy dodawaniu, w 99% nie będzie
        }).then((body) => {
            window.location.reload()
        })
    })
})