<?php
require_once('defaults/connector_DB.php');
session_start();

if ( isset($_POST['login']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM employees WHERE u_name=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ( !$result ) {
        echo '<p class="error">Username and Password combination is incorrect.</p>';
    } else {
        if ( password_verify($password, $result['p_key']) || $result['p_key'] == "pleaseresetme" ) {
            $_SESSION['user_id'] = $result['eid'];
            if ( $result['p_key'] == "pleaseresetme" ) {
                header('Location: /reset.php');
            } else {
                header('Location: /index.php');
            }
        } else {
            echo '<p class="error">Password is incorrect.</p>';
        }
    }
}
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Incognittus | Admin Login</title>
<link href="https://fonts.googleapis.com/css2?family=Lora&family=Questrial&family=Roboto&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="imagesimages//logo.png" sizes="32x32" />
  

<script src="https://kit.fontawesome.com/e207b4f781.js" crossorigin="anonymous"></script>
<link type="text/css" rel="stylesheet" href="css/master.css" >

</head>
<body id="login_page">
<div id="main_container" class="pre-main">
<div id="login_container">
        <div class="image-container">
            <img src="images/logo.png" alt="Incognittus Logo" />
        </div>
        <form class="login-form" method="post" action="" name="Please Sign In">
            <input type="hidden" name="attempts" value="1" />
            <div class="input-container">
                <label>Username: </label>
                <input type="text" name="username" pattern="[a-zA-Z0-9]+" autocomplete="on" required />
            </div>
            <div class="input-container">
                <label>Password: </label>
                <input type="password" name="password" autocomplete="on" required />
            </div>
            <button type="submit" name="login" value="login">Login</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/master.js"></script>
</body>
</html>

