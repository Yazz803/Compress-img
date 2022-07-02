<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
        <title>Cara Upload dan Resize Gambar dengan PHP</title>
    </head>
    <body>
        <h3>Hasil Upload dan Resize Gambar</h3>
        <hr/>
        <table border="1">
            <tr>
                <td width="20">No</td>
                <td width="200">Gambar Setelah Resize</td>
                <td>Download</td>
                <td>Hapus gambar</td>
            </tr>
            <?php
                include "functions.php";
                $id = $_GET["id"];
                $no=0;
                $query    =mysqli_query($conn, "SELECT * FROM gambar WHERE id = $id");
                while ($data    =mysqli_fetch_array($query)){
                $no++
            ?>
            <tr>
                <td><?php echo $no?></td>
                <td align="center"><?php echo "<img src='img/$data[nama_resize]' width='70%'/>"?></td>
                <td><a href="img/<?= $data['nama_resize'] ;?>" download="<?= $data['nama_resize'] ;?>" class="btn btn-success">Download</a></td>
                <form action="hapus.php?id=<?= $id;?>" method="post">
                    <td><button type="submit" class="btn btn-primary" name="hapus">Hapus</button></td>
                </form>
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>