<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/public/css/home-style.css">
    <link rel="stylesheet" href="/public/css/profile-style.css">
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
        <div class="profile-container">
            <div class="profile-card">
                <img id="profile-avatar" src="/public/img/avatar1.svg" alt="avatar">
                <h2>John Snow</h2>
                <ul>
                    <li><a href="home"><img src="/public/img/settings.svg" alt="settings">Settings</a></li>
                    <li><a href="home"><img src="/public/img/BMI.svg" alt="BMI calculator">BMI Calculator</a></li>
                    <li><a href="home"><img src="/public/img/favourites.svg" alt="favourites recipes">Favourites recipes</a></li>
                    <li><a href="login" id="logoutBtn"><img src="/public/img/logout.svg" alt="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
