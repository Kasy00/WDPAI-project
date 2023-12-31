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

document.getElementById('ingredientsForm').addEventListener('submit', function(event){
    event.preventDefault();

    updateIngredients();

    this.submit();
});

function updateIngredients(){
    const ingredientsList = document.querySelectorAll('.ingredient-item');
    const ingredientsArray = Array.from(ingredientsList).map(item => item.textContent);

    document.getElementById('hiddenIngredients').value = JSON.stringify(ingredientsArray);
}