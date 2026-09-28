<?php
include "../config/koneksi.php";
include "../auth/cek_session.php";
mysqli_query($conn, "DELETE FROM guru WHERE nip='$_GET[id]'");
header("location:index.php");
