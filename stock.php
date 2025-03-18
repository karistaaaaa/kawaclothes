<?php
    require 'ceklogin.php';

    $h1 = mysqli_query($c, "select * from produk");
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
        <title>Stock Barang</title>
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
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></div>
                                Stock Barang 
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                                Barang Masuk
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
                        <h1 class="mt-4">Data Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SELAMAT DATANG</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background-color: #7886C7;">
                                    <div class="card-body">Jumlah Barang : <?=$h2;?></div>
                                </div>
                            </div>
                        </div> 

                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn mb-4" data-toggle="modal" data-target="#myModal" style="background-color: #D2E0FB;">
                            Tambah Barang Baru
                        </button>
                
                        <div class="card mb-4">
                            <div class="card-header" style="background-color: #EDEAEA;">
                                <i class="fas fa-table me-1"></i>
                                Data Barang
                            </div>
                            <div class="card-body"> 
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $get = mysqli_query($c,"select * from produk");
                                    $i = 1;

                                    while($p=mysqli_fetch_array($get)){
                                    $namaproduk = $p['namaproduk'];
                                    $deskripsi = $p['deskripsi'];
                                    $harga = $p['harga'];
                                    $stock = $p['stock'];
                                    $idproduk = $p['idproduk'];
                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namaproduk;?></td>
                                            <td><?=$deskripsi;?></td>
                                            <td>IDR<?=number_format($harga);?></td>
                                            <td><?=$stock;?></td>
                                            <td>
                                                <button type="button" class="btn" data-toggle="modal" data-target="#edit<?=$idproduk;?>" style="background-color: #FADFA1;">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn" data-toggle="modal" data-target="#delete<?=$idproduk;?>" style="background-color: #C96868;">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                         <!-- Modal Edit -->
                                         <div class="modal fade" id="edit<?=$idproduk;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Ubah <?=$namaproduk;?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?=$namaproduk;?>">
                                                    <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi" value="<?=$deskripsi;?>">
                                                    <input type="numb" name="harga" class="form-control mt-2" placeholder="Harga Produk" value="<?=$harga;?>">
                                                    <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="editbarang" style="background-color: #79B57D;">Submit</button>
                                                <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
                                                </div>

                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>


                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete<?=$idproduk;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus <?=$namaproduk;?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                   Apakah anda yakin ingin menghapus barang ini?
                                                    <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="hapusbarang" style="background-color: #79B57D;">Ya</button>
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
          <h4 class="modal-title">Tambah Barang Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post">

        <!-- Modal body -->
        <div class="modal-body">
            <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk">
            <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi">
            <input type="numb" name="harga" class="form-control mt-2" placeholder="Harga Produk">
            <input type="numb" name="stock" class="form-control mt-2" placeholder="Stock Awal">
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn" name="tambahbarang" style="background-color: #79B57D;">Submit</button>
          <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>




</html>
