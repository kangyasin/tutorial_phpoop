<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require '../proses/panggil.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>List Data Buku</title>
		<!-- BOOTSTRAP 4-->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- DATATABLES BS 4-->
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <!-- DATATABLES BS 4-->
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP 4-->
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>

	</head>
    <body style="background:#586df5;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

                    <?php if(!empty($_SESSION['ADMIN'])){?>
                    <br/>
                    <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
                    <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    <br/><br/>
                    <a href="../index.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Data User</a>

                    <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah Buku</a>
                    <br/><br/>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Buku</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $hasil = $proses->tampil_data('tbl_buku');
                                    foreach($hasil as $buku){
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $buku['judul_buku']?></td>
                                        <td><?php echo $buku['penulis'];?></td>
                                        <td><?php echo $buku['kategori'];?></td>
                                        <td><?php echo 'Rp '.number_format($buku['harga']);?></td>
                                        <td style="text-align: center;">
                                            <a href="edit.php?id=<?php echo $buku['id'];?>" class="btn btn-success btn-md">
                                            <span class="fa fa-edit"></span>Edit</a>
                                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../proses/crud.php?aksi=hapus_buku&hapusid=<?php echo $buku['id'];?>"
                                            class="btn btn-danger btn-md"><span class="fa fa-trash"></span>Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php }else{?>
                        <br/>
                        <div class="alert alert-info">
                            <h3> Maaf Anda Belum Dapat Akses CRUD, Silahkan Login Terlebih Dahulu !</h3>
                            <hr/>
                            <p><a href="login.php">Login Disini</a></p>
                        </div>
                    <?php }?>
			    </div>
			</div>
		</div>
        <script>
            $('#mytable').dataTable();
        </script>
	</body>
</html>
