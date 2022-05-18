<div class="container">
    <div class="card">
        <div class="card-body">
        <h5>Data Pegawai</h5>
        <a href="#" class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Tambah</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>No. </th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $no = 1;
    foreach ($pegawai as $d) : ?>
        <tr>       
            <td><?= $no++;?></td>
            <td><?= $d['NIP'];?></td>
            <td><?= $d['nama_peg'];?></td>
            <td><?= $d['Alamat']; ?></td>
            <td><img src="<?= base_url('assets/images/'.$d['Foto']); ?>" alt="Foto Pegawai" width="100" height="100"></td>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $d['NIP'];?>">Ubah</a>
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $d['NIP']?>">Hapus</a>
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
      <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/addPegawai');?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
               <label for="">NIP</label>
               <input type="text" name="nip" class="form-control" placeholder="NIP Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Tempat Lahir</label>
               <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir ..."> 
            </div>
            <div class="form-group">
               <label for="">Tanggal Lahir</label>
               <input type="date" name="tgl" class="form-control" placeholder="Tanggal Lahir ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Alamat</label>
               <input type="text" name="alamat" class="form-control" placeholder="Alamat Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Pangkat/Golongan</label>
               <input type="text" name="pangkat" class="form-control" placeholder="Pangkat/Golongan Pegawai ..."> 
            </div>
            <div class="form-group">
               <label for="">Nama Bagian</label>
               <select name="id_bagian" class="form-control">
                   <option>-- Pilih Bagian --</option>
                   <?php foreach($bagian as $b):?>
                     <option value="<?= $b['id_bagian']; ?>"><?= $b['nama_bagian']; ?></option>
                     <?php endforeach;?>
               </select>
            </div>
            <div class="form-group">
               <label for="">Status Aktif</label>
               <select name="status_aktif" class="form-control">
                   <option>-- Pilih Status Pegawai --</option>
                   <option>Tetap</option>
                   <option>Honorer</option>
               </select>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
               <label for="">Gaji</label>
               <input type="text" name="gaji" class="form-control" placeholder="Gaji Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Foto</label>
               <input type="file" name="foto" class="form-control" placeholder="Foto Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Karpeg</label>
               <input type="text" name="karpeg" class="form-control" placeholder="Karpeg ..."> 
            </div>
            <div class="form-group">
               <label for="">Jenis Kelamin</label>
               <select name="jk" class="form-control">
                   <option>-- Jenis Kelamin --</option>
                   <option value="L">Laki-laki</option>
                   <option value="P">Perempuan</option>
               </select>
            </div>
            <div class="form-group">
               <label for="">Agama</label>
               <select name="agama" class="form-control">
                   <option>-- Agama --</option>
                   <option>Islam</option>
                   <option>Kristen</option>
                   <option>Hindu</option>
                   <option>Buddha</option>
                   <option>Konghucu</option>
               </select>
            </div>
            <div class="form-group">
               <label for="">Masa Jabatan</label>
               <input type="text" name="masa" class="form-control" placeholder="Masa Jabatan ..."> 
            </div>
            <div class="form-group">
               <label for="">Usia</label>
               <input type="number" name="usia" class="form-control" placeholder="Usia Pegawai ..."> 
            </div>
            <div class="form-group">
               <label for="">Nama User</label>
               <select name="id_user" class="form-control">
                   <option>-- Pilih User --</option>
                   <?php foreach($users as $u):?>
                     <option value="<?= $u['id_user']; ?>"><?= $u['username']; ?></option>
                     <?php endforeach;?>
               </select>
            </div>
            </div>
            
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
<?php foreach ($pegawai as $d1):?>
    <div class="modal fade" id="editModal<?= $d1['NIP']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pegawai</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('User/updatePegawai/'.$d1['NIP']);?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
               <label for="">NIP</label>
               <input type="text" name="nip" class="form-control" value="<?= $d1['NIP']?>" placeholder="NIP Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Nama Pegawai</label>
               <input type="text" name="nama" class="form-control" value="<?= $d1['nama_peg']?>" placeholder="Nama Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Tempat Lahir</label>
               <input type="text" name="tempat" class="form-control" value="<?= $d1['Tempat_lahir']?>" placeholder="Tempat Lahir ..."> 
            </div>
            <div class="form-group">
               <label for="">Tanggal Lahir</label>
               <input type="date" name="tgl" class="form-control" value="<?= $d1['Tgl_lahir']?>" placeholder="Tanggal Lahir ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Alamat</label>
               <input type="text" name="alamat" class="form-control" value="<?= $d1['Alamat']?>" placeholder="Alamat Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Pangkat/Golongan</label>
               <input type="text" name="pangkat" class="form-control" value="<?= $d1['Pangkat_golongan']?>" placeholder="Pangkat/Golongan Pegawai ..."> 
            </div>
            <div class="form-group">
               <label for="">Nama Bagian</label>
               <select name="id_bagian" class="form-control">
                   <option <?= $d1['id_bagian']; ?>><?= $d1['nama_bagian']; ?></option>
                   <?php foreach($bagian as $b):?>
                     <option value="<?= $b['id_bagian']; ?>"><?= $b['nama_bagian']; ?></option>
                     <?php endforeach;?>
               </select>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
               <label for="">Gaji</label>
               <input type="text" name="gaji" class="form-control" value="<?= $d1['Gaji']?>" placeholder="Gaji Pegawai ..." autofocus> 
            </div>
            <div class="form-group">
               <label for="">Foto</label>
               <input type="file" name="foto" class="form-control" placeholder="Foto Pegawai..."> 
            </div>
            <div class="form-group">
               <label for="">Karpeg</label>
               <input type="text" name="karpeg" class="form-control" value="<?= $d1['Karpeg']?>" placeholder="Karpeg ..."> 
            </div>
            <div class="form-group">
               <label for="">Jenis Kelamin</label>
               <select name="jk" class="form-control">
                   <?php if($d1['Jenis_kelamin'] == 'L'){?>
                        <option value="L">Laki-laki</option>
                    <?php }elseif($d1['Jenis_kelamin'] == 'P'){?>
                        <option value="P">Perempuan</option>
                    <?php } ?>
                   <option value="L">Laki-laki</option>
                   <option value="P">Perempuan</option>
               </select>
            </div>
            <div class="form-group">
               <label for="">Agama</label>
               <select name="agama" class="form-control">
                   <option><?= $d1['Agama']; ?></option>
                   <option>Islam</option>
                   <option>Kristen</option>
                   <option>Hindu</option>
                   <option>Buddha</option>
                   <option>Konghucu</option>
               </select>
            </div>
            <div class="form-group">
               <label for="">Masa Jabatan</label>
               <input type="text" name="masa" class="form-control" value="<?= $d1['Masa_jabatan']; ?>" placeholder="Masa Jabatan ..."> 
            </div>
            
            </div>
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
<?php foreach ($pegawai as $d2) :?>
<div class="modal fade" id="deleteModal<?= $d2['NIP']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="<?= base_url('User/deletePegawai/'.$d2['NIP']); ?>" method="POST">
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
