const addProductBtn = document.querySelector('.admin__add--addBtn')
const popupCloseBtn = document.querySelector('.admin__contentContainer--closeBtn')
const popupShadow = document.querySelector('.admin__popup--shadow')
const popup = document.querySelector('.admin__popup')

addProductBtn.addEventListener('click', () => {
    popup.classList.add('visible')
    popupShadow.classList.add('visible')
})
popupCloseBtn.addEventListener('click', () => {
    popup.classList.remove('visible')
    popupShadow.classList.remove('visible')
})

window.addEventListener("DOMContentLoaded", () => {
    let addForm = document.querySelector("#create-product-form");
    
    addForm.addEventListener("submit", () => {
    ``
        addForm = document.querySelector("#create-product-form");
        const formData = new FormData(addForm);

        fetch("../../php/admin_panel/add_product.php", {
            method: 'POST',
            body: formData
        })
        .then((res) =>{
            return res.text();
            // res to error phpa przy dodawaniu, w 99% nie będzie
        }).then((body) => {
            console.log(body);
        });
    });
});