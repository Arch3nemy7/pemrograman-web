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
    <title>Edit Data Penitipan</title>
</head>

<body>
    <div>
        <?php
        include './library/connection.php';
        $id_penitipan = $_GET['id_penitipan'];
        $sql = "SELECT DISTINCT p.id_penitipan, pl.id_pelanggan, pl.nama_pelanggan, h.nama_peliharaan, h.jenis_hewan, p.status_penitipan, s.nama_staff, h.catatan, py.status_pembayaran, py.total_pembayaran
                FROM penitipan p
                JOIN hewan h ON p.id_peliharaan = h.id_peliharaan
                JOIN pelanggan pl ON h.id_pelanggan = pl.id_pelanggan
                JOIN staff s ON p.id_staff = s.id_staff
                JOIN penitipan_detail pd ON p.id_penitipan = pd.id_penitipan
                JOIN pembayaran py ON p.id_penitipan = py.id_penitipan
                WHERE p.id_penitipan = '$id_penitipan'";
        $result = pg_query($conn, $sql);
        while ($row = pg_fetch_assoc($result)) {
        ?>
            <div class="wrapper">
                <div class="title">
                    Edit Data Penitipan
                </div>
                <div class="form">
                    <form method="post" action="update4.php">
                        <div class="input-field">
                            <label>ID Penitipan</label>
                            <input type="text" name="new_id_penitipan" class="input" value="<?php echo $row['id_penitipan']; ?>">
                            <input type="hidden" name="old_id_penitipan" value="<?php echo $row['id_penitipan']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" class="input" value="<?php echo $row['nama_pelanggan']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Nama Peliharaan</label>
                            <input type="text" name="nama_peliharaan" class="input" value="<?php echo $row['nama_peliharaan']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Jenis Hewan</label>
                            <input type="text" name="jenis_hewan" class="input" value="<?php echo $row['jenis_hewan']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Status Penitipan</label>
                            <input type="text" name="status_penitipan" class="input" value="<?php echo $row['status_penitipan']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Staff</label>
                            <input type="text" name="nama_staff" class="input" value="<?php echo $row['nama_staff']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Catatan</label>
                            <textarea name="catatan" class="textarea"><?php echo $row['catatan']; ?></textarea>
                        </div>
                        <div class="input-field">
                            <label>Status Pembayaran</label>
                            <input type="text" name="status_pembayaran" class="input" value="<?php echo $row['status_pembayaran']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Total Pembayaran</label>
                            <input type="text" name="total_pembayaran" class="input" value="<?php echo $row['total_pembayaran']; ?>">
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Submit" class="button">
                        </div>
                    </form>
                    <a href="pelanggan4.php"><button class="button">Kembali</button></a>
                </div>
            </div>
        <?php
        }
        pg_close($conn);
        ?>
    </div>
</body>

</html>