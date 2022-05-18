<div class="container">
    <div class="card">
        <div class="card-body">
        <h5>Data Bagian</h5>
        <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Bagian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($bagian as $b) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $b['nama_bagian'];?></td>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#updateModal<?= $b['id_bagian'];?>">Ubah</a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $b['id_bagian']?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<!-- Modal Add Bagian -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Bagian</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/addBagian');?>" method="POST">
            <div class="form-group">
               <label for="">Nama Bagian</label>
               <input type="text" name="bagian" class="form-control" placeholder="Nama Bagian ..." autofocus> 
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
<?php foreach ($bagian as $b1):?>
    <div class="modal fade" id="updateModal<?= $b1['id_bagian']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Bagian</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/updateBagian/'.$b1['id_bagian']);?>" method="POST">
            <div class="form-group">
               <label for="">Nama Bagian</label>
               <input type="text" name="bagian" class="form-control" value="<?= $b1['nama_bagian'];?>" placeholder="Nama Bagian ..." autofocus> 
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
<?php foreach ($bagian as $b2) :?>
<div class="modal fade" id="deleteModal<?= $b2['id_bagian']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('User/deleteBagian/'.$b2['id_bagian']); ?>" method="POST">
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
