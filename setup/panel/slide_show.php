<?php


session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

// TANGKAP DATA USER YANG LOGIN DARI VARIABEL SESSION
if ( isset($_SESSION["username"]) ) {
  $username = $_SESSION["username"];
}

require '../function_slide.php';



// SELECT SLIDE SHOW
$slide = query("SELECT * FROM slide_data");

// INSERT SLIDE SHOW
if ( isset($_POST["submit"]) ) {
  if (insertSlide($_POST) > 0) {
    echo "<script>
            alert('Berhasil Menambahkan Slide Baru!');
          </script>";
    echo "<script>
            document.location.href = 'slide_show.php';
          </script>";

  } else {
    echo "<script>
            alert('Gagal Menambahkan Slide Baru!');
          </script>";
    echo "<script>
            document.location.href = 'slide_show.php';
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/lego.png" rel="icon">
  <title>EvanozDev - Slide-Show</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="css/slide.css">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: #20124D;" href="index.html">
      <div class="sidebar-brand-icon">
          <img src="img/logo/logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">ITSOCIETY</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item  active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Create Post</span>
        </a>
        <div id="collapseBootstrap" class="collapse show" aria-labelledby="headingBootstrap"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Create Post</h6>
            <a class="collapse-item active" href="slide_show.php">Slide Show</a>
            <a class="collapse-item" href="structure.php">Structure</a>
            <a class="collapse-item" href="blog.php">Blog</a>
          </div>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Forms</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="form_basics.html">Form Basics</a>
            <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
            <a class="collapse-item" href="datatables.html">DataTables</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-fw fa-palette"></i>
          <span>UI Colors</span>
        </a>
      </li> -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Examples
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Example Pages</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" style="background-color: #2A2E65;">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small font-weight-bold text-uppercase"><?= $username;?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slide Show</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Create Post</li>
              <li class="breadcrumb-item active" aria-current="page">Slide Show</li>
            </ol>
          </div>



          <div class="row" id="sembunyi">
            <div class="col-xl-12 col-md-6 mb-4">
                <button id="create" class="btn font-weight-bold" style="background-color: #2A2E65; color: white;">TAMBAHKAN SLIDE BARU</button>
            </div>
            <div class="col-xl-12 col-md-6 mb-1">
              <div class="text-dark">Slide Show Terunggah</div>
            </div>
            <div class="col mb-5 mt-4">
              <div id="carouselExampleIndicators" class="carousel slide card" data-ride="carousel">
                <ol class="carousel-indicators">
                <?php $s = 1;?>
                <?php $iterfir = true; ?>
                <?php foreach ($slide as $s_l_d) : ?>
                  <?php if ($iterfir) { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $s;?>" class="active"></li>
                    <?php $iterfir = false; ?>
                  <?php } else { ?> 
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $s;?>"></li>
                  <?php } ?>
                <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                <?php $i = 1; ?>
                <?php $iterasifirst = true;?>
                <?php foreach ($slide as $sld) : ?>
                  <?php if ($iterasifirst) { ?>
                    <div class="carousel-item active">
                      <div class="row p-2 d-flex justify-content-between align-items-center pt-1" style="background-color: #2A2E65;">
                        <div class="col-2">
                          <h3 class="btn font-weight-bold text-center text-light pt-1 pb-1 rounded">SLIDE&nbsp;<?= $i;?></h3>
                        </div>
                        <div class="col-auto">
                          <a href="update_sld.php?id=<?= $sld["id"];?>" class="btn btn-light">UPDATE</a>
                          <a href="delete_sld.php?id=<?= $sld["id"];?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Slide <?= $i;?>');">DELETE</a>
                        </div>
                      </div>
                      <img class="d-block w-100 rounded-bottom" src="../../resources/slide/<?= $sld["gambar"];?>" alt="First slide" style="filter: brightness(60%);">
                      <div class="carousel-caption d-none d-md-block">
                        <h4 class="font-weight-bold"><?= $sld["judul"];?></h4>
                        <p class="font-weight-bold" style="font-size: 18px;"><?= $sld["deskripsi"];?></p>
                      </div>
                    </div>
                    <?php $iterasifirst = false; ?>
                  <?php } else { ?>
                    <div class="carousel-item">
                      <div class="row p-2 d-flex justify-content-between align-items-center pt-1" style="background-color: #2A2E65;">
                        <div class="col-2">
                          <h3 class="btn font-weight-bold text-center text-light pt-1 pb-1 rounded">SLIDE&nbsp;<?= $i;?></h3>
                        </div>
                        <div class="col-auto">
                          <a href="update_sld.php?id=<?= $sld["id"];?>" class="btn btn-light">UPDATE</a>
                          <a href="delete_sld.php?id=<?= $sld["id"];?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Slide <?= $i;?>');">DELETE</a>
                        </div>
                      </div>
                      <img class="d-block w-100 rounded-bottom" src="../../resources/slide/<?= $sld["gambar"];?>" alt="First slide" style="filter: brightness(60%);">
                      <div class="carousel-caption d-none d-md-block">
                        <h4 class="font-weight-bold"><?= $sld["judul"];?></h4>
                        <p class="font-weight-bold" style="font-size: 18px;"><?= $sld["deskripsi"];?></p>
                      </div>
                    </div>
                  <?php } ?>
                <?php $i++; ?>
                <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
          <!-- FORM -->
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row d-none" id="ghosting">
              <div class="col-xl-6 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row d-flex flex-column align-items-center">
                      <div class="col w-100 mb-4">
                        <img id="previewImage" class="rounded" src="#" alt="Preview Image" width="100%" style="display: none;">
                      </div>
                      <div class="col w-100">
                        <input type="file" id="fileInput" name="gambar" accept="image/*" class="w-3">
                        <label class="pilih-img" for="fileInput"><i class="fa-solid fa-upload"></i>&nbsp;&nbsp;PILIH FOTO SLIDE</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row d-flex flex-column align-items-center">
                      <div class="col w-100">
                        <div class="mb-3">
                          <label for="title-slide" class="form-label ttl-label font-weight-bold">JUDUL SLIDE</label>
                          <input type="text" class="form-control ttl-input" id="title-slide" name="title" placeholder="Masukkan judul slide">
                        </div>
                        <div class="mb-3">
                          <label for="desc-slide" class="form-label ttl-label font-weight-bold">DESKRIPSI SLIDE</label>
                          <textarea type="text" class="form-control ttl-input" id="desc-slide" name="deskripsi" placeholder="Masukkan deskripsi slide" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12 col-md-6 mb-4">
                <button class="btn btn-save" name="submit" id="save">SAVE</button>
                <button class="btn btn-cancel" name="cancel" id="cancel">CANCEL</button>
              </div>
            </div>
          </form>

          <!-- Row -->
          <!-- More Documentations Link -->
          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>
                For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/alerts/"
                  target="_blank"> bootstrap alert documentations.</a>
              </p>
            </div>
          </div> -->
          <!-- More Documentations Link -->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin keluar?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://unixevans.gitlab.io/" target="_blank">evankamalludin</a></b>
            </span>
          </div>
        </div>
      </footer>

    </div>
  </div>
  <!-- Scrollto to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="js/swiper-bundle.min.js"></script>
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="js/slide.js"></script>
</body>

</html>
