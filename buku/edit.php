<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';

    // tampilkan form edit
    $idGet = strip_tags($_GET['id']);
    $hasil = $proses->tampil_data_id('tbl_buku','id',$idGet);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Buku</title>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
			<div class="float-right">
				<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Edit Buku - <?php echo $hasil['judul_buku'];?></h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input
						dengan method post ke proses crud dengan paramater get aksi edit -->
							<form action="../proses/crud.php?aksi=edit_buku" method="POST">
                <input type="hidden" value="<?php echo $hasil['id'];?>" class="form-control" name="id">

								<div class="form-group">
									<label>Judul Buku </label>
									<input type="text" value="<?php echo $hasil['judul_buku'];?>" class="form-control" name="judul_buku">
								</div>
								<div class="form-group">
									<label>Penulis</label>
									<input type="text" value="<?php echo $hasil['penulis'];?>" class="form-control" name="penulis">
								</div>
								<div class="form-group">
									<label>Kategori</label>
									<input type="text" value="<?php echo $hasil['kategori'];?>" class="form-control" name="kategori">
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="number" value="<?php echo $hasil['harga'];?>" class="form-control" name="harga">
								</div>

								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Edit Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>
