<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inicio | Login de Usuario</title>
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="autenticar.php" method="POST">
                <div class="form-group">
                  <?php include('alert.php'); ?>
                  <label class="label">Usuario</label>
                  <div class="input-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Ingresar</button>
                </div>
                <center><a href="index.php">Volver al Inicio</a></center>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                  </div>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Sistema WEB</a>
              </li>
              <li>
                <a href="#">UNERG</a>
              </li>
              <li>
                <a href="#">Ing. Informática</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2019. Yulennis Perales. Todos los derechos Reservados.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
</body>

</html>