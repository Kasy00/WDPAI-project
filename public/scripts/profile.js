const bmiDialog = document.getElementById('bmi-dialog');
const photoDialog = document.getElementById('photo-dialog');
const bmiBtn = document.getElementById('bmiBtn');
const profileAvatarBtn = document.getElementById('profile-avatar-btn');

bmiBtn.addEventListener('click', () =>{
    bmiDialog.showModal();
});

bmiDialog.addEventListener('click', (e) => {
    const dialogDimensions = bmiDialog.getBoundingClientRect();
    if (e.clientX < dialogDimensions.left || e.clientX > dialogDimensions.right || e.clientY < dialogDimensions.top || e.clientY > dialogDimensions.bottom) {
        bmiDialog.close();
    }
});

profileAvatarBtn.addEventListener('click', () => {
    photoDialog.showModal();
});

photoDialog.addEventListener('click', (e) => {
    const dialogDimensions = photoDialog.getBoundingClientRect();
    if (e.clientX < dialogDimensions.left || e.clientX > dialogDimensions.right || e.clientY < dialogDimensions.top || e.clientY > dialogDimensions.bottom) {
        photoDialog.close();
    }
});