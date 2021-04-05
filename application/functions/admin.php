<?php

date_default_timezone_set("Asia/Jakarta");

function getUserData($user) {
    $user = escape($user);
    $query = "SELECT * FROM staff_tb WHERE user='$user'";
    return result($query);
}

function userlogin($user,$password){
    $query = "SELECT user, password FROM staff_tb WHERE user = '$user' AND password = '$password'";
    global $link;
    if ($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) != 0) return true;
        else return false;
    }
}

function listJabatan(){
    $query = "SELECT * from jabatan";
    return result($query);
}

function listPegawai(){
    $query = "SELECT nama from staff_tb where jabatan = 'Pegawai'";
    return result($query);
}

function tambahAkun($nama,$user,$password,$jabatan){
    $query = "INSERT INTO staff_tb(nama, user, password, jabatan) VALUES('$nama','$user','$password','$jabatan')";
    return run($query);
}

function tambahPegawai($nama, $gaji, $lembur, $rek){
    $query = "INSERT INTO pegawai_tb(nama, gaji, lembur, rek) VALUES('$nama','$gaji', '$lembur','$rek')";
    return run($query);
}

function kosongabsen(){
    $query = "TRUNCATE TABLE absensi";
    return run($query);
}

function emptyabsen(){
    $query = "TRUNCATE TABLE harian";
    return run($query);
}

function upPegawai($pid,$nama,$gaji, $lembur, $rek){
    $query = "UPDATE pegawai_tb SET nama='$nama',gaji='$gaji', lembur='$lembur,', rek='$rek' WHERE p_id='$pid'";
    return run($query);
}

function upAbsen($aid,$bulan,$hari,$cuti,$izin){
    $query = "UPDATE absensi SET bulan = '$bulan', hari_kerja = '$hari', cuti = '$cuti', izin = '$izin' WHERE aid='$aid'";
    return run($query);
}

function upAkun($sid,$nama,$user,$password,$jabatan){
    $query = "UPDATE staff_tb SET nama = '$nama', user = '$user', password = '$password', jabatan = '$jabatan' where s_id=$sid";
    return run($query);
}

function hapuspegawai($pid){
    $query = "DELETE FROM pegawai_tb where p_id = $pid";
    return run($query);
}

function getAbsenAdmin(){
    $query = "SELECT COUNT(*) AS jumlah FROM absensi";
    $jmlh  = result($query);
    $totalsoal = $jmlh->fetch_assoc();
    return $totalsoal['jumlah'];
}

function countDaily(){
    $query = "SELECT COUNT(*) AS jumlah FROM harian";
    $jmlh  = result($query);
    $totalsoal = $jmlh->fetch_assoc();
    return $totalsoal['jumlah'];
}

function getDaily(){
    $query = "SELECT * FROM harian";
    return result($query);
}
function tambahAbsensiBaru($bulan,$hari,$cuti,$izin){
    $query2 = "DELETE FROM absen_pegawai WHERE bulan ='$bulan'";
    $jalan = run($query2);
    $query = "INSERT INTO absensi(bulan, hari_kerja, cuti, izin) VALUES ('$bulan','$hari','$cuti','$izin')";
    return run($query);
}

function dailyconf($hari, $masuk, $keluar, $kerja){
    $query = "INSERT INTO harian (hari, masuk, keluar, kerja) values ('$hari', '$masuk', '$keluar', '$kerja')";
    return run($query);
}

function absenbulanan(){
    $query = "SELECT * FROM absensi";
    return result($query);
}

function getBulan($bulan)
{
    switch($bulan){
        case "1":
            return "Januari";
        break;
        case "2":
            return "Februari";
        break;
        case "3":
            return "Maret";
        break;
        case "4":
            return "April";
        break;
        case "5":
            return "Mei";
        break;
        case "6":
            return "Juni";
        break;
        case "7":
            return "Juli";
        break;
        case "8":
            return "Agustus";
        break;
        case "9":
            return "September";
        break;
        case "10":
            return "Oktober";
        break;
        case "11":
            return "November";
        break;
        case "12":
            return "Desember";
        break;
    }
}

function getDay($day)
{
    switch($day){
        case "0":
            return "Senin";
        break;
        case "1":
            return "Selasa";
        break;
        case "2":
            return "Rabu";
        break;
        case "3":
            return "Kamis";
        break;
        case "4":
            return "Jumat";
        break;
        case "5":
            return "Sabtu";
        break;
        case "6":
            return "Minggu";
        break;
    }
}

function getHour($h){
    switch($h){
        case '0':
            return '00.00';
            break;
        case '1':
            return '01.00';
            break;
        case '2':
            return '02.00';
            break;
        case '3':
            return '03.00';
            break;
        case '4':
            return '04.00';
            break;
        case '5':
            return '05.00';
            break;
        case '6':
            return '06.00';
            break;
        case '7':
            return '07.00';
            break;
        case '8':
            return '08.00';
            break;
        case '9':
            return '09.00';
            break;
        case '10':
            return '10.00';
            break;
        case '11':
            return '11.00';
            break;
        case '12':
            return '12.00';
            break;
        case '13':
            return '13.00';
            break;
        case '14':
            return '14.00';
            break;
        case '15':
            return '15.00';
            break;
        case '16':
            return '16.00';
            break;
        case '17':
            return '17.00';
            break;
        case '18':
            return '18.00';
            break;
        case '19':
            return '19.00';
            break;
        case '20':
            return '20.00';
            break;
        case '21':
            return '21.00';
            break;
        case '22':
            return '22.00';
            break;
        case '23':
            return '23.00';
            break;
        
    }
}

