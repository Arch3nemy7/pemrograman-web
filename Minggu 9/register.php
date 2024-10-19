<?php
session_start();
include './library/connection.php';

if (isset($_POST['register'])) {
    $user_nrp = $_POST['nrp'];
    $user_id = $_POST['user_id'];
    $user_password = $_POST['user_password'];

    $sql_check = "SELECT user_nrp, user_id FROM tbl_auth_user WHERE user_nrp = '$user_nrp' AND user_id = '$user_id'";
    $result_check = pg_query($conn, $sql_check);

    if (pg_num_rows($result_check) > 0) {
        $errorMessage = '<p>NRP and Username already exists. Please choose a different one.</p>';
    } else {
        $sql_insert = "INSERT INTO tbl_auth_user (user_id, user_password, user_nrp) VALUES ('$user_id', '$user_password', '$user_nrp')";
        $result_insert = pg_query($conn, $sql_insert);

        if ($result_insert) {
            $_SESSION['user_is_logged_in'] = true;
            $sql = "SELECT user_id, user_nrp FROM tbl_auth_user WHERE user_id = '$user_id' AND user_password = '$user_password'";
            $result = pg_query($conn, $sql);
            $row = pg_fetch_assoc(pg_query($conn, $sql));
            $_SESSION['nrp'] = $row['user_nrp'];
            header('Location: index.php');
            exit();
        } else {
            $errorMessage = '<p>Failed to register user. Please try again.</p>';
        }
    }
}
pg_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Register</title>
</head>

<body>
    <?php if (isset($errorMessage)) { ?>
        <p align="center">
            <strong>
                <font color="#990000"><?php echo $errorMessage; ?></font>
            </strong>
        </p>
    <?php } ?>
    <div class="container">
        <h1>Register</h1>
        <form method="post">
            <div class="input-field">
                <input type="text" name="nrp" id="nrp" required />
                <span></span>
                <label>NRP</label>
            </div>
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
            <input type="submit" name="register" id="register" value="Register" />
            <div class="signup-link">Already have an account? <a href="login.php">Login</a></div>
        </form>
    </div>
</body>

</html>