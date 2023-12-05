const productsBtns = document.querySelectorAll('.products__product--addToCart')


const formData = new FormData()

productsBtns.forEach(element => {
    element.addEventListener('click', () => {
        formData.append('id', element.parentElement.id)
        formData.append('quantity', 1)
        fetch('../../php/add_to_cart.php', {
            method: 'POST',
            body: formData
        }).then(
            // wyświetl popup, o dodaniu do koszyka	
        )
    })
})