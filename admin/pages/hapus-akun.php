<?php
$pid = $_GET['pid'];

$hapuspegawai = hapusakun($pid);
echo '<script>window.location="'.$adminurl.'"</script>';
