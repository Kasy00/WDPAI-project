const searchRecipesBtn = document.getElementById('searchRecipesBtn');
const cards = document.querySelector('.cards');

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
    const ingredientsArray = Array.from(ingredientsList).map(item => item.textContent);

    document.getElementById('hiddenIngredients').value = JSON.stringify(ingredientsArray);

}

searchRecipesBtn.addEventListener('click', searchRecipes);

function searchRecipes() {
    const ingredientsList = document.querySelectorAll('.ingredient-item');
    const ingredientsArray = Array.from(ingredientsList).map(item => item.textContent);

    const apiKey = '43a9675a98214cf99e2f931732573d7a';
    const ingredientsString = ingredientsArray.join(',');
    const url = `https://api.spoonacular.com/recipes/search?apiKey=${apiKey}&query=&includeIngredients=${ingredientsString}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            let html = ""
            let foundRecipes = false;
            
            if(data.results){
                data.results.forEach(recipe => {
                    foundRecipes = true;
                    html += `
                        <div class="card">
                            <img src="${recipe.image}">
                            <div class="card-info">
                                <h4>${recipe.title}</h4>
                            </div>
                        </div>
                    `;
                    cards.classList.remove('not-found');
                });
            }

            if (!foundRecipes) {
                html = "Unfortunately, we didn't find any recipes :(";
                cards.classList.add('not-found');
            }

            document.querySelector('.recipes .cards').innerHTML = html;   
        })
        .catch(error => console.error('Error:', error));
}