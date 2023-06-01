<?php 
require '../DatabaseConn/DatabaseConn.php';

// ambil id di url
$nim = $_GET["nim"];

$mhs = query("SELECT * FROM regular WHERE nim = $nim")[0];

function editData($post){
  global $conn;
  // ambil data tiap form
  $nimLama = $_GET["nim"];
  $nim = htmlspecialchars($post["nim"]);
  $nama = htmlspecialchars($post["nama"]);
  $tgllahir = htmlspecialchars($post["tgllahir"]);
  $alamat = htmlspecialchars($post["alamat"]);
  $jk = htmlspecialchars($post["jk"]);
  $fakultas = htmlspecialchars($post["fakultas"]);
  $jurusan = htmlspecialchars($post["jurusan"]);
  $email = htmlspecialchars($post["email"]);

  // kirim data ke database
  $query = "UPDATE regular SET 
            nim = '$nim', 
            nama = '$nama', 
            tgllahir = '$tgllahir', 
            alamat = '$alamat', 
            jk = '$jk', 
            fakultas = '$fakultas', 
            jurusan = '$jurusan', 
            email = '$email'

            WHERE nim = $nimLama
        ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

  if (isset($_POST["submit"])) {
    if (editData($_POST) > 0 ) {
      echo"
    <script>
      alert ('data berhasil diubah');
      document.location.href ='../';
    </script>
      ";
    } else {
      echo "
    <script>
      alert ('data berhasil diubah');
      document.location.href ='../';
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
  <title>Edit Data</title>
</head>
<body>
  <div class="form-container">
    <h3>UPDATE DATA MAHASISWA</h3>

    <form autocomplete="off" method="post" enctype="multipart/form-data">
      <label for="NIM">NIM</label>
      <input type="text" id="NIM" name="nim" value="<?= $mhs ["nim"] ?>" placeholder="Nomor Induk Mahasiswa" required>

    <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" value="<?= $mhs ["nama"] ?>" placeholder="Masukkan Nama" required>
    
    <label for="tglLahir">Tanggal Lahir</label><p></p>
      <input type="date" id="tglLahir" name="tgllahir" placeholder="Masukkan Tanggal Lahir" value="<?= $mhs ["tgllahir"] ?>"
       min="1998-01-01" max="2006-12-31"required><p></p>

	  <label for="alamat">Alamat</label>
      <input type="text" id="alamat" name="alamat" value="<?= $mhs ["alamat"] ?>" placeholder="Masukkan Alamat" required>

	  <label for="jk">Jenis Kelamin</label>
    <select id="jk" name="jk" >
      <option value="<?= $mhs ["jk"] ?>"><?= $mhs ["jk"] ?></option>
      <option value="L">Laki-laki</option>
      <option value="P">Perempuan</option>
    </select>

	  <label for="fakultas">Fakultas</label>
    <select id="fakultas" name="fakultas">
      <option  value="<?= $mhs ["fakultas"] ?>"><?= $mhs ["fakultas"] ?></option>
      <option value="Teknologi Informasi">Teknologi Informasi</option>
      <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
      <option value="Psikologi">Psikologi</option>
      <option value="Teknik">Teknik</option>
      <option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
    </select>

	  <label for="jurusan">Jurusan</label>
    <select id="jurusan" name="jurusan">
      <option  value="<?= $mhs ["jurusan"] ?>"><?= $mhs ["jurusan"] ?></option>
      <option value="Sistem Informasi">Sistem Informasi</option>
      <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
      <option value="Administrasi Publik">Administrasi Publik</option>
      <option value="Psikologi">Psikologi</option>
      <option value="Teknik Elektro">Teknik Elektro</option>
      <option value="Teknik Mesin">Teknik Mesin</option>
      <option value="Manajemen Akutansi">Manajemen Akutansi</option>
    </select>

    <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?= $mhs ["email"] ?> " placeholder="Masukkan Email" required>      

    <button type="submit" name="submit">Tambah Data</button>
    </form>
  </div>
</body>
</html>
