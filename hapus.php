<?php
include 'functions.php';
$id = $_GET["id"];
$query = mysqli_query($conn, "SELECT * FROM gambar WHERE id = $id");
while ($data = mysqli_fetch_assoc($query)){
    $file = "img/" . $data['nama_resize'];
    unlink($file);

    $hapus = mysqli_query($conn, "DELETE FROM gambar WHERE id = $id");
    if($hapus){
        header("Location: index.php");
    }
}

?>