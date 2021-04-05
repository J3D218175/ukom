<div id="page-wrapper">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Absensi harian</h1>
                </div>
            </div>

<?php
$error = '';
if(isset($_POST['submit'])){
    $hari    = $_POST['hari'];
    $masuk   = $_POST['masuk'];
    $keluar  = $_POST['keluar'];
    $kerja   = $keluar - $masuk;
 
    if(!empty($hari) && !empty($masuk) && !empty($keluar)){
        if ($kerja >0){
            $absensinow = countDaily();
            if ($absensinow!=0){
                $bersihkan = emptyabsen();
            }
            $addabsensibaru = dailyconf($hari, $masuk, $keluar, $kerja);
            echo '<script>window.location="'.$adminurl.'index.php?p=absensi-harian"</script>';
        } else {
            echo "<script type='text/javascript'>alert('Jam masuk dan keluar tidak valid');</script>";
        }
    }
 
}
?>

        <table class="table table-bordered" style="text-align:center;">
            <?php
            $absensi = getAbsenDaily();
            while($row=mysqli_fetch_assoc($absensi)){
            ?>
            <thead>
                <tr>
                    <th style="text-align:center;">Hari</th>
                    <td style="text-align:center;"><?php echo $row['hari'];?></td>
                </tr>
                <tr>
                    <th style="text-align:center;">Jam masuk hari ini</th>
                    <td style="text-align:center;"><?php echo $row['masuk'].' jam' ?></td>
                </tr>
                <tr>
                    <th style="text-align:center;">Jam keluar</th>
                    <td style="text-align:center;"><?php echo $row['keluar'].' jam' ?></td>
                </tr>
                <tr>
                    <th style="text-align:center;">Jam kerja</th>
                    <td style="text-align:center;"><?php echo $row['kerja'].' jam' ?></td>
                </tr>
            <?php } ?>

            </thead>
        </table>

        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Atur absensi harian</h1>
                </div>
            </div>
            <input type="hidden" name="hari" id="hari" value="<?=$day = getDay(date('w'))?>">

            <div class="form-group">
                <label for="masuk">Jam masuk:</label>
                <select name="masuk" class="form-control" id="masuk">
                    <option value="" selected="">--Pilih jam masuk--</option>
                    <?php
                        $loop = 1;
                        while($loop<24){
                    ?>
                    <option value="<?php echo $loop?>" selected="">--<?php echo getHour($loop);?>--</option>
                    <?php $loop++; }?>
                </select>
            </div>

            <div class="form-group">
                <label for="keluar">Jam keluar:</label>
                <select name="keluar" class="form-control" id="keluar">
                    <option value="" selected="">--Pilih jam keluar--</option>
                    <?php
                        $loop = 1;
                        while($loop<24){
                    ?>
                    <option value="<?php echo $loop?>" selected="">--<?php echo getHour($loop);?>--</option>
                    <?php $loop++; }?>
                </select>
            </div>
 
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Atur absensi</button>
            </form>
 
        </div>
    </div>