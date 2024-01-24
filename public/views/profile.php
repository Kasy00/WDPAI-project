<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: login");
        exit();
    }

    if (isset($_SESSION["avatar"])) {
        $avatar = $_SESSION["avatar"];
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
    <link rel="stylesheet" href="/public/css/profile-style.css">
    <script src="/public/scripts/profile.js" defer></script>
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
                <button id="profile-avatar-btn">
                    <img src="<?php echo $avatar == '/public/img/profile-basic.jpg' ? $avatar : '/public/uploads/' . $avatar; ?>" alt="" id='profile-avatar'>
                </button>
                <div class="messages">
                        <?php 
                            if(isset($messages)){
                                foreach ($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                </div>
                <h2 class="user-info"><?php echo $_SESSION["name"] . " " . $_SESSION["surname"]; ?> <br>BMI: <?php echo $_SESSION["bmi"]; ?></h2>
                <ul>
                    <li><a href="home"><img src="/public/img/settings.svg" alt="settings">Settings</a></li>
                    <li><a id="bmiBtn"><img src="/public/img/BMI.svg" alt="BMI calculator">BMI Calculator</a></li>
                    <li><a href="home"><img src="/public/img/favourites.svg" alt="favourites recipes">Favourites recipes</a></li>
                    <li><a href="/logout" id="logoutBtn"><img src="/public/img/logout.svg" alt="logout">Logout</a></li>
                </ul>
            </div>
            <dialog id="bmi-dialog">
                <form action="calculateBMI" method="POST" id="BMI-form">
                    <input type="number" id="height" name="height" min=1 placeholder="HEIGHT">
                    <input type="number" id="weight" name="weight" min=1 placeholder="WEIGHT">
                    <button type="submit">Calculate BMI</button>
                </form>
            </dialog>
            <dialog id="photo-dialog">
                <form action="addAvatar" method="POST" id="avatar-form" ENCTYPE="multipart/form-data">
                    <input type="file" name="profile-picture" id="profile-picture">
                    <button type="submit">Set avatar</button>
                </form>
            </dialog>
        </div>
    </div>
</body>
</html>
