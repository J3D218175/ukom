<div id="page-wrapper">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Absensi</h1>
                </div>
            </div>

<?php
$error = '';
if(isset($_POST['submit'])){
    $bulan    = $_POST['bulan'];
    $hari    = $_POST['hari'];
    $cuti    = $_POST['cuti'];
    $izin    = $_POST['izin'];
 
    if(!empty($bulan) && !empty($hari) && !empty($cuti) && !empty($izin) ){
        $absensinow = getAbsenAdmin();
        if ($absensinow!=0){
            $bersihkan = kosongabsen();
        }
        $addabsensibaru = tambahAbsensiBaru($bulan,$hari, $cuti,$izin);
        echo '<script>window.location="'.$adminurl.'index.php?p=absensi"</script>';
    }
 
}
?>

        <table class="table table-bordered" style="text-align:center;">
            <?php
            $absensi = getAbsensiAdmin();
            while($row=mysqli_fetch_assoc($absensi)){
            ?>
            <thead>
                <tr>
                    <th style="text-align:center;">Bulan</th>
                    <td style="text-align:center;"><?php echo $row['bulan'];?></td>
                </tr>
                <tr>
                    <th style="text-align:center;">Hari kerja bulan ini</th>
                    <td style="text-align:center;"><?php echo $row['hari_kerja'] ?></td>
                </tr>
                <tr>
                    <th style="text-align:center;">Batas cuti</th>
                    <td style="text-align:center;"><?php echo $row['cuti'] ?></td>
                </tr>
                <tr>
                    <th style="text-align:center;">Batas izin</th>
                    <td style="text-align:center;"><?php echo $row['izin'] ?></td>
                </tr>
                <tr>
                    <td colspan="2"><a href="<?=$adminurl;?>index.php?p=edit-absensi&aid=<?=$row['aid'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <tr>
            <?php } ?>

            </thead>
        </table>

        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Absensi bulanan baru</h1>
                </div>
            </div>
            <input type="hidden" name="bulan" id="bulan" value="<?=$month = getBulan(date('n'))?>">

            <div class="form-group">
                <label for="hari">Hari kerja dalam sebulan:</label>
                <input type="text" class="form-control" id="hari" name="hari">
            </div>

            <div class="form-group">
                <label for="cuti">Batas cuti:</label>
                <input type="text" class="form-control" id="cuti" name="cuti">
            </div>

            <div class="form-group">
                <label for="izin">Batas izin:</label>
                <input type="text" class="form-control" id="izin" name="izin">
            </div>
 
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Buat Absensi Baru</button>
            </form>
 
        </div>
    </div>