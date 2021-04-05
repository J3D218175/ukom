<?php
if(session_destroy()){
    echo '<script>window.location="'.$baseurl.'login.php"</script>';
} else {
    echo "Log out Gagal";
}
?>