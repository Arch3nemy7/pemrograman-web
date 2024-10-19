<?php
session_start();
include './library/connection.php';
$errorMessage = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mencari data pelanggan
    $sql = "SELECT id_pelanggan, 'pelanggan' AS role FROM pelanggan WHERE email_pelanggan = '$email' AND katasandi_pelanggan = '$password'";

    // Query untuk mencari data staff
    $sql .= " UNION ALL SELECT id_staff, role FROM staff WHERE email_staff = '$email' AND katasandi_staff = '$password'";

    $result = pg_query($conn, $sql);

    if (pg_num_rows($result) == 1) {
        $_SESSION['user_is_logged_in'] = true;
        $row = pg_fetch_assoc($result);
        if (isset($row['role'])) {
            if ($row['role'] == 'staff') {
                $_SESSION['id_staff'] = $row['id_staff'];
                header('Location: index3.php');
                exit();
            } elseif ($row['role'] == 'owner') {
                $_SESSION['id_staff'] = $row['id_staff'];
                header('Location: index4.php');
                exit();
            } else {
                $_SESSION['id_pelanggan'] = $row['id_pelanggan'];
                header('Location: index2.php');
                exit();
            }
        } else {
            $errorMessage = '<p>Failed to retrieve user ID.</p>';
        }
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
    <style>
        .container {
            max-width: 400px;
            width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ffffff;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .container h1 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid silver;
        }

        .container form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .input-field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .input-field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: 0.5s;
        }

        .input-field span::before {
            content: "";
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: rgba(250, 97, 91, 255);
            transition: 0.5s;
        }

        .input-field input:focus~label,
        .input-field input:valid~label {
            top: -5px;
            color: rgba(250, 97, 91, 255);
        }

        .input-field input:focus~span::before,
        .input-field input:valid~span::before {
            width: 100%;
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            margin-bottom: 10px;
            border: 1px solid;
            background: rgba(250, 97, 91, 255);
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        input[type="submit"]:hover {
            background: rgba(250, 96, 91, 0.800);
        }

        .signup-link {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .signup-link a {
            color: #2691d9;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
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
                <input type="text" name="email" id="email" required />
                <span></span>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" required />
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" name="btnLogin" id="btnLogin" value="Login" />
            <input type="submit" name="btnLogin" id="btnLogin" value="Kembali" onclick="window.location.href='index.php'" />
            <div class="signup-link">Belum punya akun? <a href="register.php">Daftar</a></div>
        </form>
    </div>
</body>

</html>