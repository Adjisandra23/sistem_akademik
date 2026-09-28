<?php
include "../auth/cek_session.php";
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kompetensi</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Kompetensi</h3>

        <form method="post">
            <div class="mb-3">
                <label>Kode Kompetensi</label>
                <input type="text" name="kd_kompetensi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Kompetensi</label>
                <input type="text" name="nama_kompetensi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Program Keahlian</label>
                <input type="text" name="prog_keahlian" class="form-control" required>
            </div>

            <button name="simpan" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            mysqli_query($conn, "INSERT INTO kompetensi VALUES ( 
        '$_POST[kd_kompetensi]', 
        '$_POST[nama_kompetensi]', 
        '$_POST[prog_keahlian]' 
    )");
            echo "<script>alert('Data berhasil disimpan');location='index.php';</script>";
        }
        ?>
    </div>
</body>

</html>