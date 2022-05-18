<div class="container">
    <div class="card">
        <div class="card-body">
        <h5>Data Pengajuan Mutasi</h5>
        <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Pegawai</th>
            <th>Tanggal Pengajuan</th>
            <th>Status Pengajuan</th>
            <th>Aksi</th>
        </tr>   
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($pengajuan as $p) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $p['nama_peg'];?></td>
            <td><?= $p['tgl_pengajuan'];?></td>
            <td><?= $p['status_pengajuan'];?></td>
            <td>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#updateModal<?= $p['id_aju_mutasi'];?>">Ubah</a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $p['id_aju_mutasi']?>">Hapus</a>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#detailModal<?= $p['id_aju_mutasi'];?>">Detail</a>
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
      <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan Mutasi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('Pengajuan/addMutasi');?>" method="POST">
            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <?php foreach($user as $u): ?>
               <input type="text" class="form-control" value="<?= $u['nama_peg'].' - '.$u['nip']; ?>" readonly> 
               <input type="hidden" name="nip" class="form-control" value="<?= $u['nip']; ?>"> 
               <input type="hidden" name="id_user" class="form-control" value="<?= $u['id_user']; ?>"> 
               <?php endforeach; ?>
            </div>
            <div class="form-group">
               <label for="">Alasan</label>
               <textarea name="alasan" class="form-control"></textarea> 
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
<?php foreach ($pengajuan as $p1):?>
    <div class="modal fade" id="updateModal<?= $p1['id_aju_mutasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Pengajuan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('Pengajuan/updateMutasi/'.$p1['id_aju_mutasi']);?>" method="POST">
            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <?php foreach($user as $u1): ?>
               <input type="text" class="form-control" value="<?= $u1['nama_peg'].' - '.$u1['nip']; ?>" readonly> 
               <input type="hidden" name="nip" class="form-control" value="<?= $u1['nip']; ?>"> 
               <input type="hidden" name="id_user" class="form-control" value="<?= $u1['id_user']; ?>"> 
               <?php endforeach; ?>
            </div>
            <div class="form-group">
               <label for="">Alasan</label>
               <textarea name="alasan" class="form-control"><?= $p1['alasan']; ?></textarea> 
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
<?php foreach ($pengajuan as $p2) :?>
<div class="modal fade" id="deleteModal<?= $p2['id_aju_mutasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('Pengajuan/deleteMutasi/'.$p2['id_aju_mutasi']); ?>" method="POST">
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
