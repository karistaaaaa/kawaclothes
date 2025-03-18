<?php
    require 'ceklogin.php';
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
                        <h1 class="mt-4">Data Barang Masuk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SELAMAT DATANG</li>
                        </ol>

                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn mb-4" data-toggle="modal" data-target="#myModal" style="background-color: #D2E0FB;">
                            Tambah Barang Masuk
                        </button>
                
                        <div class="card mb-4">
                            <div class="card-header" style="background-color: #EDEAEA;">
                                <i class="fas fa-table me-1"></i>
                                Data Barang Masuk
                            </div>
                            <div class="card-body"> 
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $get = mysqli_query($c,"select * from masuk m, produk p where m.idproduk=p.idproduk");
                                    $i = 1;

                                    while($p=mysqli_fetch_array($get)){
                                    $namaproduk = $p['namaproduk'];
                                    $deskripsi = $p['deskripsi'];
                                    $qty = $p['qty'];
                                    $idmasuk = $p['idmasuk'];
                                    $idproduk = $p['idproduk'];
                                    $tanggal = $p['tanggal'];
                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namaproduk;?> : <?=$deskripsi;?></td>
                                            <td><?=$qty;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td>
                                                <button type="button" class="btn" data-toggle="modal" data-target="#edit<?=$idmasuk;?>" style="background-color: #FADFA1;">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn" data-toggle="modal" data-target="#delete<?=$idmasuk;?>" style="background-color: #C96868;">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>


                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit<?=$idmasuk;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Ubah data barang masuk</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?=$namaproduk;?> : <?=$deskripsi;?>" disabled>
                                                    <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah" value="<?=$qty;?>">
                                                    <input type="hidden" name="idm" value="<?=$idmasuk;?>">
                                                    <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="editdatabarangmasuk" style="background-color: #79B57D;">Submit</button>
                                                <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
                                                </div>

                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>


                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete<?=$idmasuk;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus data barang masuk</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                   Apakah anda yakin ingin menghapus data barang ini?
                                                    <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                                    <input type="hidden" name="idm" value="<?=$idmasuk;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="hapusdatabarangmasuk" style="background-color: #79B57D;">Ya</button>
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
                            <div class="text-muted">Copyright &copy; KaWaWeb 2025 </div>
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
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post">

        <!-- Modal body -->
        <div class="modal-body">
            Pilih Barang
            <select name="idproduk" class="form-control">
             
            <?php
            $getproduk = mysqli_query($c,"select * from produk");

            while($pl=mysqli_fetch_array($getproduk)){
                $namaproduk = $pl['namaproduk'];
                $stock = $pl['stock'];
                $deskripsi = $pl['deskripsi'];
                $idproduk = $pl['idproduk'];
            ?>

            <option value="<?=$idproduk;?>"><?=$namaproduk;?> - <?=$deskripsi;?> (Stock : <?=$stock;?>)</option>

            <?php
            }
            ?>

            </select>

            <input type="number" name="qty" class="form-control mt-4" placeholder="Jumlah" min="1" required>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn" name="barangmasuk" style="background-color: #79B57D;">Submit</button>
          <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>





</html>
