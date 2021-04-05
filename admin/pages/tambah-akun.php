<?php
$jumlahlampiran=0;
$error = '';
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
    if(!empty($nama) && !empty(trim($user)) && !empty(trim($password)) && !empty($jabatan)){
        if(tambahAkun($nama, $user, $password, $jabatan)){
            echo '<script>window.location="'.$adminurl.'index.php?p=data-akun"</script>';
        } else {
            $error = 'ada masalah saat menambah data '.mysqli_error($link);
        }
 
    }else{
        $error = 'judul, gambar dan konten wajib diisi';
    }
 
}
?>
 
<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Akun</h1>
            </div>
        </div>
 
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>

            <div class="form-group">
                <label for="user">Username:</label>
                <input type="text" class="form-control" id="user" name="user">
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
                <button type="submit" name="submit" class="btn btn-default">Tambah Akun</button>
            </form>
                 
        </div>
    </div>