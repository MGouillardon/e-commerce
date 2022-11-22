let addBtn = document.querySelector('.content__add');

addBtn.addEventListener('click', async () => {
     let response = await fetch('/addCart');
     let data = await response.json();
})
