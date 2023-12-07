const detailsBtns = document.querySelectorAll('.details')

detailsBtns.forEach(element => {
    element.addEventListener('click', ()=>{
        const id = element.nextElementSibling.value
        fetch(`../../html/user_panel/order_details.php?id=${id}`)
        .then(res => {
            return res.text()
        }).then(body => {
            element.parentElement.parentElement.innerHTML = body;
            //   !!!! wyświetl body jako popup !!!!
            console.log('test')
        })
    })
})