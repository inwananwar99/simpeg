<div class="container">
    <div class="card">
        <div class="card-body">
        <h5>Data User</h5>
        <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>No. </th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($users as $d) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $d['username'];?></td>
            <td><?= $d['email']; ?></td>
            <?php if($d['level'] == 1){ ?>
                <td>Admin</td>
            <?php }else if($d['level'] == 2){  ?>
                <td>Tenaga Pendidik</td>
            <?php }else if($d['level'] == 3){  ?>
                <td>Tenaga Kependidikan</td>
            <?php }else if($d['level'] == 4){  ?>
                <td>Direktur</td>
            <?php } ?>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $d['id_user'];?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $d['id_user']?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<!-- Modal Add User -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/addUser');?>" method="POST">
            <div class="form-group">
               <label for="">Username</label>
               <input type="text" name="username" class="form-control" placeholder="Username Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Email</label>
               <input type="email" name="email" class="form-control" placeholder="Email Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Password</label>
               <input type="password" name="password" class="form-control" placeholder="Password ..."> 
            </div>
            <div class="form-group">
               <label for="">Role User</label>
               <select name="level" id="" class="form-control">
                   <option>-- Pilih Role --</option>
                   <option value="1">Admin</option>
                   <option value="2">Tenaga Pendidik</option>
                   <option value="3">Tenaga Kependidikan</option>
                   <option value="4">Direktur</option>
               </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
</div>
</div>
<!-- Modal Update-->
<?php foreach ($users as $d1):?>
    <div class="modal fade" id="editModal<?= $d1['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Users</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('User/updateUser/'.$d1['id_user']);?>" method="POST">
            <div class="form-group">
               <label for="">Username</label>
               <input type="text" name="username" class="form-control" value="<?= $d1['username']; ?>" placeholder="Username Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Email</label>
               <input type="email" name="email" class="form-control" value="<?= $d1['email']; ?>" placeholder="Email Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Role User</label>
               <select name="level" class="form-control">
               <?php if($d1['level'] == 1){ ?>
                <option value="<?= $d1['level']; ?>">-- Admin --</option>
                <?php }else if($d1['level'] == 2){  ?>
                    <option value="<?= $d1['level']; ?>">-- Tenaga Pendidik --</option>
                <?php }else if($d1['level'] == 3){  ?>              
                    <option value="<?= $d1['level']; ?>">-- Tenaga Kependidikan --</option>
                <?php }else if($d1['level'] == 4){  ?>
                    <option value="<?= $d1['level']; ?>">-- Direktur --</option>
                <?php } ?>
                   <option value="1">Admin</option>
                   <option value="2">Tenaga Pendidik</option>
                   <option value="3">Tenaga Kependidikan</option>
                   <option value="4">Direktur</option>
               </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php endforeach;?>

<!-- Modal Hapus -->
<?php foreach ($users as $d2) :?>
<div class="modal fade" id="deleteModal<?= $d2['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('User/deleteUser/'.$d2['id_user']); ?>" method="POST">
        <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php endforeach;?>
        </div>
    </div>
</div>
