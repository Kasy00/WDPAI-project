const searchRecipesBtn = document.getElementById('searchRecipesBtn');

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

function searchRecipes(){
    const ingredientsList = document.querySelectorAll('.ingredient-item');
    const ingredientsArray = Array.from(ingredientsList).map(item => item.textContent);

    const apiKey = 'bfa43ec4eb6c4c0ead14ff8c102dfb29';
    const ingredientsString = ingredientsArray.join(',');
    const url = `https://api.spoonacular.com/recipes/findByIngredients?apiKey=${apiKey}&ingredients=${ingredientsString}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            let html = ""
    
            data.forEach(recipe => {
                html += `
                    <div class="card">
                        <img src="${recipe.image}" alt="${recipe.title}">
                        <div class="card-info">
                            <h4>${recipe.title}</h4>
                            <p>Time: ${recipe.readyInMinutes} min</p>
                        </div>
                    </div>
                `
            });
            document.querySelector('.recipes .cards').innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
}