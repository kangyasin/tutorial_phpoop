<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require 'proses/panggil.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tutorial Membuat CRUD PHP OOP dengan PDO MySQL</title>
		<!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- jQuery -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <!-- DATATABLES BS 4-->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <!-- BOOTSTRAP 4-->
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>

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
                    <a href="buku/index.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Data Buku</a>

                    <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                    <br/><br/>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $hasil = $proses->tampil_data('tbl_user');
                                    foreach($hasil as $isi){
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $isi['nama_pengguna']?></td>
                                        <td><?php echo $isi['telepon'];?></td>
                                        <td><?php echo $isi['email'];?></td>
                                        <td><?php echo $isi['alamat'];?></td>
                                        <td><?php echo $isi['username'];?></td>
                                        <td>****</td>
                                        <td style="text-align: center;">
                                            <a href="edit.php?id=<?php echo $isi['id_login'];?>" class="btn btn-success btn-md">
                                            <span class="fa fa-edit"></span>Edit </a>
                                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="proses/crud.php?aksi=hapus&hapusid=<?php echo $isi['id_login'];?>"
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
