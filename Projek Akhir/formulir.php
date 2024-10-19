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
    // Data tabel hewan
    $nama_peliharaan = $_POST['nama_peliharaan'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $id_pelanggan = $_SESSION['id_pelanggan']; // Ambil ID pelanggan dari sesi
    $catatan = $_POST['catatan'];

    // Data tabel penitipan
    $status_penitipan = 'Berlangsung'; // Mengatur status_penitipan secara default
    $id_staff = getRandomStaffId($conn); // Memanggil fungsi untuk mendapatkan id_staff secara acak

    // Data tabel penitipan_detail
    $id_layanan = $_POST['id_layanan'];

    // Memasukkan data ke dalam tabel hewan
    $sql_insert_hewan = "INSERT INTO hewan (nama_peliharaan, jenis_hewan, id_pelanggan, catatan) VALUES ('$nama_peliharaan', '$jenis_hewan', '$id_pelanggan', '$catatan') RETURNING id_peliharaan";
    $result_insert_hewan = pg_query($conn, $sql_insert_hewan);

    if ($result_insert_hewan) {
        // Mendapatkan ID peliharaan yang baru ditambahkan
        $id_peliharaan = pg_fetch_result($result_insert_hewan, 0, 0);

        // Memasukkan data ke dalam tabel penitipan
        $uploadDir = './files/';
        $fileName = $_FILES['userfile']['name'];
        $tmpName = $_FILES['userfile']['tmp_name'];
        $filePath = $uploadDir . $fileName;

        // simpan file ke folder upload
        $result = move_uploaded_file($tmpName, $filePath);

        $sql_insert_penitipan = "INSERT INTO penitipan (id_peliharaan, status_penitipan, id_staff, file_path) VALUES ('$id_peliharaan', '$status_penitipan', '$id_staff', '$filePath') RETURNING id_penitipan";
        $result_insert_penitipan = pg_query($conn, $sql_insert_penitipan);

        if ($result_insert_penitipan) {
            // Mendapatkan ID penitipan yang baru ditambahkan
            $id_penitipan = pg_fetch_result($result_insert_penitipan, 0, 0);

            // Menghitung total pembayaran
            $total_pembayaran = 0;

            // Memasukkan data ke dalam tabel penitipan_detail
            foreach ($id_layanan as $layanan) {
                // Mengambil harga_layanan dari tabel layanan
                $sql_get_harga_layanan = "SELECT harga_layanan FROM layanan WHERE id_layanan = $layanan";
                $result_get_harga_layanan = pg_query($conn, $sql_get_harga_layanan);
                $harga_layanan = pg_fetch_result($result_get_harga_layanan, 0);

                // Menyimpan total_pembayaran untuk setiap layanan
                $total_pembayaran += $harga_layanan;

                $sql_insert_penitipan_detail = "INSERT INTO penitipan_detail (id_penitipan, id_layanan, total_pembayaran) VALUES ('$id_penitipan', '$layanan', '$harga_layanan')";
                $result_insert_penitipan_detail = pg_query($conn, $sql_insert_penitipan_detail);

                if (!$result_insert_penitipan_detail) {
                    $errorMessage = '<p>Gagal memasukkan data ke dalam tabel penitipan_detail. Silakan coba lagi.</p>';
                    break;
                }
            }

            // Memasukkan data ke dalam tabel pembayaran setelah memasukkan data ke dalam penitipan_detail
            $status_pembayaran = 'Belum Lunas'; // Menetapkan status_pembayaran sebagai "Belum Lunas"
            $sql_insert_pembayaran = "INSERT INTO pembayaran (id_penitipan, total_pembayaran, status_pembayaran) VALUES ('$id_penitipan', '$total_pembayaran', '$status_pembayaran')";
            $result_insert_pembayaran = pg_query($conn, $sql_insert_pembayaran);

            if (!$result_insert_pembayaran) {
                $errorMessage = '<p>Gagal memasukkan data ke dalam tabel pembayaran. Silakan coba lagi.</p>';
            }

            if (empty($errorMessage)) {
                // Proses berhasil, redirect ke halaman lain atau tampilkan pesan sukses
                header('Location: index2.php');
                exit();
            }
        } else {
            $errorMessage = '<p>Gagal memasukkan data ke dalam tabel penitipan. Silakan coba lagi.</p>';
        }
    } else {
        $errorMessage = '<p>Gagal memasukkan data ke dalam tabel hewan. Silakan coba lagi.</p>';
    }

    header('Location: formulir.php');
}

