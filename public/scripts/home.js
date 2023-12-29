document.getElementById('addIngredientBtn').addEventListener('click', () => {
   const ingredientInput = document.getElementById('search-bar');
   const ingredientValue = ingredientInput.value.trim();

   if (ingredientValue !== ''){
       const ingredientItem = document.createElement('div');
         ingredientItem.classList.add('ingredient-item');
         ingredientItem.textContent = ingredientValue;

         document.getElementById('addedIngredients').appendChild(ingredientItem);

         ingredientInput.value = '';
   }
});

document.getElementById('ingredientsForm').addEventListener('submit', function(event){
    event.preventDefault();

    const ingredientsList = document.querySelectorAll('.ingredient-item');
    const ingredientsArray = Array.from(ingredientsList).map(item => item.textContent);

    document.getElementById('hiddenIngredients').value = JSON.stringify(ingredientsArray);

    this.submit();
});