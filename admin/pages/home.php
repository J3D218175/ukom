<div id="page-wrapper">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pegawai</h1>
                </div>
            </div>

<?php
$error = '';

if(isset($_POST['submit'])){
    $nama    = $_POST['nama'];
    $gaji = $_POST['gaji'];
    $lembur = $_POST['lembur'];
    $rek   = $_POST['rek'];
 
    if(!empty($nama) && !empty($gaji) && !empty($lembur) && !empty($rek)){
        $addpegawai = tambahPegawai($nama,$gaji,$lembur,$rek);
        echo '<script>window.location="'.$adminurl.'index.php"</script>';
    } else {
            $error = 'ada masalah saat menambah data ';
    }
}

?>

        <table class="table table-bordered" style="text-align:center;">
            <thead>
                <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">Gaji Pokok</th>
                    <th style="text-align:center;">Bonus Uang Lembur (per jam)</th>
                    <th style="text-align:center;">Nomor Rekening</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urutan      = 1;
                $pegawai = getPegawai();
                while($row=mysqli_fetch_assoc($pegawai)){
                ?>
                <tr>
                    <td><?=$urutan++;?></td>
                    <td><?=$row['nama'];?></td>
                    <td><?=$row['gaji'];?></td>
                    <td><?=$row['lembur'];?></td>
                    <td><?=$row['rek'];?></td>
                    <td> <a href="<?=$adminurl;?>index.php?p=hapus-pegawai&pid=<?=$row['p_id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a> <a href="<?=$adminurl;?>index.php?p=edit-pegawai&pid=<?=$row['p_id'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pegawai Baru</h1>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Pilih pegawai:</label>
                <select name="nama" class="form-control" id="nama">
                    <option value="" selected="">--Pilih Pegawai--</option>
                    <?php
                    $datapegawai = listPegawai();
                    $a=0;
                    $b=0;
                    while($row=mysqli_fetch_assoc($datapegawai)) {
                        ${'namapegawai'.$a} = $row['nama'];
                        echo 'Calon Pegawai'.': '.${'namapegawai'.$a}.' <ar> ';
                        $pegawai = getPegawai();
                        $a++;
                    }
                    while($baris=mysqli_fetch_assoc($pegawai)){
                        ${'pegawaiexist'.$b} = $baris['nama'];
                        $b++;
                    }
                    $c=0;
                    while($c<=$a){
                        echo 'Calon Pegawai'.': '.${'namapegawai'.$c}.' <ar> ';
                        echo 'Pegawai'.': '.${'pegawaiexist'.$c}.' <br> '; 
                        if(${'namapegawai'.$c} != ${'pegawaiexist'.$c}){
                            echo "<option value=".${'namapegawai'.$c}.">".${'namapegawai'.$c}."</option>";
                        }
                        $c++;
                    }
                    ?>
                    </select>
            </div>

            <div class="form-group">
                <label for="gaji">Gaji Pokok:</label>
                <input type="text" class="form-control" id="gaji" name="gaji">
            </div>

            <div class="form-group">
                <label for="lembur">Bonus Uang Lembur:</label>
                <input type="text" class="form-control" id="lembur" name="lembur">
            </div>

            <div class="form-group">
                <label for="rek">Nomor Rekening:</label>
                <input type="text" class="form-control" id="rek" name="rek">
            </div>
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Tambah Pegawai</button>
            </form>
 
        </div>
    </div>