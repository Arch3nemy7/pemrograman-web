<?php
session_start();
include './library/connection.php';
$errorMessage = '';

if (isset($_POST['register'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $no_telepon_pelanggan = $_POST['no_telepon_pelanggan'];
    $email_pelanggan = $_POST['email_pelanggan'];
    $katasandi_pelanggan = $_POST['katasandi_pelanggan'];

    $sql_check = "SELECT email_pelanggan, katasandi_pelanggan FROM pelanggan WHERE email_pelanggan = '$email_pelanggan' AND katasandi_pelanggan = '$katasandi_pelanggan'";
    $result_check = pg_query($conn, $sql_check);

    if (pg_num_rows($result_check) > 0) {
        $errorMessage = '<p>Email or Password already exists. Please choose a different one.</p>';
    } else {
        $sql_insert = "INSERT INTO pelanggan (nama_pelanggan, alamat_pelanggan, no_telepon_pelanggan, email_pelanggan, katasandi_pelanggan)VALUES ('$nama_pelanggan', '$alamat_pelanggan', '$no_telepon_pelanggan', '$email_pelanggan', '$katasandi_pelanggan')";
        $result_insert = pg_query($conn, $sql_insert);

        if ($result_insert) {
            $_SESSION['user_is_logged_in'] = true;
            $_SESSION['email_pelanggan'] = $email_pelanggan;
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
    <title>Daftar</title>
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
        <h1>Daftar</h1>
        <form method="post">
            <div class="input-field">
                <input type="text" name="nama_pelanggan" id="nama_pelanggan" required />
                <span></span>
                <label>Nama</label>
            </div>
            <div class="input-field">
                <input type="text" name="alamat_pelanggan" id="alamat_pelanggan" required />
                <span></span>
                <label>Alamat</label>
            </div>
            <div class="input-field">
                <input type="text" name="no_telepon_pelanggan" id="no_telepon_pelanggan" required />
                <span></span>
                <label>No. Telepon</label>
            </div>
            <div class="input-field">
                <input type="text" name="email_pelanggan" id="email_pelanggan" required />
                <span></span>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="katasandi_pelanggan" id="katasandi_pelanggan" required />
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" name="register" id="register" value="Register" />
            <input type="submit" name="btnLogin" id="btnLogin" value="Kembali" onclick="window.location.href='index.php'" />
            <div class="signup-link">Sudah punya akun? <a href="login.php">Login</a></div>
        </form>
    </div>
</body>

</html>