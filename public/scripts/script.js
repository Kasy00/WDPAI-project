const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');
const card = document.querySelector('.card')

loginBtn.addEventListener('click', () =>{
    card.style.transform = 'rotateY(0deg)';
});

signupBtn.addEventListener('click', () =>{
    card.style.transform = 'rotateY(180deg)';
});
