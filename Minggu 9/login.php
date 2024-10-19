<?php
session_start();
$errorMessage = '';
if (isset($_POST['user_id']) && isset($_POST['user_password'])) {
    include './library/connection.php';
    $user_id = $_POST['user_id'];
    $user_password = $_POST['user_password'];

    $sql = "SELECT user_id, user_nrp FROM tbl_auth_user WHERE user_id = '$user_id' AND user_password = '$user_password'";
    $result = pg_query($conn, $sql);

    if (pg_num_rows($result) == 1) {
        $_SESSION['user_is_logged_in'] = true;
        $row = pg_fetch_assoc(pg_query($conn, $sql));
        $_SESSION['nrp'] = $row['user_nrp'];
        header('Location:index.php');
        exit();
    } else {
        $errorMessage = '<p>Username or password is incorrect.</p>';
    }
    pg_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Basic Login</title>
</head>

<body>
    <?php
    if ($errorMessage != '') {
    ?>
        <p align="center"><strong>
                <font color="#990000"><?php echo $errorMessage; ?></font>
            </strong></p>
    <?php
    }
    ?>
    <div action="" method="post" name="frmlogin" id="frmlogin" class="container">
        <h1>Login</h1>
        <form method="post">
            <div class="input-field">
                <input type="text" name="user_id" id="user_id" required />
                <span></span>
                <label>Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="user_password" id="user_password" required />
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" name="btnLogin" id="btnLogin" value="Login" />
            <div class="signup-link">Don't have an account? <a href="register.php">Signup</a></div>
        </form>
    </div>
</body>

</html>