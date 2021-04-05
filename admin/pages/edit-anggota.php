<?php
$error = '';
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $nama        = $_POST['nama'];
    $jabatan     = $_POST['jabatan'];
    $ttl         = $_POST['ttl'];
    $alamat      = $_POST['alamat'];
    $universitas = $_POST['universitas'];
    $divisi      = $_POST['divisi'];

    if(!empty(trim($nama)) && !empty(trim($jabatan)) && !empty(trim($universitas)) && !empty(trim($divisi))){
        if(updateAnggota($id, $nama, $jabatan, $universitas, $ttl, $alamat, $divisi)){
            echo '<script>window.location="'.$adminurl.'index.php?p=data-anggota"</script>';
        } else {
            $error = 'ada masalah saat menambah data'.mysqli_error($link);
        }
 
    }else{
        $error = 'data penting wajib diisi';
    }
 
}
 
// mengambil data anggota berdasarkan ID
$dataAnggotaPerId = getAnggotaPerId($id);
while($row=mysqli_fetch_assoc($dataAnggotaPerId)){
    $da_nama = $row['nama'];
    $da_jabatan = $row['jabatan'];
    $da_universitas = $row['universitas'];
    $da_ttl = $row['ttl'];
    $da_alamat = $row['alamat'];
    $da_divisi = $row['divisi'];
}

$no_array = array('0','1','2','3','4','5','6');
$i_head = array('Pengurus HMKI', 'HMKI Bidang Internal', 'HMKI Bidang Hub. Antar Lembaga', 'HMKI Bidang Pendidikan dan Budaya', 'HMKI Bidang Sosial dan Kepemudaan', 'HMKI Bidang Komunikasi dan Informasi', 'Pengurus Istimewa (Internal)');

foreach ($no_array as $row){

    if ( $i_head[$row] == $da_divisi){
        $da_val_divisi = $row;
    }
}


?>
 
 
 <div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Anggota</h1>
            </div>
        </div>
 
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$userdata['id'];?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $da_nama?>">
            </div>
 
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $da_jabatan?>">
            </div>
            
            <div class="form-group">
                <label for="universitas">Universitas:</label>
                <input type="text" class="form-control" id="universitas" name="universitas" value="<?php echo $da_universitas?>">
            </div>

            <div class="form-group">
                <label for="ttl">Tempat, Tanggal Lahir:</label>
                <input type="text" class="form-control" id="ttl" name="ttl" value="<?php echo $da_ttl?>">
            </div>
 
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $da_alamat?>">
            </div>

            <div class="form-group">
                <label for="divisi">Divisi:</label>
                <select name="divisi" class="form-control" id="divisi">
                    <option value="<?php echo $i_head[$da_val_divisi];?>" selected=""><?php echo $da_divisi?></option>
                    <?php
                    $datastruktur = getClass();
                    $count = 0;
                    while($row=mysqli_fetch_assoc($datastruktur)) {
                        ?>
                        <option value="<?php echo $i_head[$count];?>"><?=$row['jabatan'];?></option>
                        <?php $count++; } ?>
                    </select>
            </div>
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Edit Anggota</button>
            </form>
 
        </div>
    </div>