const searchRecipesBtn = document.getElementById('searchRecipesBtn');
const cards = document.querySelector('.cards');
const apiKey = '43a9675a98214cf99e2f931732573d7a';

const maxIngredients = 8;

document.getElementById('addIngredientBtn').addEventListener('click', () => {
   const ingredientInput = document.getElementById('search-bar');
   const ingredientValue = ingredientInput.value.trim();

   const currentIngredients = document.querySelectorAll('.ingredient-item').length;

   if (ingredientValue !== '' && currentIngredients <= maxIngredients){
        const ingredientItem = document.createElement('div');
        ingredientItem.classList.add('ingredient-item');
        ingredientItem.textContent = ingredientValue;

        document.getElementById('addedIngredients').appendChild(ingredientItem);
        ingredientInput.value = '';
   }
   else if(currentIngredients > maxIngredients) {
       alert(`You can only add ${maxIngredients} ingredients!`);
   }
});

document.getElementById('deleteIngredientBtn').addEventListener('click', () => {
    const ingredientList = document.querySelectorAll('.ingredient-item');
    const lastIngredient = ingredientList[ingredientList.length - 1];

    if (lastIngredient){
        lastIngredient.remove();
    }
    updateIngredients();
});

function updateIngredients(){
    const ingredientsList = document.querySelectorAll('.ingredient-item');
    
    if (ingredientsList.length > 0){
        const ingredientsArray = Array.from(ingredientsList).map(item => item.textContent);
        document.getElementById('hiddenIngredients').value = JSON.stringify(ingredientsArray);
    }
}

searchRecipesBtn.addEventListener('click', searchRecipes);

function searchRecipes() {
    const ingredientsList = document.querySelectorAll('.ingredient-item');
    const ingredientsArray = Array.from(ingredientsList).map(item => item.textContent);

    if (ingredientsArray.length === 0) {
        const cards = document.querySelector('.recipes .cards');
        cards.innerHTML = "Please add at least one ingredient then search"
        cards.classList.add('not-found');
        return;
    }

    const apiKey = '43a9675a98214cf99e2f931732573d7a';
    const ingredientsString = ingredientsArray.join(',');
    const url = `https://api.spoonacular.com/recipes/complexSearch?apiKey=${apiKey}&includeIngredients=${ingredientsString}&number=9`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const cards = document.querySelector('.recipes .cards');
            cards.innerHTML = '';

            if (data.results) {
                const loadImages = data.results.map(recipe => {
                    return new Promise((resolve, reject) => {
                        const img = new Image();
                        img.src = `https://spoonacular.com/recipeImages/${recipe.id}-312x231.jpg`;

                        img.onload = () => {
                            const card = document.createElement('div');
                            card.classList.add('card');

                            card.innerHTML = `
                                <img src="${img.src}" alt="${recipe.title}">
                                <div class="card-info">
                                    <h4>${recipe.title}</h4>
                                </div>
                            `;
                            cards.classList.remove('not-found');
                            card.addEventListener('click', () => showRecipeDetails(recipe.id));
                            cards.appendChild(card);

                            resolve();
                        };

                        img.onerror = reject;
                    });
                });

                Promise.all(loadImages)
                    .then(() => {
                        if (cards.children.length === 0) {
                            cards.innerHTML = "Unfortunately, we didn't find any recipes :(";
                            cards.classList.add('not-found');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                cards.innerHTML = "Unfortunately, we didn't find any recipes :(";
                cards.classList.add('not-found');
            }

            document.getElementById('addedIngredients').innerHTML = '';
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

window.onload = function(){
    const url = `https://api.spoonacular.com/recipes/random?apiKey=${apiKey}&number=4`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.recipes) {
                data.recipes.forEach(recipe =>{
                    const img = new Image();
                    img.src = `https://spoonacular.com/recipeImages/${recipe.id}-312x231.jpg`;
    
                    img.onload = () => {
                        const card = document.createElement('div');
                        card.classList.add('card');
                        
                        card.innerHTML = `
                            <img src="${img.src}" alt="${recipe.title}">
                            <div class="card-info">
                                <h4>${recipe.title}</h4>
                            </div>
                        `;
                        card.addEventListener('click', () => showRecipeDetails(recipe.id));
                        document.querySelector('.trending .cards').appendChild(card);
                    };
                })
            } else {
                document.querySelector('.trending .cards').innerHTML = "Unfortunately, we didn't find any recipes :(";
                document.querySelector('.trending .cards').classList.add('not-found');
            }
        }) 
}