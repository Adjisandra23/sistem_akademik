<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data matpel
$query = mysqli_query(
    $conn,
    "SELECT * FROM matpel WHERE kd_matpel='$id'"
);

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Matpel</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">

        <h3>Edit Mata Pelajaran</h3>

        <form method="post">

            <!-- Kode Matpel -->
            <div class="mb-3">
                <label>Kode Matpel</label>

                <input
                    type="text"
                    class="form-control"
                    value="<?= $data['kd_matpel'] ?>"
                    readonly>
            </div>

            <!-- Nama Matpel -->
            <div class="mb-3">
                <label>Nama Matpel</label>

                <input
                    type="text"
                    name="nama_matpel"
                    value="<?= $data['nama_matpel'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Jumlah Jam -->
            <div class="mb-3">
                <label>Jumlah Jam</label>

                <input
                    type="number"
                    name="jumlah_jam"
                    value="<?= $data['jumlah_jam'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Tingkat -->
            <div class="mb-3">
                <label>Tingkat</label>

                <input
                    type="text"
                    name="tingkat"
                    value="<?= $data['tingkat'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- Kompetensi -->
            <div class="mb-3">
                <label>Kompetensi</label>

                <select
                    name="kd_kompetensi"
                    class="form-control"
                    required>

                    <option value="">
                        -- Pilih Kompetensi --
                    </option>

                    <?php

                    $q = mysqli_query(
                        $conn,
                        "SELECT * FROM kompetensi"
                    );

                    while ($k = mysqli_fetch_assoc($q)) {

                        $selected = ($k['kd_kompetensi'] == $data['kd_kompetensi'])
                            ? "selected"
                            : "";

                    ?>

                        <option
                            value="<?= $k['kd_kompetensi'] ?>"
                            <?= $selected ?>>

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

                <select
                    name="nip"
                    class="form-control"
                    required>

                    <option value="">
                        -- Pilih Guru --
                    </option>

                    <?php

                    $q = mysqli_query(
                        $conn,
                        "SELECT * FROM guru"
                    );

                    while ($g = mysqli_fetch_assoc($q)) {

                        $selected = ($g['nip'] == $data['nip'])
                            ? "selected"
                            : "";

                    ?>

                        <option
                            value="<?= $g['nip'] ?>"
                            <?= $selected ?>>

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
                name="update"
                class="btn btn-success">
                Update
            </button>

            <a
                href="index.php"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>


        <?php

        if (isset($_POST['update'])) {

            $nama_matpel   = $_POST['nama_matpel'];
            $jumlah_jam    = $_POST['jumlah_jam'];
            $tingkat       = $_POST['tingkat'];
            $kd_kompetensi = $_POST['kd_kompetensi'];
            $nip            = $_POST['nip'];

            $update = mysqli_query($conn, "UPDATE matpel SET

                nama_matpel='$nama_matpel',
                jumlah_jam='$jumlah_jam',
                tingkat='$tingkat',
                kd_kompetensi='$kd_kompetensi',
                nip='$nip'

                WHERE kd_matpel='$id'
            ");

            if ($update) {

                echo "<script>
                        alert('Data berhasil diupdate');
                        location='index.php';
                      </script>";
            } else {

                echo "<script>
                        alert('Data gagal diupdate');
                      </script>";
            }
        }

        ?>

    </div>

</body>

</html>