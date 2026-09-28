<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";

$data = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT * FROM siswa WHERE nis='$_GET[id]'"
));
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Guru</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">

        <h3>Edit Siswa</h3>

        <form method="post">

            <div class="mb-3">
                <label>NIS</label>
                <input type="text"
                    class="form-control"
                    value="<?= $data['nis'] ?>"
                    readonly>
            </div>

            <div class="mb-3">
                <label>Nama Siswa</label>
                <input type="text"
                    name="nama_siswa"
                    value="<?= $data['nama_siswa'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Tempat Lahir</label>
                <input type="text"
                    name="tempat_lahir"
                    value="<?= $data['tempat_lahir'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Tgl. Lahir</label>
                <input type="date"
                    name="tgl_lahir"
                    value="<?= $data['tgl_lahir'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text"
                    name="alamat"
                    value="<?= $data['alamat'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>No. HP</label>
                <input type="text"
                    name="no_telepon"
                    value="<?= $data['no_telepon'] ?>"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>KD. Kompetensi</label>
                <input type="text"
                    name="kd_kompetensi"
                    value="<?= $data['kd_kompetensi'] ?>"
                    class="form-control"
                    required>
            </div>

            <button type="submit"
                name="update"
                class="btn btn-success">
                Update
            </button>

            <a href="index.php"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>

        <?php

        if (isset($_POST['update'])) {

            mysqli_query($conn, "UPDATE siswa SET

                nama_siswa='$_POST[nama_siswa]',
                tempat_lahir='$_POST[tempat_lahir]',
                tgl_lahir='$_POST[tgl_lahir]',
                alamat='$_POST[alamat]',
                no_telepon='$_POST[no_telepon]',
                kd_kompetensi='$_POST[kd_kompetensi]'

                WHERE nis='$_GET[id]'
            ");

            echo "<script>
                    alert('Data berhasil diupdate');
                    location='index.php';
                  </script>";
        }

        ?>

    </div>

</body>

</html>