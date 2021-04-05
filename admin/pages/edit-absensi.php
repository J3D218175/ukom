<?php
$error ='';
$aid = $_GET['aid'];
if(isset($_POST['submit'])){
    $bulan    = $_POST['bulan'];
    $hari    = $_POST['hari'];
    $cuti    = $_POST['cuti'];
    $izin    = $_POST['izin'];
 
    if(!empty($bulan) && !empty($hari) && !empty($cuti) && !empty($izin) ){
        if(upAbsen($aid,$bulan,$hari,$cuti,$izin)){
            echo '<script>window.location="'.$adminurl.'index.php?p=absensi"</script>';
        } else {
            $error = 'Terjadi kesalahan saat mengedit data';
        }
    } else {
        $error = 'Seluruh data harap diisi!';
    }
}
 
$absensi = getAbsensiAdmin();
while($row=mysqli_fetch_assoc($absensi)){
    $a_bulan = $row['bulan'];
    $a_hari = $row['hari_kerja'];
    $a_cuti = $row['cuti'];
    $a_izin = $row['izin'];
 
?>
<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Data Absensi</h1>
            </div>
        </div>
        <form class="form-horizontal" action="" method="post">
        <input type="hidden" name="bulan" id="bulan" value="<?=$month = getBulan(date('n'))?>">
            <div class="form-group">
                <label for="hari">Hari kerja bulan ini</label>
                <input type="text" class="form-control" name="hari" id="hari" value="<?=$a_hari?>" placeholder="<?php echo $p_gaji;?>">
            </div>

            <div class="form-group">
                <label for="cuti">Batas cuti</label>
                <input type="text" class="form-control" name="cuti" id="cuti" value="<?=$a_cuti?>" placeholder="<?php echo $a_cuti;?>">
            </div>

            <div class="form-group">
                <label for="izin">Batas izin</label>
                <input type="text" class="form-control" name="izin" id="izin" value="<?=$a_izin?>" placeholder="<?php echo $a_izin;?>">
            </div>

            <div class="checkbox">
                <p><?=$error;?></p>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">Update Absensi</button>
            </div>
    </form>
<?php }?> 
</div>
</div>