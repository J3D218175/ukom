<?php
function result($query){
    global $link;
    if ($result = mysqli_query($link, $query) or die($query)){
        return $result;
    }
}
 
function run($query){
    global $link;
 
    if(mysqli_query($link, $query)) return true;
    else return false;
}
 
function excerpt($string){
    $string = substr($string, 0, 350);
    return $string . "...";
}
 
function escape($data){
    global $link;
    return mysqli_real_escape_string($link, $data);
}
function getJabatan($user){
    $query = "SELECT * FROM staff_tb WHERE user = '$user'";
    return result($query);
}

function getPegawai(){
    $query = "SELECT * FROM pegawai_tb";
    return result($query);
}

function getPegawaiLim($a,$b){
    $query = "SELECT * FROM pegawai_tb LIMIT $a, $b";
    return result($query);
}

function getPegawaiPerId($pid){
    $query = "SELECT * FROM pegawai_tb where p_id = '$pid'";
    return result($query);
}

function getAkunPerId($sid){
    $query = "SELECT * FROM staff_tb where s_id = $sid";
    return result($query);
}
function getAbsensiAdmin(){
    $query = "SELECT * FROM absensi";
    return result($query);    
}

function getAbsenDaily(){
    $query = "SELECT * FROM harian";
    return result($query);
}

function getAkun(){
    $query = "SELECT * FROM staff_tb";
    return result($query);
}

function getDataBulanan(){
    $query = "SELECT DISTINCT pegawai_tb.p_id, pegawai_tb.nama, absen_pegawai.total_masuk, absen_pegawai.cuti, absen_pegawai.izin, kerja.lembur,  pegawai_tb.gaji, pegawai_tb.rek
    FROM ((pegawai_tb INNER JOIN absen_pegawai on pegawai_tb.p_id = absen_pegawai.p_id) INNER JOIN kerja on pegawai_tb.p_id = kerja.p_id)";
    return result($query);
}

function getDataBulananByID($pid){
    $query = "SELECT DISTINCT pegawai_tb.p_id, pegawai_tb.nama, absen_pegawai.total_masuk, absen_pegawai.cuti, absen_pegawai.izin, kerja.lembur,  pegawai_tb.gaji, pegawai_tb.rek
    FROM ((pegawai_tb INNER JOIN absen_pegawai on pegawai_tb.p_id = absen_pegawai.p_id) INNER JOIN kerja on pegawai_tb.p_id = kerja.p_id) where pegawai_tb.p_id = '$pid'";
    return result($query);
}

function verif_user(){
    if (!empty($_SESSION['user'])){
        return TRUE;
    } else {
        echo "<script>alert('harap login terlebih dahulu')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
    }
}
?>