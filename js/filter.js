window.addEventListener('DOMContentLoaded', () => {
    const filterSubmit = document.querySelector('#filterSubmit')
    const productsContainer = document.querySelector('.products__productContainer')
    const products = document.querySelectorAll('.products__product')

    const minPrice = document.querySelector('#minPrice')
    const maxPrice = document.querySelector('#maxPrice')
    const filterCheckboxes = document.querySelectorAll('.filter_checkbox')
    filterSubmit.addEventListener('click', () => {
        let checkedBoxes = [];
        filterCheckboxes.forEach(element => {
            if(element.checked){
                checkedBoxes.push(element.id)
            }
        });
        let minPriceValue
        if(minPrice.value < 0 || minPrice.value == ''){
            minPriceValue = 0
        }else{
            minPriceValue = minPrice.value
        }
        let maxPriceValue
        if(maxPrice.value < 0 || maxPrice.value == ''){
            maxPriceValue = 99999
        }else{
            maxPriceValue = maxPrice.value
        }

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
            const priceFilter = document.querySelectorAll('.products__product')
            productsContainer.innerHTML = ''
            priceFilter.forEach(element =>{
                let price = parseFloat(element.querySelector('.products__product--price').innerHTML.replace(' zł', ''))
                if(price<=parseFloat(maxPriceValue) && price>=parseFloat(minPriceValue)){
                    productsContainer.appendChild(element)
                }
            })
            if(productsContainer.innerHTML == ''){
                productsContainer.innerHTML = "Nie znaleziono produktów spełniających wymagania, Przepraszamy."
            }
        })
    })
    const filterReset = document.querySelector('#filterReset')
    filterReset.addEventListener('click', () => {
        filterCheckboxes.forEach(element => {
            element.checked = false
        })
        minPrice.value = ''
        maxPrice.value = ''
        minPriceValue = 0
        maxPriceValue = 99999
        productsContainer.innerHTML = ''
        products.forEach(element =>{
                productsContainer.appendChild(element)
        })
    })
})

