<?php
$level = $_SESSION['level'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SIAKAD</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">

                <?php if ($level == 'admin') { ?>
                    <li class="nav-item"><a class="nav-link" href="../dashboard/admin.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="../user/index.php">User</a></li>
                    <li class="nav-item"><a class="nav-link" href="../kompetensi/index.php">Kompetensi</a></li>
                    <li class="nav-item"><a class="nav-link" href="../guru/index.php">Guru</a></li>
                    <li class="nav-item"><a class="nav-link" href="../siswa/index.php">Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="../matpel/index.php">Mata Pelajaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="../nilai/index.php">Nilai</a></li>
                    <li class="nav-item"><a class="nav-link" href="../laporan/nilai.php">Laporan</a></li>
                <?php } ?>

                <?php if ($level == 'guru') { ?>
                    <li class="nav-item"><a class="nav-link" href="../dashboard/guru.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="../nilai/index.php">Input Nilai</a></li>
                    <li class="nav-item"><a class="nav-link" href="../laporan/nilai.php">Laporan Nilai</a></li>
                <?php } ?>

            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-warning">
                        <?= $_SESSION['username']; ?> (<?= ucfirst($level); ?>)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>