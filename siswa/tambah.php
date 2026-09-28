<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Siswa</h3>

        <form method="post">

            <div class="mb-3">
                <label>Nis</label>
                <input type="text" name="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tgl. Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>No. HP</label>
                <input type="text" name="no_telepon" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>KD. Kompetensi</label>
                <input type="text" name="kd_kompetensi" class="form-control" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-success">
                Simpan
            </button>

            <a href="index.php" class="btn btn-secondary">
                Kembali
            </a>

        </form>

        <?php
        if (isset($_POST['simpan'])) {

            $nis         = $_POST['nis'];
            $nama_siswa   = $_POST['nama_siswa'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir   = $_POST['tgl_lahir'];
            $alamat      = $_POST['alamat'];
            $no_telepon  = $_POST['no_telepon'];
            $kd_kompetensi  = $_POST['kd_kompetensi'];

            mysqli_query($conn, "INSERT INTO siswa 
                (nis, nama_siswa, tempat_lahir, tgl_lahir, alamat, no_telepon, kd_kompetensi)
                VALUES 
                ('$nis', '$nama_siswa', '$tempat_lahir', '$tgl_lahir', '$alamat', '$no_telepon', '$kd_kompetensi')
            ");

            echo "<script>
                    alert('Data berhasil disimpan');
                    location='index.php';
                  </script>";
        }
        ?>

    </div>
</body>

</html>