<?php
session_start();
session_destroy();
header('Location: ../index.php');
echo "<script>alert('Logged Out');
window.location.href='../index.php';
</script>";
 ?>
