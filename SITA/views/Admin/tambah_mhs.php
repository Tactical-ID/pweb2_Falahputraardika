<?php
include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';
require '../../navbar_adm.php';

$database = new database;
$db = $database->getKoneksi();

$mahasiswaController = new mahasiswaController($db);
$jurusan = $mahasiswaController->getjurusan();
?>
          <div id="content" class="p-4 p-md-5 pt-5">
               <form action="proces_mhs" method="post" class="border p-4 rounded">
                    <div class="mb-3">
                         <h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                    </div>
                    <div class="modal-body">
                         <table class="table table-borderless" px-3 py-3>
                              <tr>
                                   <th>Masukkan NIM :</th>
                                   <th>Masukkan Nama :</th>
                              </tr>
                              <tr>
                                   <th><input type="text" id="nim" name="nim" class="form-control border"></th>
                                   <th><input type="text" id="nama_mhs" name="nama_mhs" class="form-control border"></th>
                              </tr>
                              <tr>
                                   <th>Masukkan Jurusan:</th>
                                   <th>Masukkan Alamat :</th>
                              </tr>
                              <tr>
                                   <th> <select name="prodi_mhs" id="prodi_mhs" class="form-select">
                                             <option value="">Pilih Jurusan</option>
                                             <?php foreach ($jurusan as $jur) { ?>
                                                  <option value="<?php echo $jur['nama_jurusan']; ?>"><?php echo $jur['nama_jurusan']; ?></option>
                                             <?php } ?>
                                        </select></th>
                                   <th><input type="text" id="alamat" name="alamat" class="form-control border"></th>
                              </tr>
                              <tr>
                                   <th>Masukkan TTL:</th>
                                   <th>Masukkan Kontak :</th>
                              </tr>
                              <tr>
                                   <th><input type="text" id="ttl" name="ttl" class="form-control border"></th>
                                   <th><input type="text" id="kontak" name="kontak" class="form-control border"></th>
                              </tr>
                              <td>
                                   <a href="mahasiswa.php" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                              </td>
                         </table>
                    </div>
               </form>