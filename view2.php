<?php
    require 'function.php';
   

    if(isset($_GET['idp'])){
        $idp = $_GET['idp'];

        $ambilnamapelanggan = mysqli_query($c,"select * from pesanan p, pelanggan pl where p.idpelanggan=pl.idpelanggan and p.idorder='$idp'");
        $np = mysqli_fetch_array($ambilnamapelanggan);
        $namapel = $np['namapelanggan'];
    } else {
        header('location:index2.php');
    }

    $iddp = isset($_GET['iddp']) ? $_GET['iddp'] : null;

if ($iddp) {
    $result = mysqli_query($c, "SELECT * FROM detailpesanan WHERE iddetailpesanan='$iddp'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $iddp = $row['iddetailpesanan']; // Pastikan nilainya valid
    } else {
        echo "<script>alert('Error: Data detail pesanan tidak ditemukan.');</script>";
    }
}

    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Pesanan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #3E5879;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index2.php">Cashier App</a>
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #3E5879;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="pelanggan2.php">
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
                        <h1 class="mt-4">Data Pesanan : <?=$idp;?></h1>
                        <h4 class="mt-4 mb-4">Nama Pelanggan : <?=$namapel;?></h4>
                        </ol>


                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn mb-4" data-toggle="modal" data-target="#myModal" style="background-color: #D2E0FB;">
                            Tambah Barang
                        </button>


                        <div class="card mb-4">
                            <div class="card-header" style="background-color: #EDEAEA;">
                                <i class="fas fa-table me-1"></i>
                                Data Pesanan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $get = mysqli_query($c,"select * from detailpesanan p, produk pr where p.idproduk=pr.idproduk and idpesanan='$idp'");
                                    $i = 1;

                                    while($p=mysqli_fetch_array($get)){
                                    $idpr = $p['idproduk'];
                                    $iddp = $p['iddetailpesanan'];
                                    $qty = $p['qty'];
                                    $harga = $p['harga'];
                                    $namaproduk = $p['namaproduk']; 
                                    $desc = $p['deskripsi']; 
                                    $subtotal = $qty*$harga;

                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$namaproduk;?> (<?=$desc;?>)</td>
                                            <td>IDR<?=number_format($harga);?></td>
                                            <td><?=number_format($qty);?></td>
                                            <td>IDR<?=number_format($subtotal);?></td>
                                            <td>
                                            <button type="button" class="btn" data-toggle="modal" data-target="#editdetailpesanan2<?=$idpr;?>" style="background-color: #FADFA1;">
                                                    Edit
                                                </button> 
                                                <button type="button" class="btn" data-toggle="modal" data-target="#delete<?=$idpr;?>" style="background-color: #C96868;">
                                                    Delete
                                                </button>
                                                <a href="struk.php?idp=<?=$idp; ?>" target="_blank" class="btn" style="background-color: #C2C39C;">Cetak Struk</a>
                                            </td>
                                        </tr>

                                         <!-- Modal Edit -->
                                         <div class="modal fade" id="editdetailpesanan2<?=$idpr;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Ubah data detail pesanan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?=$namaproduk;?> : <?=$desc;?>" disabled>
                                                    <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah" value="<?=$qty;?>">
                                                    <!-- <input type="hidden" name="iddp" value="<?=$iddp;?>"> -->
                                                    <!-- <?php
                                                        echo "IDD Detail Pesanan: " . $iddp . "<br>"; // Debugging
                                                    ?> -->
                                                    <input type="hidden" name="iddp" value="<?=$iddp;?>">
                                                    <input type="hidden" name="idp" value="<?=$idp;?>">
                                                    <input type="hidden" name="idpr" value="<?=$idpr;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="editdetailpesanan" style="background-color: #79B57D;">Submit</button>
                                                <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
                                                </div>
                                                </form>
                                                
                                            </div>
                                            </div>
                                        </div>

                                        <!-- The Modal -->
                                        <div class="modal fade" id="delete<?=$idpr;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Apakah anda yakin ingin menghapus barang ini?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus barang ini? 
                                                    <input type="hidden" name="idp" value="<?=$iddp;?>">
                                                    <input type="hidden" name="idpr" value="<?=$idpr;?>">
                                                    <input type="hidden" name="idorder" value="<?=$idp;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <button type="submit" class="btn" name="hapusprodukpesanan2" style="background-color: #79B57D;">Ya</button>
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
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post">

        <!-- Modal body -->
        <div class="modal-body">
            Pilih Barang
            <select name="idproduk" class="form-control">
             
            <?php
            $getproduk = mysqli_query($c,"select * from produk where idproduk not in (select idproduk from detailpesanan where idpesanan='$idp' )");

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
            <input type="hidden" name="idp" value="<?=$idp;?>">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn" name="addproduk" style="background-color: #79B57D;">Submit</button>
          <button type="button" class="btn" data-dismiss="modal" style="background-color: #C96868;">Close</button>
        </div>

        </form>
        
      </div>
    </div>
  </div>



</html>
