<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/public/css/home-style.css">
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
                <input type="text" id="search-bar" name="search" placeholder="Enter ingredients here" autocomplete="off">
                <div class="avatar"></div>
                <span id="user-name">Kamil</span>
            </div>
            <div class="section">
                <div class="recipes">
                    <h3>Recipes suggested for you</h3>
                </div>
                <div class="trending">
                    <h3>Trending</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>