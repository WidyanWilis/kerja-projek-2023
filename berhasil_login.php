<?php
session_start();
include("./config.php");    
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="berhasil_login.css">
    <title>Berhasil Login</title>
</head>
<body>
    <div class="container-logout">
        <form action="logout.php" method="POST" class="login-email">
            <h1>Selamat Datang, Admin <?php echo $_SESSION['username']; ?>!</h1>
            <div class="input-group">
                <button type="submit" class="btn">Logout</button>
            </div>
        </form>
    </div>
<table class="table table-striped">
 <thead>
 <tr>
 <th>EMAIL</th>
 <th>NAMA</th>
 <th>NO.TELFON</th>
 <th>PESAN</th>
 <th>Tindakan</th>
 </tr>
 </thead>
 <tbody>
 <?php
$sql = "SELECT * FROM pesan";
$query = mysqli_query($db, $sql);

while ($fetch_pesan = mysqli_fetch_array($query)) {
    echo "<tr>";
    echo "<td>" . $fetch_pesan['email'] . "</td>";
    echo "<td>" . $fetch_pesan['nama'] . "</td>";
    echo "<td>" . $fetch_pesan['notelfon'] . "</td>";
    echo "<td>" . $fetch_pesan['pesan'] . "</td>";
    echo "<td>";
    echo "<a href='#' onclick='konfirmasiHapus(\"hapus.php?pesan=" . $fetch_pesan['pesan'] . "\")' class='btn btn-danger'>Hapus</a>";
    echo "</td>";
    echo "</tr>";
}
?>
<script>
    function konfirmasiHapus(url) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus?");
        if (konfirmasi) {
            window.location = url;
        }
    }
</script>

    </tbody>
    </table>
</body>
</html>