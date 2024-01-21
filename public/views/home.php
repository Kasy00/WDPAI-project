<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: login");
        exit();
    }
    if (isset($_SESSION['avatar_path'])) {
        $avatar = $_SESSION['avatar_path'];
    } else {
        $avatar = '/public/img/profile-basic.jpg';
    }
?>
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
                <li><a href="home"><img class="sidebar-btn" src="/public/img/home.svg" alt="home button">Home</a></li>
                <li><a href="profile"><img class="sidebar-btn" src="/public/img/profile.svg" alt="profile button">Profile</a></li>
                <li><a href="about"><img class="sidebar-btn" src="/public/img/about.svg" alt="about button">About</a></li>
            </ul>
            <div class="mobile-menu">
                <label class="hamburger-menu">
                    <input type="checkbox"/>
                </label>
                <div class="mobile-sidebar">
                    <nav>
                        <div><a href="home" class="menu-link">Home</a></div>
                        <div><a href="profile" class="menu-link">Profile</a></div>
                        <div><a href="about" class="menu-link">About</a></div>
                    </nav>
                </div>
                <h1>MEALMAGIC</h1>
            </div>
        </div>
        <div class="main-content">
            <div class="header">
                <div id="upper-header">
                    <form method="POST" action="handleRecipes" id="ingredientsForm">
                        <input type="text" id="search-bar" name="search" placeholder="Enter ingredients here" autocomplete="off">
                        <button type="button" id="addIngredientBtn">Add</button>
                        <button type="button" id="deleteIngredientBtn">Delete</button>

                        <input type="hidden" id="hiddenIngredients">
                        <button type="button" id="searchRecipesBtn">Search</button>
                    </form>
                    <div id="avatar" class="avatar">
                        <a href="/profile">
                            <img src="<?php echo $avatar == '/public/img/profile-basic.jpg' ? $avatar : '/public/uploads/' . $avatar; ?>" alt="" id='profile-avatar'>
                            <span id="user-name"><?php echo $_SESSION["name"]; ?></span>
                        </a>
                    </div>
                </div>
                <div id="addedIngredients"></div>
            </div>
            <div class="section">
                <div class="recipes">
                    <h3>Recipes suggested for you</h3>
                    <div class="cards">
                       
                    </div>
                </div>
                <div class="trending">
                    <h3>Trending</h3>
                    <div class="cards">
                        
                    </div>
                </div>
                <dialog id="recipe-dialog" class="recipe-dialog">
                    <div class="dialog-content">
                        <div class="dialog-header">
                            <h3 id="recipeTitle">Recipe 1</h3>
                        </div>
                        <div class="dialog-body">
                            <img id="recipeImage" src="" alt="">
                            <div class="dialog-info">
                                <p id="recipeInstructions">
                                </p>
                                <div class="dialog-details">
                                    <p id="recipeTime"></p>
                                    <p id="recipeServings"></p>
                                </div>
                            </div>
                        </div>
                        <div class="dialog-footer">
                            <button class="close-btn">Close</button>
                        </div>
                    </div>
                </dialog>
            </div>
        </div>
    </div>
</body>
</html>