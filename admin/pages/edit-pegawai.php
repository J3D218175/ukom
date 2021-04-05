<?php
$error ='';
$pid = $_GET['pid'];
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji'];
    $lembur = $_POST['lembur'];
    $rek = $_POST['rek'];
    if(!empty($nama) && !empty($gaji) && !empty($lembur) && !empty($rek)){
        if(upPegawai($pid, $nama, $gaji, $lembur, $rek)){
            echo '<script>window.location="'.$adminurl.'index.php?"</script>';
        } else {
            $error = 'Terjadi kesalahan saat mmengedit data';
        }
    } else {
        $error = 'Seluruh daata harap diisi!';
    }
}
 
$getPegawai = getPegawaiPerId($pid);
while($row=mysqli_fetch_assoc($getPegawai)){
    $p_nama = $row['nama'];
    $p_gaji = $row['gaji'];
    $p_lembur = $row['lembur'];
    $p_rek = $row['rek'];
 
?>
<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Data Pegawai</h1>
            </div>
        </div>
 
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?=$p_nama?>" placeholder="<?php echo $p_nama;?>">
            </div>

            <div class="form-group">
                <label for="gaji">Gaji</label>
                <input type="text" class="form-control" name="gaji" id="gaji" value="<?=$p_gaji?>" placeholder="<?php echo $p_gaji;?>">
            </div>

            <div class="form-group">
                <label for="lembur">Bonus Uang Lembur</label>
                <input type="text" class="form-control" name="lembur" id="lembur" value="<?=$p_lembur?>" placeholder="<?php echo $p_lembur;?>">
            </div>

            <div class="form-group">
                <label for="rek">No rekening</label>
                <input type="text" class="form-control" name="rek" id="rek" value="<?=$p_rek?>" placeholder="<?php echo $p_rek;?>">
            </div>

            <div class="checkbox">
                <p><?=$error;?></p>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">Update Pegawai</button>
            </div>
    </form>
<?php }?> 
</div>
</div>