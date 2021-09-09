<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php 
            
                Flasher::flash();
            
            ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?php echo BASEURL; ?>/mahasiswa/cari" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="cari mahasiswa" name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>

            <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs ) { ?>
                <li class="list-group-item">
                    <?php echo $mhs['nama']; ?>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/hapus/<?php echo $mhs['id'] ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?')">hapus</a>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/ubah/<?php echo $mhs['id'] ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?php echo $mhs['id'] ?>">ubah</a>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id'] ?>" class="badge badge-primary float-right ml-1">detail</a>
                </li>
                <?php } ?>
            </ul>
           
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formlModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
            <form action="<?php echo BASEURL; ?>/mahasiswa/tambah" method="post">
            
            <input type="hidden" name="id" id="id">

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>

            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="number" class="form-control" name="nim" id="nim">
            </div>

            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" name="jurusan" id="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Ilmu Komputer">Ilmu Komputer</option>
                <option value="Sistem Komputer">Sistem Komputer</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                </select>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
        </div>
    </div>
</div>