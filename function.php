<?php

session_start();

// KONEKSI CUY
$c = mysqli_connect('localhost','root','','kasir_toko');

// // LOGIN EUY
// if(isset($_POST['login'])){
//     //INITIATE VARIABLE
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $check = mysqli_query($c, "SELECT * FROM user WHERE username='$username' and password='$password'");
//     $hitung = mysqli_num_rows($check);

//     if($hitung>0){
//         // DATA DITEMUKAN, BERHASIL
//         $_SESSION['login'] = 'True';
//         header('location:index.php');
//     } else {
//         // DATA TIDAK DITEMUKAN, GAGAL LOGIN
//         echo '
//         <script>alert("Username atau Password salah");
//         window.location.href="login.php"
//         </script>  
//         ';
//     }
// }

//tambah barang
if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['namaproduk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
   
    $insert = mysqli_query($c,"insert into produk (namaproduk,deskripsi,harga,stock) values ('$namaproduk','$deskripsi',
    '$harga','$stock')");

    if($insert){
        header('location:stock.php');
    } else {
        echo '
        <script>alert("Gagal menambah barang baru");
        window.location.href="stock.php"
        </script>  
        ';
    }
};

//tambah pelanggan admin
if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
   
    $insert = mysqli_query($c,"insert into pelanggan (namapelanggan,notelp,alamat) values ('$namapelanggan','$notelp','$alamat')");

    if($insert){
        header('location:pelanggan.php');
    } else {
        echo '
        <script>alert("Gagal menambah pelanggan baru");
        window.location.href="pelanggan.php"
        </script>  
        ';
    }
}

//tambah pelanggan kasir
if(isset($_POST['tambahpelanggan2'])){
    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
   
    $insert = mysqli_query($c,"insert into pelanggan (namapelanggan,notelp,alamat) values ('$namapelanggan','$notelp','$alamat')");

    if($insert){
        header('location:pelanggan2.php');
    } else {
        echo '
        <script>alert("Gagal menambah pelanggan baru");
        window.location.href="pelanggan2.php"
        </script>  
        ';
    }
}

//tambah pelanggan spg
if(isset($_POST['tambahpelanggan3'])){
    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
   
    $insert = mysqli_query($c,"insert into pelanggan (namapelanggan,notelp,alamat) values ('$namapelanggan','$notelp','$alamat')");

    if($insert){
        header('location:pelanggan3.php');
    } else {
        echo '
        <script>alert("Gagal menambah pelanggan baru");
        window.location.href="pelanggan3.php"
        </script>  
        ';
    }
}

//tambah pesanan
if(isset($_POST['tambahpesanan'])){
    $idpelanggan = $_POST['idpelanggan'];
   
    $insert = mysqli_query($c,"insert into pesanan (idpelanggan) values ('$idpelanggan')");

    if($insert){
        header('location:index2.php?idp='.$idp.'');
    } else {
        echo '
        <script>alert("Gagal menambah pesanan baru");
        window.location.href="index2.php?idp='.$idp.'"
        </script>  
        ';
    }
}


//tambah produk admin
if(isset($_POST['addprodukadmin'])){
    $idproduk = $_POST['idproduk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty'];
   
    $hitung1 = mysqli_query($c, "select * from produk where idproduk='$idproduk'");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stocksekarang = $hitung2['stock'];

    if($stocksekarang>=$qty){

        $selisih = $stocksekarang-$qty;

        $insert = mysqli_query($c,"insert into detailpesanan (idpesanan,idproduk,qty) values ('$idp','$idproduk','$qty')");
        $update = mysqli_query($c, "update produk set stock='$selisih' where idproduk='$idproduk'"); 

        if($insert&&$update){
            header('location:view.php?idp='.$idp);
        } else {
            echo '
            <script>alert("Gagal menambah pesanan baru");  
            window.location.href="view.php?idp='.$idp.'"
            </script>  
            ';
        }
    } else { 
        echo '
        <script>alert("Stock barang tidak cukup");
        window.location.href="view.php?idp='.$idp.'"
        </script>  
        ';
    }
}

//tambah produk kasir
if(isset($_POST['addproduk'])){
    $idproduk = $_POST['idproduk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty'];
   
    $hitung1 = mysqli_query($c, "select * from produk where idproduk='$idproduk'");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stocksekarang = $hitung2['stock'];

    if($stocksekarang>=$qty){

        $selisih = $stocksekarang-$qty;

        $insert = mysqli_query($c,"insert into detailpesanan (idpesanan,idproduk,qty) values ('$idp','$idproduk','$qty')");
        $update = mysqli_query($c, "update produk set stock='$selisih' where idproduk='$idproduk'"); 

        if($insert&&$update){
            header('location:view2.php?idp='.$idp);
        } else {
            echo '
            <script>alert("Gagal menambah pesanan baru");  
            window.location.href="view2.php?idp='.$idp.'"
            </script>  
            ';
        }
    } else { 
        echo '
        <script>alert("Stock barang tidak cukup");
        window.location.href="view2.php?idp='.$idp.'"
        </script>  
        ';
    }
}


