<?php
    require 'panggil.php';

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $nama = strip_tags($_POST['nama']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $alamat = strip_tags($_POST['alamat']);
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);

        $tabel = 'tbl_user';
        # proses insert
        $data[] = array(
            'username'		=>$user,
            'password'		=>md5($pass),
            'nama_pengguna'	=>$nama,
            'telepon'		=>$telepon,
            'email'			=>$email,
            'alamat'		=>$alamat
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
    }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama']);
		$telepon = strip_tags($_POST['telepon']);
		$email = strip_tags($_POST['email']);
		$alamat = strip_tags($_POST['alamat']);
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

        // jika password tidak diisi
        if($pass == '')
        {
            $data = array(
                'username'		=>$user,
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }else{

            $data = array(
                'username'		=>$user,
                'password'		=>md5($pass),
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
    }

    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan
            echo "<script>window.location='../index.php';</script>";
        }

        if(!empty($_GET['aksi'] == 'tambah_produk'))
        {
          // isi codenya
        }
    }

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah_buku'))
    {
        $judul_buku = strip_tags($_POST['judul_buku']);
        $penulis = strip_tags($_POST['penulis']);
        $harga = strip_tags($_POST['harga']);
        $kategori = strip_tags($_POST['kategori']);

        $tabel = 'master_buku';
        # proses insert
        $data[] = array(
            'judul_buku'		=>$judul_buku,
            'penulis'	=>$penulis,
            'harga'		=>$harga,
            'kategori'			=>$kategori,
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../buku/index.php"</script>';
    }

    if(!empty($_GET['aksi'] == 'edit_buku'))
  	{
      $judul_buku = strip_tags($_POST['judul_buku']);
      $penulis = strip_tags($_POST['penulis']);
      $harga = strip_tags($_POST['harga']);
      $kategori = strip_tags($_POST['kategori']);

          $data = array(
              'judul_buku'		=>$judul_buku,
              'penulis'	=>$penulis,
              'harga'		=>$harga,
              'kategori'			=>$kategori
          );
          $tabel = 'master_buku';
          $where = 'id';
          $id = strip_tags($_POST['id']);
          $proses->edit_data($tabel,$data,$where,$id);
          echo '<script>alert("Edit Buku Data Berhasil");window.location="../buku/index.php"</script>';
      }

      if(!empty($_GET['aksi'] == 'hapus_buku'))
      {
          $tabel = 'master_buku';
          $where = 'id';
          $id = strip_tags($_GET['hapusid']);
          $proses->hapus_data($tabel,$where,$id);
          echo '<script>alert("Hapus Data Berhasil");window.location="../buku/index.php"</script>';
      }
?>
