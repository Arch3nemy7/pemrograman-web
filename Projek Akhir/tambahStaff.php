<?php
session_start();
include './library/connection.php';

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {
    header('Location:login.php');
    exit();
}

if (isset($_SESSION['role']) && ($_SESSION['role'] === 'staff' || $_SESSION['role'] === 'owner')) {
    header('Location: index.php');
    exit();
}

$errorMessage = '';

if (isset($_POST['submit'])) {
    $nama_staff = $_POST['nama_staff'];
    $jabatan_staff = $_POST['jabatan_staff'];
    $gaji_staff = $_POST['gaji_staff'];
    $no_telepon_staff = $_POST['no_telepon_staff'];
    $email_staff = $_POST['email_staff'];
    $katasandi_staff = $_POST['katasandi_staff'];
    $role = $_POST['role'];

    $sql_insert_staff = "INSERT INTO staff (nama_staff, jabatan_staff, gaji_staff, no_telepon_staff, email_staff, katasandi_staff, role) 
                         VALUES ('$nama_staff', '$jabatan_staff', $gaji_staff, '$no_telepon_staff', '$email_staff', '$katasandi_staff', '$role')";
    $result_insert_staff = pg_query($conn, $sql_insert_staff);

    if ($result_insert_staff) {
        // Proses berhasil, redirect ke halaman lain atau tampilkan pesan sukses
        header('Location: staff.php');
        exit();
    } else {
        $errorMessage = '<p>Gagal menambahkan data staff. Silakan coba lagi.</p>';
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
            height: 800px;
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
            padding-bottom: 20px;
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

        .btn {
            width: 100%;
            height: 50px;
            border: none;
            outline: none;
            background-color: #2196f3;
            color: #fff;
            font-size: 18px;
            border-radius: 25px;
            cursor: pointer;
            margin: 10px 0;
        }

        .btn:hover {
            background-color: #33a1f5;
        }
    </style>
    <title>Tambah Staff</title>
</head>

<body>
    <div class="container">
        <h1>Tambah Staff</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php echo $errorMessage; ?>
            <div class="input-field">
                <input type="text" id="nama_staff" name="nama_staff" required>
                <label for="nama_staff">Nama Staff</label>
            </div>
            <div class="input-field">
                <input type="text" id="jabatan_staff" name="jabatan_staff" required>
                <label for="jabatan_staff">Jabatan Staff</label>
            </div>
            <div class="input-field">
                <input type="text" id="gaji_staff" name="gaji_staff" required>
                <label for="gaji_staff">Gaji Staff</label>
            </div>
            <div class="input-field">
                <input type="text" id="no_telepon_staff" name="no_telepon_staff" required>
                <label for="no_telepon_staff">No. Telepon Staff</label>
            </div>
            <div class="input-field">
                <input type="text" id="email_staff" name="email_staff" required>
                <label for="email_staff">Email Staff</label>
            </div>
            <div class="input-field">
                <input type="password" id="katasandi_staff" name="katasandi_staff" required>
                <label for="katasandi_staff">Kata Sandi Staff</label>
            </div>
            <div class="input-field">
                <input type="text" id="role" name="role" required>
                <label for="role">Role</label>
            </div>
            <input type="submit" name="submit" id="submit" value="Submit" />
            <input type="submit" name="btnLogin" id="btnLogin" value="Kembali" onclick="window.location.href='staff.php'" />
        </form>
    </div>
</body>

</html>