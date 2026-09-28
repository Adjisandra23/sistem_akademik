<?php include "../auth/cek_session.php";
if ($_SESSION['level'] != 'admin') {
    die("Akses ditolak!");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Dashboard Admin</h3>
        <p>Selamat datang, <?= $_SESSION['username']; ?></p>

        <a href="../kompetensi/index.php" class="btn btn-dark">Data
            Kompetensi</a>
        <a href="../guru/index.php" class="btn btn-dark">Data Guru</a>
        <a href="../siswa/index.php" class="btn btn-dark">Data Siswa</a>
        <a href="../matpel/index.php" class="btn btn-dark">Data Matpel</a>
        <a href="../nilai/index.php" class="btn btn-dark">Data Nilai</a>
        <br><br>
        <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>