// Fungsi untuk memilih id_staff secara acak
function getRandomStaffId($dbconn) {
  // Query untuk menghitung jumlah baris dan jumlah total gaji di tabel staff
  $count_query = "SELECT count(id_staff) AS total, sum(gaji_staff) AS sum FROM staff";
  // Baris ini membuat sebuah string yang berisi query SQL untuk menghitung jumlah baris dan jumlah total gaji di tabel staff. Query ini menggunakan fungsi agregat count dan sum untuk menghitung nilai tersebut dan memberi mereka alias total dan sum.

  // Eksekusi query dan dapatkan hasilnya
  $count_result = pg_query($dbconn, $count_query) or die('Query failed: ' . pg_last_error());
  // Baris ini mengirimkan query SQL ke database menggunakan koneksi yang diberikan oleh parameter $dbconn. Fungsi pg_query mengembalikan sebuah sumber daya yang berisi hasil query atau false jika terjadi kesalahan. Jika terjadi kesalahan, baris ini akan menampilkan pesan kesalahan dan menghentikan eksekusi fungsi.

  // Ambil nilai total dan sum dari hasil query
  $count_row = pg_fetch_assoc($count_result);
  $total = $count_row['total'];
  $sum = $count_row['sum'];
  // Baris ini menggunakan fungsi pg_fetch_assoc untuk mengambil satu baris dari hasil query sebagai sebuah array asosiatif. Array ini memiliki kunci yang sesuai dengan nama kolom atau alias dari query SQL. Baris ini kemudian menetapkan nilai total dan sum dari array tersebut ke variabel $total dan $sum.

  // Query untuk mengambil satu baris secara acak dari tabel staff dengan menggunakan gaji_staff sebagai bobot
  $select_query = "WITH CTE AS (
    SELECT random() * $sum AS R
  )
  SELECT * FROM (
    SELECT id_staff, sum(gaji_staff) OVER (ORDER BY id_staff) AS S, R
    FROM staff CROSS JOIN CTE
  ) Q WHERE S >= R ORDER BY id_staff LIMIT 1";
  // Baris ini membuat sebuah string yang berisi query SQL untuk mengambil satu baris secara acak dari tabel staff dengan menggunakan gaji_staff sebagai bobot. Query ini menggunakan beberapa fitur SQL seperti CTE (Common Table Expression), window function, CROSS JOIN, dan LIMIT. Saya akan menjelaskan logika query ini secara terpisah.

  // Eksekusi query dan dapatkan hasilnya
  $select_result = pg_query($dbconn, $select_query) or die('Query failed: ' . pg_last_error());
  // Baris ini sama dengan baris sebelumnya, hanya saja menggunakan query SQL yang berbeda.

  // Jika ada baris yang dikembalikan, ambil nilai id_staff dari baris tersebut
  if (pg_num_rows($select_result) > 0) {
    $select_row = pg_fetch_assoc($select_result);
    $id_staff = $select_row['id_staff'];
    // Baris ini menggunakan fungsi pg_num_rows untuk mengecek apakah ada baris yang dikembalikan oleh query SQL. Jika ya, maka baris ini menggunakan fungsi pg_fetch_assoc untuk mengambil satu baris dari hasil query sebagai sebuah array asosiatif. Baris ini kemudian menetapkan nilai id_staff dari array tersebut ke variabel $id_staff.

    // Kembalikan id_staff sebagai output fungsi
    return $id_staff;
    // Baris ini mengakhiri eksekusi fungsi dan mengembalikan nilai id_staff sebagai output fungsi.
  }
  else {
    // Jika tidak ada baris yang dikembalikan, kembalikan null sebagai output fungsi
    return null;
    // Baris ini mengakhiri eksekusi fungsi dan mengembalikan nilai null sebagai output fungsi.
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
    <title>Formulir Penitipan</title>
</head>

<body>
    <?php if ($errorMessage !== '') { ?>
        <p align="center">
            <strong>
                <font color="#990000"><?php echo $errorMessage; ?></font>
            </strong>
        </p>
    <?php } ?>
    <div class="container">
        <h1>Formulir Penitipan</h1>
        <form method="post" enctype="multipart/form-data">
            <!-- Input untuk tabel hewan -->
            <div class="input-field">
                <input type="text" name="nama_peliharaan" id="nama_peliharaan" required />
                <span></span>
                <label>Nama Peliharaan</label>
            </div>
            <div class="input-field">
                <input type="text" name="jenis_hewan" id="jenis_hewan" required />
                <span></span>
                <label>Jenis Hewan</label>
            </div>
            <div class="input-field">
                <input type="text" name="catatan" id="catatan" required />
                <span></span>
                <label>Catatan</label>
            </div>

            <!-- Input untuk tabel penitipan_detail -->
            <div class="input-field">
                <input type="checkbox" name="id_layanan[]" value="1" id="layanan1" />
                <label for="layanan1">Mandi</label>
            </div>
            <div class="input-field">
                <input type="checkbox" name="id_layanan[]" value="2" id="layanan2" />
                <label for="layanan2">Grooming</label>
            </div>
            <div class="input-field">
                <input type="checkbox" name="id_layanan[]" value="3" id="layanan2" />
                <label for="layanan3">Vaksinasi</label>
            </div>
            <div class="input-field">
                <input type="checkbox" name="id_layanan[]" value="4" id="layanan2" />
                <label for="layanan4">Pemeriksaan Kesehatan</label>
            </div>

            <!-- Tambahkan opsi checkbox lainnya sesuai kebutuhan -->
            <label for="layanan4">Foto Peliharaan</label>
            <input type="file" name="userfile"><br>
            <input type="submit" name="submit" id="submit" value="Submit" />
            <input type="submit" name="btnLogin" id="btnLogin" value="Kembali" onclick="window.location.href='index2.php'" />
        </form>
    </div>
</body>

</html>