window.addEventListener('DOMContentLoaded', () => {
    const filterSubmit = document.querySelector('#filterSubmit')
    const productsContainer = document.querySelector('.products__productContainer')
    const products = document.querySelectorAll('.products__product')
    filterSubmit.addEventListener('click', () => {
        const filterCheckboxes = document.querySelectorAll('.filter_checkbox')
        let checkedBoxes = [];
        filterCheckboxes.forEach(element => {
            if(element.checked){
                checkedBoxes.push(element.id)
            }
        });
        const url = window.location.pathname;
        const filename = url.substring(url.lastIndexOf('/')+1).replace('.php', '');
        let formData = new FormData()
        formData.append('filters', checkedBoxes)
        formData.append('category', filename)
        
        fetch('../../php/filter.php', {
            method: 'POST',
            body: formData
        }).then((res) => {
            return res.json();
        }).then((body) => {
            let filteredIds = body
            console.log(filteredIds)
            console.log(filteredIds.length)
            if(filteredIds.length > 0){
                productsContainer.innerHTML = ''
                products.forEach(element =>{
                    if(filteredIds.includes(element.id)){
                        productsContainer.appendChild(element)
                    }
                })
            }else {
                products.forEach(element =>{
                    productsContainer.appendChild(element)
                })
            }
        })
    })
})

