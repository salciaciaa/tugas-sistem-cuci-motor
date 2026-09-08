<?php
require "config.php"; $id=(int)$_GET['id'];
mysqli_query($conn,"DELETE FROM pelanggan WHERE id=$id");
header("Location: pelanggan.php"); exit;
?>