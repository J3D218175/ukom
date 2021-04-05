<?php
$error = '';
$sid = $_GET['sid'];
if(isset($_POST['submit'])){
    $nama         = $_POST['nama'];
    $user         = $_POST['user'];
    $password     = $_POST['password'];
    $jabatan      = $_POST['jabatan'];

    if(!empty($nama) && !empty(trim($user)) && !empty(trim($password)) && !empty($jabatan)){
        if(upAkun($sid,$nama,$user,$password,$jabatan)){
            echo '<script>window.location="'.$adminurl.'index.php?p=data-akun"</script>';
        } else {
            $error = 'ada masalah saat menambah data'.mysqli_error($link);
        }
 
    }else{
        $error = 'data penting wajib diisi';
    }
 
}
 
// mengambil data anggota berdasarkan ID
$dataAkunPerId = getAkunPerId($sid);
while($row=mysqli_fetch_assoc($dataAkunPerId)){
    $da_nama = $row['nama'];
    $da_user = $row['user'];
    $da_jabatan = $row['jabatan'];
}

?>
 
 
 <div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Akun</h1>
            </div>
        </div>
 
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?=$da_nama?>" placeholder="<?php echo $da_nama;?>">
            </div>

            <div class="form-group">
                <label for="user">Username:</label>
                <input type="text" class="form-control" id="user" name="user" value="<?=$da_user?>" placeholder="<?php echo $da_user;?>">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
 
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <select name="jabatan" class="form-control" id="jabatan">
                    <option value="" selected="">--Pilih Jabatan--</option>
                    <?php
                    $datajabatan = listJabatan();
                    while($row=mysqli_fetch_assoc($datajabatan)) {
                        ?>
                        <option value="<?=$row['id'];?>"><?=$row['jabatan'];?></option>
                        <?php } ?>
                    </select>
            </div>  
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Edit Anggota</button>
            </form>
 
        </div>
    </div>