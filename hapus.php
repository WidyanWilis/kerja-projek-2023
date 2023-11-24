<?php
include("config.php");
if( isset($_GET['pesan']) ){
    // ambil id dari query string
    $pesan = $_GET['pesan'];
    // buat query hapus
    $sql = "DELETE FROM pesan WHERE pesan='$pesan'";
    $query = mysqli_query($db, $sql);
    // apakah query hapus berhasil?
    if( $query ){
    header('Location: berhasil_login.php');
    exit();
    } else {
    die("gagal menghapus...");
    }
   } else {
    die("akses dilarang...");
   }
   ?>
   