function absen($p_id, $nama, $bulan, $total_masuk, $tanggal_masuk){
    $query = "SELECT * from absen_pegawai where p_id = '$p_id'";
    $tot = result($query);
    while($row=mysqli_fetch_assoc($tot)){
        $cuti = $row['cuti'];
        $izin = $row['izin'];
        $total = $row['total_masuk'];
        $total = $total+1;
        $query2 = "DELETE FROM absen_pegawai WHERE bulan ='$bulan'";
        $jalan = run($query2);
        $query3 = "INSERT INTO absen_pegawai(nama, bulan, cuti, izin, total_masuk, tanggal_absen, p_id) VALUES ('$nama', '$bulan', '$cuti', '$izin', '$total','$tanggal_masuk', '$p_id')";
        $bisa = run($query3);
    }
}

function kerja($p_id, $nama, $masuk, $keluar, $lembur, $tanggal){
    $query = "INSERT INTO kerja( p_id, nama, masuk, keluar, lembur, tanggal) VALUES ('$p_id', '$nama', '$masuk', '$keluar', '$lembur', '$tanggal')";
    return run($query);
}

function cuti($p_id, $nama, $bulan, $total_masuk, $tanggal_masuk){
    $query = "SELECT * from absen_pegawai where p_id = '$p_id'";
    $tot = result($query);
    while($row=mysqli_fetch_assoc($tot)){
        $cuti = $row['cuti'];
        $izin = $row['izin'];
        $total = $row['total_masuk'];
        $cuti = $cuti+1;
        $query2 = "DELETE FROM absen_pegawai WHERE bulan ='$bulan'";
        $jalan = run($query2);
        $query3 = "INSERT INTO absen_pegawai(nama, bulan, cuti, izin, total_masuk, tanggal_absen, p_id) VALUES ('$nama', '$bulan', '$cuti', '$izin', '$total','$tanggal_masuk', '$p_id')";
        $bisa = run($query3);
        var_dump($bisa);
    }
}

function izin($p_id, $nama, $bulan, $total_masuk, $tanggal_masuk){
    $query = "SELECT * from absen_pegawai where p_id = '$p_id'";
    $tot = result($query);
    while($row=mysqli_fetch_assoc($tot)){
        $cuti = $row['cuti'];
        $izin = $row['izin'];
        $total = $row['total_masuk'];
        $izin = $izin+1;
        $query2 = "DELETE FROM absen_pegawai WHERE bulan ='$bulan'";
        $jalan = run($query2);
        $query3 = "INSERT INTO absen_pegawai(nama, bulan, cuti, izin, total_masuk, tanggal_absen, p_id) VALUES ('$nama', '$bulan', '$cuti', '$izin', '$total','$tanggal_masuk', '$p_id')";
        $bisa = run($query3);
    }
}

function absenbaru($pid, $jenis){
    $query = "SELECT * FROM pegawai_tb where p_id = '$pid'";
    $jalan = result($query);
    while($row=mysqli_fetch_assoc($jalan)){
        $nama = $row['nama'];
    }
    $bulan = getBulan(date('n'));
    $tanggal = $date = date('j');
    switch($jenis){
        case 'absen':
            $query = "INSERT INTO absen_pegawai(nama, bulan, cuti, izin, total_masuk, tanggal_absen, p_id) VALUES ('$nama','$bulan','0','0','1','$tanggal','$pid')";
            return run($query);
            break;
        case 'cuti':
            $query = "INSERT INTO absen_pegawai(nama, bulan, cuti, izin, total_masuk, tanggal_absen, p_id) VALUES ('$nama','$bulan','1','0','0','$tanggal','$pid')";
            return run($query);
            break;
        case 'izin':
            $query = "INSERT INTO absen_pegawai(nama, bulan, cuti, izin, total_masuk, tanggal_absen, p_id) VALUES ('$nama','$bulan','0','1','0','$tanggal','$pid')";
            return run($query);
            break;
    }
}

function getAbsenPegawai($pid){
    $query = "SELECT * from absen_pegawai where p_id = '$pid'";
    return result($query);
}

function getAbsenHarian($pid){
    $query = "SELECT * from kerja where p_id = '$pid'";
    return result($query);
}

function firstabsenbyPID($pid){
    $query = "SELECT COUNT(*) as absen from absen_pegawai where p_id = '$pid'";
    $jmlh = result($query);
    $total = $jmlh->fetch_assoc();
    return $total['absen'];
}

function mulaiabsen($tanggal,$pid){
    $query = "SELECT COUNT(*) as absen from kerja where tanggal = '$tanggal' and p_id = '$pid'";
    $jmlh = result($query);
    $total = $jmlh->fetch_assoc();
    return $total['absen'];
}


function getPid($user){
    $query = "SELECT nama from staff_tb where user='$user'";
    $res=result($query);
    while($row=mysqli_fetch_assoc($res)){
        $nama = $row['nama'];
        $query = "SELECT * from pegawai_tb where nama = '$nama'";
        return result($query);
    }
}
?>