<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/public/css/home-style.css">
    <script src="/public/scripts/home.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img class="logo" src="/public/img/logo.png" alt="logo">
            <ul>
                <li><img class="sidebar-btn" src="/public/img/home.svg" alt="home button">Home</li>
                <li><img class="sidebar-btn" src="/public/img/profile.svg" alt="profile button">Profile</li>
                <li><img class="sidebar-btn" src="/public/img/about.svg" alt="about button">About</li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <div id="upper-header">
                    <form method="POST" action="recipes" id="ingredientsForm">
                        <input type="text" id="search-bar" name="search" placeholder="Enter ingredients here" autocomplete="off">
                        <button type="button" id="addIngredientBtn">Add</button>
                        <button type="button" id="deleteIngredientBtn">Delete</button>

                        <input type="hidden" name="hiddenIngredients" id="hiddenIngredients">
                        <button type="submit" id="searchRecipesBtn">Search</button>
                    </form>
                    <div class="avatar"></div>
                    <span id="user-name">Kamil</span>
                </div>
                <div id="addedIngredients"></div>
            </div>
            <div class="section">
                <div class="recipes">
                    <h3>Recipes suggested for you</h3>
                    <div class="cards">
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe1.png" alt="recipe1">
                            <div class="card-info">
                                <h4>Recipe 1</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="trending">
                    <h3>Trending</h3>
                    <div class="cards">
                        <div class="card">
                            <img src="/public/img/recipe2.png" alt="recipe2">
                            <div class="card-info">
                                <h4>Recipe 2</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe2.png" alt="recipe2">
                            <div class="card-info">
                                <h4>Recipe 2</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="/public/img/recipe2.png" alt="recipe2">
                            <div class="card-info">
                                <h4>Recipe 2</h4>
                                <p>Time: 30 min</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>