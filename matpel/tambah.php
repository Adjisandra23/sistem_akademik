<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Matpel</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">

        <h3>Tambah Mata Pelajaran</h3>

        <form method="post">

            <!-- Kode Matpel -->
            <div class="mb-2">
                <label>Kode Matpel</label>
                <input
                    type="text"
                    name="kd_matpel"
                    class="form-control"
                    placeholder="Kode Matpel"
                    required>
            </div>

            <!-- Nama Matpel -->
            <div class="mb-2">
                <label>Nama Matpel</label>
                <input
                    type="text"
                    name="nama_matpel"
                    class="form-control"
                    placeholder="Nama Matpel"
                    required>
            </div>

            <!-- Jumlah Jam -->
            <div class="mb-2">
                <label>Jumlah Jam</label>
                <input
                    type="number"
                    name="jumlah_jam"
                    class="form-control"
                    placeholder="Jumlah Jam"
                    required>
            </div>

            <!-- Tingkat -->
            <div class="mb-2">
                <label>Tingkat</label>
                <input
                    type="text"
                    name="tingkat"
                    class="form-control"
                    placeholder="Tingkat"
                    required>
            </div>

            <!-- Kompetensi -->
            <div class="mb-3">
                <label>Kompetensi</label>

                <select name="kd_kompetensi" class="form-control" required>

                    <option value="">
                        -- Pilih Kompetensi --
                    </option>

                    <?php

                    $q = mysqli_query(
                        $conn,
                        "SELECT * FROM kompetensi"
                    );

                    while ($k = mysqli_fetch_assoc($q)) {

                    ?>

                        <option value="<?= $k['kd_kompetensi'] ?>">
                            <?= $k['nama_kompetensi'] ?>
                        </option>

                    <?php
                    }
                    ?>

                </select>

            </div>

            <!-- Guru -->
            <div class="mb-3">
                <label>Guru</label>

                <select name="nip" class="form-control" required>

                    <option value="">
                        -- Pilih Guru --
                    </option>

                    <?php

                    $q = mysqli_query(
                        $conn,
                        "SELECT * FROM guru"
                    );

                    while ($g = mysqli_fetch_assoc($q)) {

                    ?>

                        <option value="<?= $g['nip'] ?>">
                            <?= $g['nama_guru'] ?>
                        </option>

                    <?php
                    }
                    ?>

                </select>

            </div>

            <!-- Tombol -->
            <button
                type="submit"
                name="simpan"
                class="btn btn-success">
                Simpan
            </button>

            <a
                href="index.php"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>


        <?php

        if (isset($_POST['simpan'])) {

            $kd_matpel      = $_POST['kd_matpel'];
            $nama_matpel    = $_POST['nama_matpel'];
            $jumlah_jam     = $_POST['jumlah_jam'];
            $tingkat        = $_POST['tingkat'];
            $kd_kompetensi  = $_POST['kd_kompetensi'];
            $nip            = $_POST['nip'];

            mysqli_query($conn, "INSERT INTO matpel
                (kd_matpel, nama_matpel, jumlah_jam, tingkat, kd_kompetensi, nip)
                VALUES
                ('$kd_matpel',
                 '$nama_matpel',
                 '$jumlah_jam',
                 '$tingkat',
                 '$kd_kompetensi',
                 '$nip')
            ");

            echo "<script>
                    alert('Data tersimpan');
                    location='index.php';
                  </script>";
        }

        ?>

    </div>

</body>

</html>