window.addEventListener('DOMContentLoaded', () => {
    const filterSubmit = document.querySelector('#filterSubmit')
    filterSubmit.addEventListener('click', () => {
        const filterCheckboxes = document.querySelectorAll('.filter_checkbox')
        let checkedBoxes = [];
        filterCheckboxes.forEach(element => {
            if(element.checked){
                checkedBoxes.push(element.id)
            }
        });
        const url = window.location.pathname;
        const filename = url.substring(url.lastIndexOf('/')+1);
        let formData = new FormData()
        formData.append('filters', checkedBoxes)
        formData.append('category', filename)
        fetch('../../php/filter.php', {
            method: 'POST',
            body: formData
        }).then((res) => {
            return res.text();
        }).then((body => {
            console.log(body)
        }))

    })
})

