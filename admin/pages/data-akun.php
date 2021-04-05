<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Akun</h1>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>User</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urutan      = 1;
                $dataArtikel = GetAkun();
                while($row=mysqli_fetch_assoc($dataArtikel)){
                ?>
                <tr>
                    <td><?=$urutan++;?></td>
                    <td><?=$row['nama'];?></td>
                    <td><?=$row['user'];?></td>
                    <td><?=$row['jabatan'];?></td>
                    <td> <a href="<?=$adminurl;?>index.php?p=hapus-akun&sid=<?=$row['s_id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a> <a href="<?=$adminurl;?>index.php?p=edit-akun&sid=<?=$row['s_id'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>