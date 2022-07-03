<?php 

    require "functions.php";

    // ambil data di URL

    // error_reporting (E_ALL ^ (E_NOTICE | E_WARNING));
    $id = $_GET["id"];

    // Sanitizes input thoroughly.

    // query mahasiswa berdasarkan id
    $mhs = query("SELECT * FROM mahasiswa WHERE id =$id")[0];
    var_dump($mhs["nama"]);


    // cek apakah tombol submit sudah diubah atau belum
    if (isset($_POST["submit"])) {

        if(ubah($_POST) > 0){
            // echo "Data berhasil ditambahkan";

            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href='index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href='index.php';
                </script>
            ";
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>

    <h1>Edit data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id", value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama", value="<?= $mhs["gambar"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required
                value="<?= $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required\
                value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email"\
                value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan"
                value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <img src="img/<?= $mhs['gambar']; ?>" width="50px" alt=""> <br>
                <input type="file" name="gambar" id="gambar"?>
            </li>
            <li>
                <button type="submit" name="submit">Edit Data</button>
            </li>
        </ul>

    </form>
    
</body>
</html>