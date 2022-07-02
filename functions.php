<?php
$conn = mysqli_connect("localhost", "root", "", "compress_img");

if ($_POST['submit'] == "Upload") {
    $nama   = $_FILES['file_gambar']['name'];
    $size   = $_FILES['file_gambar']['size']; 
    $asal   = $_FILES['file_gambar']['tmp_name'];
    $format = pathinfo($nama, PATHINFO_EXTENSION);

    $ekstensiGambar = explode('.', $nama);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    
    // setup ukuran lebar gambar (width)
    $width_size = 1250;
    
    if ($format=="jpg" OR $format=="jpeg") {
        move_uploaded_file($asal, "img/".$namaFileBaru);
        $asli ="img/".$namaFileBaru;
        $nama_baru    = "Yazz803_" . $namaFileBaru;
        $gambar_asli      = imagecreatefromjpeg ($asli);
        $lebar_asli     = imageSX($gambar_asli);
        $tinggi_asli     = imageSY($gambar_asli);
        $pembagi         = $lebar_asli / $width_size;
        $lebar_baru     = $lebar_asli/$pembagi ;
        $tinggi_baru     = $tinggi_asli/$pembagi ;

        $img = imagecreatetruecolor($lebar_baru, $tinggi_baru);
        imagecopyresampled($img, $gambar_asli, 0, 0, 0, 0, $lebar_baru, $tinggi_baru, $lebar_asli, $tinggi_asli);
        imagejpeg($img, "img/". $nama_baru);
        imagedestroy($gambar_asli);
        imagedestroy($img);

        
        $insert= mysqli_query ($conn, "INSERT INTO gambar (nama_resize) VALUES ('$nama_baru')");
        if($insert){
            ?>
                <script language="JavaScript">
                    <?php include('koneksi.php');?>
                    <?php $query = mysqli_query($conn, "SELECT * FROM gambar ORDER BY id DESC") ;?>
                    <?php while($data = mysqli_fetch_assoc($query)) :?>
                    document.location='view-gambar.php?id=<?= $data['id'];?>';
                    </script>
                    <?php endwhile;?>
            <?php
        }
        else {
            echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
        }
        if(unlink("$asli"));
    }
    
    else if ($format=="png") {
        move_uploaded_file($asal, "img/".$namaFileBaru);
        $asli ="img/".$namaFileBaru;
        $nama_baru    = "Yazz803_" . $namaFileBaru;
        $gambar_asli      = imagecreatefrompng ($asli);
        $lebar_asli     = imageSX($gambar_asli);
        $tinggi_asli     = imageSY($gambar_asli);
        $pembagi         = $lebar_asli / $width_size;
        $lebar_baru     = $lebar_asli/$pembagi ;
        $tinggi_baru     = $tinggi_asli/$pembagi ;

        $img = imagecreatetruecolor($lebar_baru, $tinggi_baru);
        imagecopyresampled($img, $gambar_asli, 0, 0, 0, 0, $lebar_baru, $tinggi_baru, $lebar_asli, $tinggi_asli);
        imagejpeg($img, "img/". $nama_baru);
        imagedestroy($gambar_asli);
        imagedestroy($img);

        
        $insert= mysqli_query ($conn, "INSERT INTO gambar (nama_resize) VALUES ('$nama_baru')");
        if($insert){
            ?>
                <script language="JavaScript">
                    <?php include('koneksi.php');?>
                    <?php $query = mysqli_query($conn, "SELECT * FROM gambar ORDER BY id DESC") ;?>
                    <?php while($data = mysqli_fetch_assoc($query)) :?>
                    document.location='view-gambar.php?id=<?= $data['id'];?>';
                    </script>
                    <?php endwhile;?>
            <?php
        }
        else {
            echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
        }
        if(unlink("$asli"));
    }
    
    else if ($format=="gif") {
        move_uploaded_file($asal, "img/".$namaFileBaru);
        $asli ="img/".$namaFileBaru;
        $nama_baru    = "Yazz803_" . $namaFileBaru;
        $gambar_asli      = imagecreatefromgif ($asli);
        $lebar_asli     = imageSX($gambar_asli);
        $tinggi_asli     = imageSY($gambar_asli);
        $pembagi         = $lebar_asli / $width_size;
        $lebar_baru     = $lebar_asli/$pembagi ;
        $tinggi_baru     = $tinggi_asli/$pembagi ;

        $img = imagecreatetruecolor($lebar_baru, $tinggi_baru);
        imagecopyresampled($img, $gambar_asli, 0, 0, 0, 0, $lebar_baru, $tinggi_baru, $lebar_asli, $tinggi_asli);
        imagejpeg($img, "img/". $nama_baru);
        imagedestroy($gambar_asli);
        imagedestroy($img);

        
        $insert= mysqli_query ($conn, "INSERT INTO gambar (nama_resize) VALUES ('$nama_baru')");
        if($insert){
            ?>
                <script language="JavaScript">
                    document.location='view-gambar.php';
                    </script>
            <?php
        }
        else {
            echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
        }
        if(unlink("$asli"));
    }
}


?>