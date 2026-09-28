<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Guru</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3>Tambah Guru</h3>

        <form method="post">

            <!-- NIP -->
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>

            <!-- Nama Guru -->
            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" required>
            </div>

            <!-- Tempat Lahir -->
            <div class="mb-3">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" required>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label>Tgl. Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenkel" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>

            <!-- No HP -->
            <div class="mb-3">
                <label>No. HP</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>

            <!-- Pendidikan Terakhir -->
            <div class="mb-3">
                <label>Pendidikan Terakhir</label>
                <input type="text" name="pend_akhir" class="form-control" required>
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

            $nip         = $_POST['nip'];
            $nama_guru   = $_POST['nama_guru'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir   = $_POST['tgl_lahir'];
            $jenkel      = $_POST['jenkel'];
            $alamat      = $_POST['alamat'];
            $no_hp       = $_POST['no_hp'];
            $pend_akhir  = $_POST['pend_akhir'];

            mysqli_query($conn, "INSERT INTO guru 
                (nip, nama_guru, tempat_lahir, tgl_lahir, jenkel, alamat, no_hp, pend_akhir)
                VALUES 
                ('$nip', '$nama_guru', '$tempat_lahir', '$tgl_lahir', '$jenkel', '$alamat', '$no_hp', '$pend_akhir')
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