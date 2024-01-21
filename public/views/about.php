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
</head>
<body>

</body>
</html>
