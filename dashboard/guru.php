<?php include "../auth/cek_session.php";
if ($_SESSION['level'] != 'guru') {
    die("Akses ditolak!");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Guru</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Dashboard Guru</h3>
        <p>Selamat datang, <?= $_SESSION['username']; ?></p>

        <a href="../nilai/index.php" class="btn btn-success">Input & Lihat Nilai</a>
        <br><br>
        <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>