//tambah produk spg
if(isset($_POST['addproduk'])){
    $idproduk = $_POST['idproduk'];
    $idp = $_POST['idp'];
    $qty = $_POST['qty'];
   
    $hitung1 = mysqli_query($c, "select * from produk where idproduk='$idproduk'");
    $hitung2 = mysqli_fetch_array($hitung1);
    $stocksekarang = $hitung2['stock'];

    if($stocksekarang>=$qty){

        $selisih = $stocksekarang-$qty;

        $insert = mysqli_query($c,"insert into detailpesanan (idpesanan,idproduk,qty) values ('$idp','$idproduk','$qty')");
        $update = mysqli_query($c, "update produk set stock='$selisih' where idproduk='$idproduk'"); 

        if($insert&&$update){
            header('location:view3.php?idp='.$idp);
        } else {
            echo '
            <script>alert("Gagal menambah pesanan baru");  
            window.location.href="view3.php?idp='.$idp.'"
            </script>  
            ';
        }
    } else { 
        echo '
        <script>alert("Stock barang tidak cukup");
        window.location.href="view3.php?idp='.$idp.'"
        </script>  
        ';
    }
}



//tambah barang masuk
if(isset($_POST['barangmasuk'])){
    $idproduk = $_POST['idproduk'];
    $qty = $_POST['qty'];

    $caristock = mysqli_query($c,"select * from produk where idproduk='$idproduk'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];

    $newstock = $stocksekarang+$qty;

    $insertb = mysqli_query($c, "insert into masuk (idproduk,qty) values ('$idproduk','$qty')");
    $updatetb = mysqli_query($c, "update produk set stock='$newstock' where idproduk='$idproduk'");

    if($insertb&&$updatetb){
        header('location:masuk.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="masuk.php"
        </script>  
        ';
    }
}

//hapus produk pesanan admin
if(isset($_POST['hapusprodukpesanan'])){
    $idp = $_POST['idp'];
    $idpr = $_POST['idpr'];
    $idorder = $_POST['idorder'];

    $cek1 = mysqli_query($c, "select * from detailpesanan where iddetailpesanan='$idp'");
    $cek2 = mysqli_fetch_array($cek1);
    $qtysekarang = $cek2['qty'];

    $cek3 = mysqli_query($c, "select * from produk where idproduk='$idpr'");
    $cek4 = mysqli_fetch_array($cek3);
    $stocksekarang = $cek4['stock'];

    $hitung = $stocksekarang+$qtysekarang;

    $update = mysqli_query($c, "update produk set stock='$hitung' where idproduk='$idpr'");
    $hapus = mysqli_query($c, "delete from detailpesanan where idproduk='$idpr' and iddetailpesanan='$idp'");

    if($update&&$hapus){
        header('location:view.php?idp='.$idorder);
    } else {
        echo '
        <script>alert("Stock menghapus barang baru");
        window.location.href="view.php?idp='.$idorder.'"
        </script>  
        '; 
    }
}

//hapus produk pesanan kasir
if(isset($_POST['hapusprodukpesanan2'])){
    $idp = $_POST['idp'];
    $idpr = $_POST['idpr'];
    $idorder = $_POST['idorder'];

    $cek1 = mysqli_query($c, "select * from detailpesanan where iddetailpesanan='$idp'");
    $cek2 = mysqli_fetch_array($cek1);
    $qtysekarang = $cek2['qty'];

    $cek3 = mysqli_query($c, "select * from produk where idproduk='$idpr'");
    $cek4 = mysqli_fetch_array($cek3);
    $stocksekarang = $cek4['stock'];

    $hitung = $stocksekarang+$qtysekarang;

    $update = mysqli_query($c, "update produk set stock='$hitung' where idproduk='$idpr'");
    $hapus = mysqli_query($c, "delete from detailpesanan where idproduk='$idpr' and iddetailpesanan='$idp'");

    if($update&&$hapus){
        header('location:view2.php?idp='.$idorder);
    } else {
        echo '
        <script>alert("Stock menghapus barang baru");
        window.location.href="view2.php?idp='.$idorder.'"
        </script>  
        '; 
    }
}


//hapus produk pesanan spg
if(isset($_POST['hapusprodukpesanan3'])){
    $idp = $_POST['idp'];
    $idpr = $_POST['idpr'];
    $idorder = $_POST['idorder'];

    $cek1 = mysqli_query($c, "select * from detailpesanan where iddetailpesanan='$idp'");
    $cek2 = mysqli_fetch_array($cek1);
    $qtysekarang = $cek2['qty'];

    $cek3 = mysqli_query($c, "select * from produk where idproduk='$idpr'");
    $cek4 = mysqli_fetch_array($cek3);
    $stocksekarang = $cek4['stock'];

    $hitung = $stocksekarang+$qtysekarang;

    $update = mysqli_query($c, "update produk set stock='$hitung' where idproduk='$idpr'");
    $hapus = mysqli_query($c, "delete from detailpesanan where idproduk='$idpr' and iddetailpesanan='$idp'");

    if($update&&$hapus){
        header('location:view3.php?idp='.$idorder);
    } else {
        echo '
        <script>alert("Stock menghapus barang baru");
        window.location.href="view3.php?idp='.$idorder.'"
        </script>  
        '; 
    }
}

//editbarang
if(isset($_POST['editbarang'])){
    $np = $_POST['namaproduk'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $idp = $_POST['idp'];

    $query = mysqli_query($c, "update produk set namaproduk='$np', deskripsi='$desc', harga='$harga' where idproduk='$idp'");

    if($query){
        header('location:stock.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="stock.php"
        </script>  
        ';
    }
}

//hapus barang
if(isset($_POST['hapusbarang'])){
    $idp = $_POST['idp'];

    $query = mysqli_query($c,"delete from produk where idproduk='$idp'");
    if($query){
        header('location:stock.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="stock.php"
        </script>  
        ';
    }
}

//edit pelanggan admin
if(isset($_POST['editpelanggan'])){
    $np = $_POST['namapelanggan'];
    $nt = $_POST['notelp'];
    $a = $_POST['alamat'];
    $id = $_POST['idpl'];

    $query = mysqli_query($c, "update pelanggan set namapelanggan='$np', notelp='$nt', alamat='$a' where idpelanggan='$id'");

    if($query){
        header('location:pelanggan.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="pelanggan.php"
        </script>  
        ';
    }
}


//edit pelanggan kasir
if(isset($_POST['editpelanggan2'])){
    $np = $_POST['namapelanggan'];
    $nt = $_POST['notelp'];
    $a = $_POST['alamat'];
    $id = $_POST['idpl'];

    $query = mysqli_query($c, "update pelanggan set namapelanggan='$np', notelp='$nt', alamat='$a' where idpelanggan='$id'");

    if($query){
        header('location:pelanggan2.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="pelanggan2.php"
        </script>  
        ';
    }
}


//edit pelanggan spg
if(isset($_POST['editpelanggan3'])){
    $np = $_POST['namapelanggan'];
    $nt = $_POST['notelp'];
    $a = $_POST['alamat'];
    $id = $_POST['idpl'];

    $query = mysqli_query($c, "update pelanggan set namapelanggan='$np', notelp='$nt', alamat='$a' where idpelanggan='$id'");

    if($query){
        header('location:pelanggan3.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="pelanggan3.php"
        </script>  
        ';
    }
}

//hapus pelanggan
if(isset($_POST['hapuspelanggan'])){
    $idpl = $_POST['idpl'];

    $query = mysqli_query($c,"delete from pelanggan where idpelanggan='$idpl'");
    if($query){
        header('location:pelanggan.php');
    } else {
        echo '
        <script>
        window.location.href="pelanggan.php"
        </script>  
        ';
    }
}

//edit data barang masuk
if(isset($_POST['editdatabarangmasuk'])){
    $qty = $_POST['qty'];
    $idm = $_POST['idm'];
    $idp = $_POST['idp'];

    $caritau = mysqli_query($c, "s(elect * from masuk where idmasuk='$idm'");
    $caritau2 = mysqli_fetch_array($caritau);
    $qtysekarang = $caritau2['qty'];

    $caristock = mysqli_query($c,"select * from produk where idproduk='$idp'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];

    if($qty >= $qtysekarang){

        $selisih = $qty-$qtysekarang;
        $newstock = $stocksekarang+$selisih;
     
        $query1 = mysqli_query($c, "update masuk set qty='$qty' where idmasuk='$idm'");
        $query2 = mysqli_query($c, "update produk set stock='$newstock' where idproduk='$idp'");

        if($query1&&$query2){
            header('location:masuk.php');
        } else {
            echo '
            <script>alert("Gagal");
            window.location.href="masuk.php"
            </script>  
            ';
        }

    } else {
        $selisih = $qtysekarang-$qty;
        $newstock = $stocksekarang-$selisih;

        $query1 = mysqli_query($c, "update masuk set qty='$qty' where idmasuk='$idm'");
        $query2 = mysqli_query($c, "update produk set stock='$newstock' where idproduk='$idp'");

        if($query1&&$query2){
            header('location:masuk.php');
        } else {
            echo '
            <script>alert("Gagal");
            window.location.href="masuk.php"
            </script>  
            ';
        }
    }
    
    
}

//hapus data barang masuk
if(isset($_POST['hapusdatabarangmasuk'])){
    $idm = $_POST['idm'];
    $idp = $_POST['idp'];

    $caritau = mysqli_query($c, "s(elect * from masuk where idmasuk='$idm'");
    $caritau2 = mysqli_fetch_array($caritau);
    $qtysekarang = $caritau2['qty'];

    $caristock = mysqli_query($c,"select * from produk where idproduk='$idp'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];

    $newstock = $stocksekarang-$qtysekarang;

    $query1 = mysqli_query($c, "delete from masuk where idmasuk='$idm'");
    $query2 = mysqli_query($c, "update produk set stock='$newstock' where idproduk='$idp'");

    if($query1&&$query2){
        header('location:masuk.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="masuk.php"
        </script>  
        ';
    }
}

//hapus order
if(isset($_POST['hapusorder'])){
    $ido = $_POST['ido'];
    $cekdata = mysqli_query($c, "SELECT * FROM detailpesanan dp WHERE idpesanan ='$ido'");

    $all_success = true; // Menyimpan status keseluruhan eksekusi query

    while($ok = mysqli_fetch_array($cekdata)){
        $qty = $ok['qty'];
        $idproduk = $ok['idproduk'];
        $iddp = $ok['iddetailpesanan'];

        // Ambil stok saat ini
        $caristock = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idproduk'");
        $caristock2 = mysqli_fetch_array($caristock);
        $stocksekarang = $caristock2['stock'];
        
        $newstock = $stocksekarang + $qty;

        // Update stok
        $queryupdate = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idproduk'");
        if(!$queryupdate) $all_success = false;

        // Hapus detail pesanan
        $querydelete = mysqli_query($c, "DELETE FROM detailpesanan WHERE iddetailpesanan='$iddp'");
        if(!$querydelete) $all_success = false;
    }

    // Hapus pesanan utama
    $query = mysqli_query($c, "DELETE FROM pesanan WHERE idorder='$ido'");
    if(!$query) $all_success = false;

    // Periksa status
    if($all_success){
        header('location:index.php');
    } else {
        echo '
        <script>alert("Gagal menghapus salah satu data!");
        window.location.href="index.php";
        </script>';
    }
}


//ubah data detail pesanan admin
if(isset($_POST['editdetailpesananadmin'])){
    $qty = $_POST['qty'];
    $iddp = $_POST['iddp'];
    $idpr = $_POST['idpr'];
    $idp = $_POST['idp'];

    $caritau = mysqli_query($c, "select * from detailpesanan where iddetailpesanan='$iddp'");
    $caritau2 = mysqli_fetch_array($caritau);
    $qtysekarang = $caritau2['qty'];

    $caristock = mysqli_query($c,"select * from produk where idproduk='$idpr'");
    $caristock2 = mysqli_fetch_array($caristock);
    $stocksekarang = $caristock2['stock'];

    if($qty >= $qtysekarang){

        $selisih = $qty-$qtysekarang;
        $newstock = $stocksekarang-$selisih;
     
        $query1 = mysqli_query($c, "update detailpesanan set qty='$qty' where iddetailpesanan='$iddp'");
        $query2 = mysqli_query($c, "update produk set stock='$newstock' where idproduk='$idpr'");

        if($query1&&$query2){
            header('location:view.php?idp='.$idp);
        } else {
            echo '
            <script>alert("Gagal");
            window.location.href="view.php?idp='.$idp.'"
            </script>  
            ';
        }

    } else {
        $selisih = $qtysekarang-$qty;
        $newstock = $stocksekarang+$selisih;

        $query1 = mysqli_query($c, "update detailpesanan set qty='$qty' where iddetailpesanan='$iddp'");
        $query2 = mysqli_query($c, "update produk set stock='$newstock' where idproduk='$idpr'");

        if($query1&&$query2){
            header('location:view.php?idp='.$idp);
        } else {
            echo '
            <script>alert("Gagal");
            window.location.href="view.php?idp='.$idp.'"
            </script>  
            ';
        }
    }
    
    
}


//ubah data detail pesanan kasir
// Edit barang (memastikan hanya satu data yang diperbarui)
if (isset($_POST['editbarang'])) {
    $idp = $_POST['idp']; // Ambil ID produk yang diedit
    $np = $_POST['namaproduk'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Pastikan ID valid sebelum update
    if (!empty($idp)) {
        $query = mysqli_query($c, "UPDATE produk SET namaproduk='$np', deskripsi='$desc', harga='$harga' WHERE idproduk='$idp'");

        if ($query) {
            echo '<script>alert("Data berhasil diperbarui!"); window.location.href="stock.php";</script>';
        } else {
            echo '<script>alert("Gagal memperbarui data."); window.location.href="stock.php";</script>';
        }
    }
}

// Edit pelanggan (hanya pelanggan yang diedit diperbarui)
if (isset($_POST['editpelanggan'])) {
    $idpl = $_POST['idpl']; // Ambil ID pelanggan yang diedit
    $np = $_POST['namapelanggan'];
    $nt = $_POST['notelp'];
    $a = $_POST['alamat'];

    // Pastikan ID valid sebelum update
    if (!empty($idpl)) {
        $query = mysqli_query($c, "UPDATE pelanggan SET namapelanggan='$np', notelp='$nt', alamat='$a' WHERE idpelanggan='$idpl'");

        if ($query) {
            echo '<script>alert("Data pelanggan berhasil diperbarui!"); window.location.href="pelanggan.php";</script>';
        } else {
            echo '<script>alert("Gagal memperbarui pelanggan."); window.location.href="pelanggan.php";</script>';
        }
    }
}

// Edit detail pesanan (memastikan hanya satu item pesanan yang diupdate)
if (isset($_POST['editdetailpesanan'])) {
    $iddp = $_POST['iddp']; // ID detail pesanan yang diedit
    $idpr = $_POST['idpr']; // ID produk yang terkait
    $idp = $_POST['idp']; // ID pesanan
    $qty = $_POST['qty'];

    if (!empty($iddp) && !empty($idpr)) {
        // Cek qty saat ini
        $caritau = mysqli_query($c, "SELECT * FROM detailpesanan WHERE iddetailpesanan='$iddp'");
        $caritau2 = mysqli_fetch_array($caritau);
        $qtysekarang = $caritau2['qty'];

        // Cek stok produk
        $caristock = mysqli_query($c, "SELECT * FROM produk WHERE idproduk='$idpr'");
        $caristock2 = mysqli_fetch_array($caristock);
        $stocksekarang = $caristock2['stock'];

        // Hitung stok baru berdasarkan perbedaan qty
        if ($qty >= $qtysekarang) {
            $selisih = $qty - $qtysekarang;
            $newstock = $stocksekarang - $selisih;
        } else {
            $selisih = $qtysekarang - $qty;
            $newstock = $stocksekarang + $selisih;
        }

        // Update hanya data yang diedit
        $query1 = mysqli_query($c, "UPDATE detailpesanan SET qty='$qty' WHERE iddetailpesanan='$iddp'");
        $query2 = mysqli_query($c, "UPDATE produk SET stock='$newstock' WHERE idproduk='$idpr'");

        if ($query1 && $query2) {
            echo '<script>alert("Data berhasil diperbarui!"); window.location.href="view2.php?idp='.$idp.'";</script>';
        } else {
            echo '<script>alert("Gagal memperbarui detail pesanan."); window.location.href="view2.php?idp='.$idp.'";</script>';
        }
    }
}


if (isset($_POST['login'])) {
    // Ambil input username dan password dari form
    $username = mysqli_real_escape_string($c, $_POST['username']);
    $password = $_POST['password'];

    // Query untuk cek username di database
    $check = mysqli_query($c, "SELECT * FROM user WHERE username='$username'");
    $user = mysqli_fetch_assoc($check);

    // Cek apakah username ditemukan
    if ($user) {
        // Jika password di database tidak di-hash, gunakan perbandingan biasa
        if ($password === $user['password']) {
            $_SESSION['iduser'] = $user['iduser'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login'] = true;

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                header("Location: index.php");
            } else {
                header("Location: index2.php");
            }
            exit();
        } else {
            // Password salah
            echo '<script>alert("Username atau Password salah!"); window.location.href="login.php";</script>';
        }
    } else {
        // Username tidak ditemukan
        echo '<script>alert("Akun tidak ditemukan!"); window.location.href="login.php";</script>';
    }
}
?>

<!-- fungsi login -->



