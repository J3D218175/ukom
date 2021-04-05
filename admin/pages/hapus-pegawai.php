<?php
$pid = $_GET['pid'];

$hapuspegawai = hapuspegawai($pid);
echo '<script>window.location="'.$adminurl.'"</script>';
