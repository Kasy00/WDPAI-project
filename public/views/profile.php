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
                <li><img class="sidebar-btn" src="/public/img/home.svg" alt="home button">Home</li>
                <li><img class="sidebar-btn" src="/public/img/profile.svg" alt="profile button">Profile</li>
                <li><img class="sidebar-btn" src="/public/img/about.svg" alt="about button">About</li>
            </ul>
            <div class="mobile-menu">
                <label class="hamburger-menu">
                    <input type="checkbox"/>
                </label>
                <div class="mobile-sidebar">
                    <nav>
                        <div>Home</div>
                        <div>Profile</div>
                        <div>About</div>
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
                    <li><img src="/public/img/settings.svg" alt="settings">Settings</li>
                    <li><img src="/public/img/BMI.svg" alt="BMI calculator">BMI Calculator</li>
                    <li><img src="/public/img/favourites.svg" alt="favourites recipes">Favourites recipes</li>
                    <li><img src="/public/img/logout.svg" alt="logout">Logout</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
