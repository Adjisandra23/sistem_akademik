<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";

$data = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT * FROM guru WHERE nip='$_GET[id]'"
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

        <h3>Edit Guru</h3>

        <form method="post">

            <!-- NIP -->
            <div class="mb-3">
                <label>NIP</label>
                <input type="text"
                    class="form-control"
                    value="<?= $data['nip'] ?>"
                    readonly>
            </div>

            <!-- Nama Guru -->
            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text"
                    name="nama_guru"
                    value="<?= $data['nama_guru'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Tempat Lahir -->
            <div class="mb-3">
                <label>Tempat Lahir</label>
                <input type="text"
                    name="tempat_lahir"
                    value="<?= $data['tempat_lahir'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label>Tgl. Lahir</label>
                <input type="date"
                    name="tgl_lahir"
                    value="<?= $data['tgl_lahir'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label>Jenis Kelamin</label>

                <select name="jenkel" class="form-control" required>

                    <option value="">-- Pilih Jenis Kelamin --</option>

                    <option value="L"
                        <?= ($data['jenkel'] == 'L') ? 'selected' : '' ?>>
                        Laki-laki
                    </option>

                    <option value="P"
                        <?= ($data['jenkel'] == 'P') ? 'selected' : '' ?>>
                        Perempuan
                    </option>

                </select>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text"
                    name="alamat"
                    value="<?= $data['alamat'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- No HP -->
            <div class="mb-3">
                <label>No. HP</label>
                <input type="text"
                    name="no_hp"
                    value="<?= $data['no_hp'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Pendidikan Terakhir -->
            <div class="mb-3">
                <label>Pendidikan Terakhir</label>
                <input type="text"
                    name="pend_akhir"
                    value="<?= $data['pend_akhir'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Tombol -->
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

            mysqli_query($conn, "UPDATE guru SET

                nama_guru='$_POST[nama_guru]',
                tempat_lahir='$_POST[tempat_lahir]',
                tgl_lahir='$_POST[tgl_lahir]',
                jenkel='$_POST[jenkel]',
                alamat='$_POST[alamat]',
                no_hp='$_POST[no_hp]',
                pend_akhir='$_POST[pend_akhir]'

                WHERE nip='$_GET[id]'
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