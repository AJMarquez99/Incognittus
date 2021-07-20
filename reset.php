<?php
require_once('defaults/connector_DB.php');
session_start();
if ( empty($_SESSION['user_id']) ) {
    header('Location: login.php');
}


if ( isset($_POST['reset']) ) {
    $user_id     = $_SESSION['user_id'];
    $n_password  = $_POST['new_password'];
    $na_password = $_POST['new_password_again'];

    if ( $n_password == $na_password ) {
        $set_password = password_hash( $na_password, PASSWORD_DEFAULT);
        $query = $conn->prepare("UPDATE employees SET p_key=:newpassword WHERE eid=:userid");
        $query->bindParam("userid", $user_id, PDO::PARAM_INT);
        $query->bindParam("newpassword", $set_password, PDO::PARAM_STR);
        $query->execute();
        
        unset($_SESSION['user_id']);
        header('Location: /index.php');
    } else {
        echo "Passwords do not match!";
    }
}
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Incognittus | Reset Password</title>
<link href="https://fonts.googleapis.com/css2?family=Lora&family=Questrial&family=Roboto&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="images/logo.png" sizes="32x32" />

<script src="https://kit.fontawesome.com/e207b4f781.js" crossorigin="anonymous"></script>
<link type="text/css" rel="stylesheet" href="css/master.css" >

</head>
<body id="login_page">
<div id="main_container" class="pre-main">
<div id="login_container">
        <div class="image-container">
            <img src="images/logo.png" alt="Incognittus Logo" />
        </div>
        <p>Please type in a password between 8-12 characters.</p>
        <form class="login-form" method="post" action="" name="Please Sign In">
            <input type="hidden" name="attempts" value="1" />
            <div class="input-container">
                <label>New Password: </label>
                <input type="password" name="new_password" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="input-container">
                <label>Retype New Password: </label>
                <input type="password" name="new_password_again" required />
            </div>
            <button type="submit" name="reset" value="reset" disabled>Reset</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/master.js"></script>
<script>

    $('input[name=new_password], input[name=new_password_again]').keyup( function() {
        let reset_button = $('button[name=reset]');
        if (this.value.length < 8 || this.value.length > 12) {
            $(this).css({'border-color': 'red'});
            reset_button.prop('disabled', true);
        } else {
            $(this).css({'border-color': 'green'});
            reset_button.prop('disabled', false);
        }
    });

    $('input[name=new_password_again]').keyup( function() {
        let data = $('input[name=new_password]').val();
        let reset_button = $('button[name=reset]');
        if ( this.value != data ){
            $(this).css({'border-color': 'red'});
            reset_button.prop('disabled', true);
        } else {
            $(this).css({'border-color': 'green'});
            reset_button.prop('disabled', false);
        }
    });

</script>
</body>
</html>

