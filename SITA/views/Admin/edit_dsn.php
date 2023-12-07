<?php
include_once '../../config.php';
include_once '../../controllers/MahasiswaController.php';
include_once '../../controllers/dosenController.php';
require '../../navbar_adm.php';

$database = new database;
$db = $database->getKoneksi();

$mahasiswaController = new MahasiswaController($db);
$dosenController = new dosenController($db);
$jurusan = $mahasiswaController->getjurusan();

?>
          <div id="content" class="p-4 p-md-5 pt-5">
               <form action="update_dsn" method="post" class="border p-4 rounded">
                    <h3>Edit Data Dosen</h3>
                    <?php
                    foreach ($dosenController->getnamabynip($_GET['nip']) as $d) { ?>
                         <table class="table table-borderless" px-3 py-3>
                              <tr>
                                   <th>NIP</th>
                                   <th> Nama :</th>
                              </tr>
                              <tr>
                                   <input type="hidden" name="nip" value="<?php echo $d['nip']; ?>">
                                   <th><input type="text" id="newnip" name="newnip" class="form-control border" value="<?php echo $d['nip'] ?>"></th>
                                   <th><input type="text" id="nama_dosen" name="nama_dosen" class="form-control border" value="<?php echo $d['nama_dosen'] ?>"></th>
                              </tr>
                              <tr>
                                   <th> Jurusan:</th>
                                   <th> Alamat :</th>
                              </tr>
                              <tr>
                                   <th><select name="jurusan" id="jurusan" class="form-select">
                                             <option value="">Pilih Jurusan</option>
                                             <?php foreach ($jurusan as $jur) { ?>
                                                  <option value="<?php echo $jur['nama_jurusan']; ?>"><?php echo $jur['nama_jurusan']; ?></option>
                                             <?php } ?>
                                        </select></th>
                                   <th><input type="text" id="alamat" name="alamat" class="form-control border" value="<?php echo $d['alamat'] ?>"></th>
                              </tr>
                              <tr>
                                   <th> Kontakt :</th>
                              </tr>
                              <tr>
                                   <th><input type="text" id="kontak" name="kontak" class="form-control border" value="<?php echo $d['kontak'] ?>"></th>
                              </tr>
                              <td><a href="dosen.php" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                              </td>
                         </table>
                    <?php } ?>
               </form>
          </div>