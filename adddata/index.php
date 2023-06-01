<?php 
  require '../DatabaseConn/DatabaseConn.php';

  function tambahData($post){
    global $conn;

    // ambil data dari setiap form
    $nim = htmlspecialchars($post["nim"]);
    $nama = htmlspecialchars($post["nama"]);
    $tgllahir = htmlspecialchars($post["tgllahir"]);
    $alamat = htmlspecialchars($post["alamat"]);
    $jurusan = htmlspecialchars($post["jurusan"]);
    $fakultas = htmlspecialchars($post["fakultas"]);
    $jk = htmlspecialchars($post["jk"]);
    $email = htmlspecialchars($post["email"]);

    // push ke database
    $query = "INSERT INTO regular 
              VALUES
              ('$nim',
               '$nama',
               '$tgllahir',
               '$alamat',
               '$jurusan',
               '$fakultas',
               '$jk',
               '$email')
              ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }

  if (isset($_POST['submit'])) {
    // cek data berhasil ditambah atau tidak
    if (tambahData($_POST) > 0 ) {
      echo "
      <script>
      alert ('data berhasil ditambahkan');
      document.location.href ='../';
      </script>
      ";
    } else {
      echo "
      <script>
      alert ('data gagal ditambahkan');
      </script>
      ";
    }



  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Add Data</title>
</head>
<body>
  <div class="form-container">
    <h3>INSERT DATA MAHASISWA</h3>

    <form autocomplete="off" method="post">
      <label for="NIM">NIM</label>
      <input type="text" id="NIM" name="nim" placeholder="Nomor Induk Mahasiswa" required>

    <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
    
    <label for="tglLahir">Tanggal Lahir</label><p></p>
      <input type="date" id="tglLahir" name="tgllahir" placeholder="Masukkan Tanggal Lahir" value="1998-01-01"
       min="1998-01-01" max="2006-12-31"required><p></p>

	  <label for="alamat">Alamat</label>
      <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>

	  <label for="jk">Jenis Kelamin</label>
    <select id="jk" name="jk">
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select>

	  <label for="fakultas">Fakultas</label>
    <select id="fakultas" name="fakultas">
      <option value="Teknologi Informasi">Teknologi Informasi</option>
      <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
      <option value="Psikologi">Psikologi</option>
      <option value="Teknik">Teknik</option>
      <option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
    </select>

	  <label for="jurusan">Jurusan</label>
    <select id="jurusan" name="jurusan">
      <option value="Sistem Informasi">Sistem Informasi</option>
      <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
      <option value="Administrasi Publik">Administrasi Publik</option>
      <option value="Psikologi">Psikologi</option>
      <option value="Teknik Elektro">Teknik Elektro</option>
      <option value="Teknik Mesin">Teknik Mesin</option>
      <option value="Manajemen Akutansi">Manajemen Akutansi</option>
    </select>

    <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Masukkan Email" required>      

      <button type="submit" name="submit">Tambah Data</button>
    </form>
  </div>
</body>
</html>
