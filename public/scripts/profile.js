const dialog = document.querySelector('dialog');
const bmiBtn = document.getElementById('bmiBtn');

bmiBtn.addEventListener('click', () =>{
   dialog.showModal();
});

dialog.addEventListener('click', (e) => {
    const dialogDimensions = dialog.getBoundingClientRect();
    if (e.clientX < dialogDimensions.left || e.clientX > dialogDimensions.right || e.clientY < dialogDimensions.top || e.clientY > dialogDimensions.bottom) {
        dialog.close();
    }
});