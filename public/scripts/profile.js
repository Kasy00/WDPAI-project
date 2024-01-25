const bmiDialog = document.getElementById('bmi-dialog');
const photoDialog = document.getElementById('photo-dialog');
const bmiBtn = document.getElementById('bmiBtn');
const profileAvatarBtn = document.getElementById('profile-avatar-btn');
const bmiForm = document.getElementById('BMI-form');
const favoritesBtn = document.getElementById('favoritesBtn');
const favoritesInfo = document.querySelector('.favorites-info');
const closeFavoritesBtn = document.getElementById('close-favorites-btn');
const apiKey = '42c97b6e7560428ea171c7eb780122d0';

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

favoritesBtn.addEventListener('click', () => showFavorites());
closeFavoritesBtn.addEventListener('click', () => closeFavorites());

function showFavorites(){
    const userIdContainer = document.getElementById('userIdContainer');
    const userId = userIdContainer.dataset.userId;
    favoritesInfo.style.display = 'flex';

    fetch('/get_favorites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({userId})
    })
    .then(response => response.json())
    .then(data => {
        const profileCard = document.querySelector('.profile-card');
        profileCard.style.display = 'none';
        const favoritesContainer = document.querySelector('.favorites-container');
        favoritesContainer.style.display = "grid";
        favoritesContainer.classList.add('show-favorites');

        favoritesContainer.innerHTML = '';

        data.favorites.forEach(recipe => {
            fetch(`https://api.spoonacular.com/recipes/${recipe.recipe_id}/information?apiKey=${apiKey}`, {
            headers: {
                'Content-Type': 'application/json',
            }
            })
            .then(response => response.json())
            .then(recipeData => {
                const card = document.createElement('div');
                card.classList.add('card');

                card.innerHTML = `
                    <img src="${recipeData.image}" alt="${recipeData.title}">
                    <div class="card-info">
                        <h4>${recipeData.title}</h4>
                    </div>
                `;
                card.addEventListener('click', () => showRecipeDetails(recipeData.id));
                favoritesContainer.appendChild(card);
            })
            .catch(error => console.error('Error:', error));
        });
    })
    .catch(error => console.error('Error:', error));
}

function showRecipeDetails(recipeId) {
    const url = `https://api.spoonacular.com/recipes/${recipeId}/information?apiKey=${apiKey}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            document.getElementById('recipeImage').src = data.image;
            document.getElementById('recipeTitle').textContent = data.title;
            document.getElementById('recipeInstructions').innerHTML = data.instructions;
            document.getElementById('recipeTime').textContent = `Time: ${data.readyInMinutes} minutes`;
            document.getElementById('recipeServings').textContent = `Servings: ${data.servings}`;

            const dialog = document.getElementById('recipe-dialog');
            dialog.showModal();

            const closeBtn = document.querySelector('.close-btn');
            closeBtn.addEventListener('click', () =>{
                dialog.close();
            });
        })
        .catch(error => console.error('Error:', error));
}

function closeFavorites(){
    const profileCard = document.querySelector('.profile-card');
    profileCard.style.display = 'flex';
    const favoritesContainer = document.querySelector('.favorites-container');
    favoritesContainer.style.display = "none";
    favoritesContainer.classList.remove('show-favorites');
    favoritesInfo.style.display = 'none';
}