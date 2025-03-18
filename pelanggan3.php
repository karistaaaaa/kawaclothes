<?php
    require 'ceklogin.php';

    $h1 = mysqli_query($c, "select * from pelanggan");
    $h2 = mysqli_num_rows($h1);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Pelanggan</title>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #3E5879;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Cashier App</a>
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #3E5879;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fas fa-users"></i></div>
                                Kelola Pelanggan
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SELAMAT DATANG</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background-color: #7886C7;">
                                    <div class="card-body">Jumlah Pelanggan : <?=$h2;?></div>
                                </div>
                            </div>
                        </div> 

                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn mb-4" data-toggle="modal" data-target="#myModal" style="background-color: #D2E0FB;">
                            Tambah Pelanggan
                        </button>
                
                        <div class="card mb-4">
                            <div class="card-header" style="background-color: #EDEAEA;">
                                <i class="fas fa-table me-1"></i>
                                Data Pelanggan
                            </div>
                            <div class="card-body"> 
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>No. Telepon</th>
                                            <th>Alamat</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $get = mysqli_query($c,"select * from pelanggan");
                                    $i = 1;

                                    while($p=mysqli_fetch_array($get)){
                                    $namapelanggan = $p['namapelanggan'];
                                    $notelp = $p['notelp'];
                                    $alamat = $p['alamat'];
                                    $idpl = $p['idpelanggan'];

                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namapelanggan;?></td>
                                            <td><?=$notelp;?></td>
                                            <td><?=$alamat;?></td>
                                            <td>
                                                <button type="button" class="btn" data-toggle="modal" data-target="#edit<?=$idpl;?>" style="background-color: #FADFA1;">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn" data-toggle="modal" data-target="#delete<?=$idpl;?>" style="background-color: #C96868;">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>



                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit<?=$idpl;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Ubah <?=$namapelanggan;?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="namapelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?=$namapelanggan;?>">
                                                    <input type="numb" name="notelp" class="form-control mt-2" placeholder="No Telp" value="<?=$notelp;?>">
                                                    <input type="text" name="alamat" class="form-control mt-2" placeholder="Alamat" value="<?=$alamat;?>">
                                                    <input type="hidden" name="idpl" value="<?=$idpl;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="editpelanggan3" style="background-color: #79B57D;">Submit</button>
                                                <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
                                                </div>

                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>


                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete<?=$idpl;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus <?=$namapelanggan;?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                   Apakah anda yakin ingin menghapus pelanggan ini?
                                                    <input type="hidden" name="idpl" value="<?=$idpl;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="hapuspelanggan" style="background-color: #79B57D;">Ya</button>
                                                <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
                                                </div>

                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>

                                    <?php
                                    }; // end while

                                    ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; KaWaWeb 2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> 
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> 
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>



    <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Pelanggan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post">

        <!-- Modal body -->
        <div class="modal-body">
            <input type="text" name="namapelanggan" class="form-control" placeholder="Nama Pelanggan">
            <input type="text" name="notelp" class="form-control mt-2" placeholder="No. HP">
            <input type="text" name="alamat" class="form-control mt-2" placeholder="Alamat">
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn" name="tambahpelanggan3" style="background-color: #79B57D;">Submit</button>
          <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>




</html>
