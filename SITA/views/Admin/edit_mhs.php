<?php
include_once '../../config.php';
include_once '../../controllers/MahasiswaController.php';
require '../../navbar_adm.php';

$database = new database;
$db = $database->getKoneksi();

$mahasiswaController = new MahasiswaController($db);
$mahasiswa = $mahasiswaController->getAllMahasiswa();
$jurusan = $mahasiswaController->getjurusan();

?>
<div id="content" class="p-4 p-md-5 pt-5">
     <form action="update_mhs" method="post" class="border p-4 rounded">
          <h3>Edit Data Mahasiswa</h3>
          <?php
          foreach ($mahasiswaController->getmahasiswabynim($_GET['nim']) as $d) { ?>
               <table class="table table-borderless" px-3 py-3>
                    <tr>
                         <th>NIM</th>
                         <th> Nama :</th>
                    </tr>
                    <tr>
                         <input type="hidden" name="nim" value="<?php echo $d['nim']; ?>">
                         <th><input type="text" id="newnim" name="newnim" class="form-control border" value="<?php echo $d['nim'] ?>"></th>
                         <th><input type="text" id="nama_mhs" name="nama_mhs" class="form-control border" value="<?php echo $d['nama_mhs'] ?>"></th>
                    </tr>
                    <tr>
                         <th> Jurusan:</th>
                         <th> Alamat :</th>
                    </tr>
                    <tr>
                         <th> <select name="prodi_mhs" id="prodi_mhs" class="form-select">
                                   <option value="">Pilih Jurusan</option>
                                   <?php foreach ($jurusan as $jur) { ?>
                                        <?php
                                        // Jika jurusan saat ini sama dengan jurusan pada data mahasiswa yang diedit, tambahkan atribut selected
                                        $selected = ($jur['nama_jurusan'] == $d['prodi_mhs']) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $jur['nama_jurusan']; ?>" <?php echo $selected; ?>>
                                             <?php echo $jur['nama_jurusan']; ?>
                                        </option>
                                   <?php } ?>
                              </select></th>
                         <th><input type="text" id="alamat" name="alamat" class="form-control border" value="<?php echo $d['alamat'] ?>"></th>
                    </tr>
                    <tr>
                         <th> TTL:</th>
                         <th> Kontakt :</th>
                    </tr>
                    <tr>
                         <th><input type="text" id="ttl" name="ttl" class="form-control border" value="<?php echo $d['ttl'] ?>"></th>
                         <th><input type="text" id="kontak" name="kontak" class="form-control border" value="<?php echo $d['kontak'] ?>"></th>
                    </tr>
                    <td><a href="mahasiswa.php" class="btn btn-secondary">Batal</a>
                         <button type="submit" class="btn btn-primary">Simpan</button>
                    </td>
               </table>
          <?php } ?>
     </form>