<?php
include "koneksi.php";

$id = $_GET ['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = $id");
$data = mysqli_fetch_assoc($ambil);


if (isset ($_POST['update'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $jk    = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];

    $sql = "UPDATE Siswa SET
         nisn = '$nins'
         nama = '$nama'
         umur = '$umur'
         alamat = '$alamat'
         jenis_kelamin = '$jk'
         agama = '$agama'
         WHERE id = '$id'";
    $ubah = mysqli_query($koneksi, $sql);

    if ($ubah) {
        header ("Location: index.php?pesan=data berhasil diubah");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
 <form method="POST" action=""> RPL
        <label>NISN:</label><br>
        <input type="text" name="nisn" value="<?php echo $data['nisn']; ?>"><br><br>

        <label>Nama:</label><br>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br><br>

        <label>Umur:</label><br>
        <input type="number" name="umur" value="<?php echo $data['umur']; ?>"><br><br>

        <label>Alamat:</label><br>
     <input type="number" name="alamat" value="<?php echo $data['alamat']; ?>"><br><br>   

     <label>Jenis Kelamin:</label><br>

<input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>> Laki-laki
<input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>> Perempuan<br><br>

<label>Agama:</label><br>
<select name="agama">
<option value="Islam" <?php if ($data['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
<option value="Kristen" <?php if ($data['agama'] == 'Kristen')  'selected'; ?>>Kristen</option>
<option value="Katolik" <?php if ($data['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
<option value="Hindu" <?php if ($data['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
<option value="Buddha" <?php if ($data['agama'] == 'Buddha') echo 'selected'; ?>>Buddha</option>
<option value="Konghucu" <?php if ($data['agama'] == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
</select><br><br>
<button type="submit" name="update">Update</button>
<a href="index.php">Batal</a>
</form>
</body>
</html>
