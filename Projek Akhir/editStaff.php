<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <style>
        .wrapper {
            max-width: 500px;
            width: 100%;
            background: #fff;
            margin: 20px auto;
            padding: 30px;
            font-size: 0.9em;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .wrapper .title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: rgba(250, 97, 91, 255);
            text-transform: uppercase;
            text-align: center;
        }

        .wrapper .form {
            width: 100%;
        }

        .wrapper .form .input-field {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .wrapper .form .input-field label {
            width: 200px;
            color: #757575;
            margin-right: 10px;
            font-size: 14px;
        }

        .wrapper .form .input-field .input,
        .wrapper .form .input-field .textarea {
            width: 100%;
            outline: none;
            border: 1px solid #d5dbd9;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .wrapper .form .input-field .textarea {
            width: 100%;
            height: 125px;
            resize: none;
        }

        .wrapper .form .input-field .custom-select {
            position: relative;
            width: 100%;
            height: 37px;
        }

        .wrapper .form .input-field .custom-select:before {
            content: "";
            position: absolute;
            top: 12px;
            right: 10px;
            border: 8px solid;
            border-color: #d5dbd9 transparent transparent transparent;
            pointer-events: none;
        }

        .wrapper .form .input-field .custom-select select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            width: 100%;
            height: 100%;
            border: 0px;
            padding: 8px 10px;
            font-size: 15px;
            border: 1px solid #d5dbd9;
            border-radius: 3px;
        }

        .wrapper .form .input-field .input:focus,
        .wrapper .form .input-field .textarea:focus,
        .wrapper .form .input-field .custom-select select:focus {
            border: 1px solid rgba(250, 97, 91, 255);
        }

        .button {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 8px;
            font-size: 15px;
            border: 0px;
            background: rgba(250, 97, 91, 255);
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            outline: none;
        }

        .button:hover {
            background: rgba(250, 96, 91, 0.800);
        }

        .wrapper .form .input-field:last-child {
            margin-bottom: 0;
        }
    </style>
    <title>Edit Data Staff</title>
</head>

<body>
    <div>
        <?php
        include './library/connection.php';
        $id_staff = $_GET['id_staff'];
        $sql = "SELECT *
                FROM staff
                WHERE id_staff = '$id_staff'";
        $result = pg_query($conn, $sql);
        while ($row = pg_fetch_assoc($result)) {
        ?>
            <div class="wrapper">
                <div class="title">
                    Edit Data Staff
                </div>
                <div class="form">
                    <form method="post" action="updateStaff.php">
                        <div class="input-field">
                            <label>ID Staff</label>
                            <input type="text" name="new_id_staff" class="input" value="<?php echo $row['id_staff']; ?>">
                            <input type="hidden" name="old_id_staff" value="<?php echo $row['id_staff']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Nama Staff</label>
                            <input type="text" name="nama_staff" class="input" value="<?php echo $row['nama_staff']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Jabatan Staff</label>
                            <input type="text" name="jabatan_staff" class="input" value="<?php echo $row['jabatan_staff']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Gaji Staff</label>
                            <input type="text" name="gaji_staff" class="input" value="<?php echo $row['gaji_staff']; ?>">
                        </div>
                        <div class="input-field">
                            <label>No. Telepon Staff</label>
                            <input type="text" name="no_telepon_staff" class="input" value="<?php echo $row['no_telepon_staff']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Email Staff</label>
                            <input type="text" name="email_staff" class="input" value="<?php echo $row['email_staff']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Role</label>
                            <input type="text" name="role" class="input" value="<?php echo $row['role']; ?>">
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Submit" class="button">
                        </div>
                    </form>
                    <a href="staff.php"><button class="button">Kembali</button></a>
                </div>
            </div>
        <?php
        }
        pg_close($conn);
        ?>
    </div>
</body>

</html>