const detailsBtns = document.querySelectorAll('.details')
const popupCloseBtn = document.querySelector('.admin__contentContainer--closeBtn')
const popup = document.querySelector('.user__popup')
const popupText = document.querySelector('.popup-text')

detailsBtns.forEach(element => {
    element.addEventListener('click', ()=>{
        const id = element.nextElementSibling.value
        fetch(`../../html/user_panel/order_details.php?id=${id}`)
        .then(res => {
            return res.text()
        }).then(body => {
            popup.innerHTML = body;
            popup.style.display = 'flex';
        })
    })
})

popupCloseBtn.addEventListener('click', () => {
    popup.style.display = 'none';
})