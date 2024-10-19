<?php
include './library/connection.php';

$id_pelanggan = $_GET['id_pelanggan'];

// Hapus data dari tabel pembayaran berdasarkan id_penitipan_detail yang terkait dengan penitipan
$sql_delete_pembayaran = "DELETE FROM pembayaran
                            WHERE id_penitipan IN (
                                SELECT id_penitipan
                                FROM penitipan_detail
                                WHERE id_penitipan IN (
                                  SELECT id_penitipan
                                  FROM penitipan
                                  WHERE id_peliharaan IN (
                                    SELECT id_peliharaan
                                    FROM hewan
                                    WHERE id_pelanggan = '$id_pelanggan'
                                  )
                                )
                              )";
$result_delete_pembayaran = pg_query($conn, $sql_delete_pembayaran);

// Hapus data dari tabel penitipan_detail berdasarkan id_penitipan
$sql_delete_penitipan_detail = "DELETE FROM penitipan_detail
                                    WHERE id_penitipan IN (
                                      SELECT id_penitipan
                                      FROM penitipan
                                      WHERE id_peliharaan IN (
                                        SELECT id_peliharaan
                                        FROM hewan
                                        WHERE id_pelanggan = '$id_pelanggan'
                                      )
                                    )";
$result_delete_penitipan_detail = pg_query($conn, $sql_delete_penitipan_detail);

// Hapus data dari tabel penitipan berdasarkan id_peliharaan yang terkait dengan hewan
$sql_delete_penitipan = "DELETE FROM penitipan
                             WHERE id_peliharaan IN (
                               SELECT id_peliharaan
                               FROM hewan
                               WHERE id_pelanggan = '$id_pelanggan'
                             )";
$result_delete_penitipan = pg_query($conn, $sql_delete_penitipan);

// Hapus data dari tabel hewan berdasarkan id_pelanggan
$sql_delete_hewan = "DELETE FROM hewan
                         WHERE id_pelanggan = '$id_pelanggan'";
$result_delete_hewan = pg_query($conn, $sql_delete_hewan);

if ($result_delete_penitipan && $result_delete_penitipan_detail && $result_delete_pembayaran && $result_delete_hewan) {
  echo "Data Berhasil Terhapus";
} else {
  echo "Gagal, Error : " . pg_last_error();
}

pg_close($conn);
header("location:pelanggan3.php");
