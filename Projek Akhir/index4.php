<?php
session_start();

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {
    header('Location:index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3a65de3b60.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Pet Care</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="brand-logo"><img src="./images/logo.jpg" alt="logo"></div>
            <div class="navbar-links">
                <nav>
                    <ul>
                        <div class="navbar-links-btn">
                            <a href="#beranda">
                                <li>Beranda</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="#layanan">
                                <li>Layanan</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="#dokter">
                                <li>Dokter</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="#kontak">
                                <li>Kontak</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="pelanggan4.php">
                                <li>Pelanggan</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="staff.php">
                                <li>Staff</li>
                            </a>
                        </div>
                    </ul>
                </nav>
            </div>
            <div class="navbar-button">
                <ul>
                    <div class="navbar-button-sign">
                        <li><a href="logout.php">Log Out<i class="fas fa-sharp fa-solid fa-arrow-right-from-bracket"></i></a></li>
                    </div>
                </ul>
            </div>
        </div>

        <div class="beranda" id="beranda">
            <div class="beranda-informasi">
                <div class="beranda-informasi-judul">
                    <h2>Kami akan merawat hewan peliharaan Anda dengan baik</h2>
                </div>
                <div class="beranda-informasi-teks">
                    <p>Kami adalah platform interaktif antara pemilik hewan peliharaan dan klinik
                        yang bertujuan untuk memudahkan penggunaan layanan klinik hewan peliharaan
                        serta proses perawatan dan administrasi klinik.</p>
                </div>
                <div class="beranda-informasi-button">
                    <a href="formulir.php">
                        <div class="beranda-informasi-button-registrasi">Jadwalkan Pertemuan</div>
                    </a>
                    <a href="#layanan">
                        <div class="beranda-informasi-button-layanan">Layanan Kami</div>
                    </a>
                </div>
            </div>
            <div class="beranda-gambar">
                <img src="./images/beranda.jpg" alt="gambar">
            </div>
        </div>

        <div class="layanan" id="layanan">
            <div class="layanan-informasi">
                <div class="layanan-informasi-teks">
                    <p>Layanan Kami</p>
                </div>
                <div class="layanan-informasi-judul">
                    <h2>Kami akan mengasuh hewan peliharaan Anda dengan penuh perhatian</h2>
                </div>
            </div>
            <div class="layanan-tabel">
                <table>
                    <tr>
                        <td>
                            <div class="item">
                                <img src="./images/logo1.jpg" alt="Logo 1">
                                <h3>Mandi</h3>
                                <p>Kami mandikan hewan peliharaan Anda dengan produk berkualitas dan pijatan lembut.
                                    Hewan peliharaan Anda akan terasa segar dan wangi setelah mandi di klinik kami.</p>
                                <p class="harga">Rp50.000</p>
                            </div>
                        </td>
                        <td>
                            <div class="item">
                                <img src="./images/logo2.jpg" alt="Logo 2">
                                <h3>Grooming</h3>
                                <p>Kami potong rambut, kuku, dan bulu mata hewan peliharaan Anda sesuai keinginan Anda.
                                    Kami gunakan alat steril dan profesional untuk hasil rapi dan cantik.</p>
                                <p class="harga">Rp100.000</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="item">
                                <img src="./images/logo3.jpg" alt="Logo 3">
                                <h3>Vaksinasi</h3>
                                <p>Kami berikan vaksin untuk mencegah penyakit hewan peliharaan Anda.
                                    Kami sesuaikan vaksin dengan usia dan kondisi hewan peliharaan Anda.
                                    Kami berikan sertifikat vaksinasi yang resmi dan berlaku.</p>
                                <p class="harga">Rp150.000</p>
                            </div>
                        </td>
                        <td>
                            <div class="item">
                                <img src="./images/logo4.jpg" alt="Logo 4">
                                <h3>Pemeriksaan Kesehatan</h3>
                                <p>Kami periksa kesehatan hewan peliharaan Anda dengan dokter hewan berpengalaman dan peralatan modern.
                                    Kami diagnosa masalah kesehatan hewan peliharaan Anda dengan akurat.
                                    Kami berikan saran dan resep obat yang tepat.</p>
                                <p class="harga">Rp200.000</p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="dokter" id="dokter">
            <div class="dokter-informasi">
                <div class="dokter-informasi-1">
                    <div class="dokter-informasi-teks">
                        <p>Dokter yang ahli</p>
                    </div>
                    <div class="dokter-informasi-foto">
                        <img src="./images/P1270008_3x4_Merah_091921.jpg" alt="Dokter">
                    </div>
                </div>
                <div class="dokter-informasi-2">
                    <div class="dokter-informasi-teks">
                        <h3>Andrey Pratama Gunawan</h3>
                        <p>Dokter spesialis hewan berukuran kecil dan medium</p>
                        <h3>Pendidikan</h3>
                        <p>Lulusan Universitas Airlangga tahun 2069</p>
                        <h3>Pengalaman</h3>
                        <p>20 Tahun</p>
                        <div class="dokter-informasi-button">
                            <a href="formulir.php">
                                <div class="dokter-informasi-button-registrasi">Jadwalkan Pertemuan</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="kontak" id="kontak">
            <div class="kontak-informasi">
                <div class="kontak-informasi-1">
                    <h2>Di mana kami?</h2>
                </div>
                <div class="kontak-informasi-2">
                    <div class="alamat">
                        <h3>Address:</h3>
                        <p>Jl. Pet Care No.123, Jakarta</p>
                    </div>
                    <div class="kontak-list">
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i> Nomor Telepon:</li>
                            <li><i class="fas fa-phone-alt"></i> (021) 12345678</li>
                        </ul>
                    </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d13314.588106431054!2d113.2493615785101!3d-7.189300059009255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMTAnNTYuNSJTIDExM8KwMTQnMjQuNCJF!5e0!3m2!1sid!2sid!4v1685202445224!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Start logo Area -->
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-row">
                    <div class="footer-col">
                        <!-- <h4>lorem</h4> -->
                        <img src="./images/logo_black.jpg" alt="Logo">
                        <!-- <ul>
                            <li><a href="#"></a></li>
                        </ul> -->
                        <p>Platform interaktif yang bertujuan untuk memudahkan penggunaan layanan klinik hewan peliharaan</p>
                    </div>
                    <div class="footer-col">
                        <h4>Alamat</h4>
                        <ul>
                            <li><a href="https://goo.gl/maps/9GZXkVWQRk9WtJBk8">Jl. Pet Care No.123, Jakarta</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Informasi</h4>
                        <ul>
                            <li><a href="#beranda">Beranda</a></li>
                            <li><a href="#layanan">Layanan</a></li>
                            <li><a href="#dokter">Dokter</a></li>
                            <li><a href="#kontak">Kontak</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Ikuti Kami</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>