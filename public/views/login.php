<?php
    session_start();
    if(isset($_SESSION["email"])){
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="/public/scripts/script.js" defer></script>
    <title>MealMagic</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="front">
                <div class="logo">
                    <img src="/public/img/logo.png" alt="Logo">
                </div>
                <form action="login" method="POST">
                    <div class="messages">
                        <?php 
                            if(isset($messages)){
                                foreach ($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input type="email" name="email" id="email" placeholder="EMAIL" required>
                    <input type="password" name="password" id="password" placeholder="PASSWORD" required>
                    <div class="check">
                        <label>
                            <input type="checkbox">
                        Remember me
                        </label>
                        <a href=""><p>Forgot password?</p></a>
                    </div>
                    <button class="submit" id="submit" type="submit">Log in</button>
                </form>
                <p>or sign up using</p>
                <div class="icons">
                    <a href=""><img src="/public/img/facebook-icon.svg" alt="Facebook icon to login"></a>
                    <a href=""><img src="/public/img/gmail-icon.svg" alt="Gmail icon to login"></a>
                </div>
                <div class="bottom">
                    <p>Don't have an account?</p>
                    <button id="signup-btn" type="button">Sign up</button>
                </div>
            </div>
            <div class="back">
                <div class="logo">
                    <img src="/public/img/logo.png" alt="Logo">
                </div>
                <form action="register" method="POST">
                    <div class="messages">
                        <?php 
                            if(isset($messages)){
                                foreach ($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input type="text" name="first-name" id="first-name" placeholder="FIRST NAME" required>
                    <input type="text" name="last-name" id="last-name" placeholder="LAST NAME" required>
                    <input class="email" type="email" name="email-sign" id="email-sign" placeholder="EMAIL" required>
                    <input class="password" type="password" name="password-sign" id="password-sign" placeholder="PASSWORD" required>
                    <input class="password" type="password" name="password-repeat" id="password-repeat" placeholder="PASSWORD" required>
                    <button class="submit" id="submit-sign" type="submit">Sign up</button>
                </form>
                <div class="bottom">
                    <p>Already have an account?</p>
                    <button id="login-btn" type="button">Log in</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>