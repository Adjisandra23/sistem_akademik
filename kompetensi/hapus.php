<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
mysqli_query($conn, "DELETE FROM kompetensi WHERE kd_kompetensi='$_GET[id]'");
header("location:index.php");
