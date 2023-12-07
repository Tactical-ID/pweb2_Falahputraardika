<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SITA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
</html>
<body>
  <!-- <main class="lool"> -->
    <!-- <div class="container"> -->
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <div class="d-flex justify-content-center ">
                      <a href="#" class="logo d-flex align-items-center w-auto">
                        <img src="assets/img/logo.png" alt="" />
                      </a>
                    </div>
                    <!-- End Logo -->
                    <h1 class="card-title text-center pb-0 fs-4">Sistem Informasi Tugas Akhir</h1>
                    <p class="text-center small">
                      Masukkan Username & Password untuk masuk
                    </p>
                  </div>

                  <form method="post" action="login_aksi.php" name="formlogin">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="nama" class="form-control" />
                        <div class="invalid-feedback">
                          Masukan Username
                        </div>
                      </div>
                    </div>
                    <br>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">*</span>
                        <input type="password" name="katakunci" class="form-control" />
                        <div class="invalid-feedback">
                          Masukan Password
                        </div>
                      </div>

                      <div class="col-12">
                        <br>

                        <button class="btn btn-primary w-100" input type="submit" name="tombollogin" value="LOGIN">
                          Login
                        </button>
                        

                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
</body>

</html>

</body>

</html>