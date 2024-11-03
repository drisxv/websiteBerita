<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO XI RPL 1</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
    <h1>PENDATAAN BARANG</h1><br>
    <div class="form_div">
    <form method="POST" action="assets/script/action_add.php">
        <table>
            <tr>
                <td>Image Path</td>
                <td><input type="text" name="image_path"></td>
            </tr>
            <tr>
                <td>Judul Berita</td>
                <td><input type="text" name="judul_berita"></td>
            </tr>
            <tr>
                <td>deskripsi berita</td>
                <td><textarea type="text" name="deskripsi_berita"></textarea></td>
            </tr>    
            <tr>
                <td>Watching Time</td>
                <td><input type="text" name="watching_time"></td>
            </tr> 
            <tr>
                <td></td>
                <td><input type="submit" value="INPUT"></td>
            </tr>
        </table>
    </form>
    </div>
    <script src="assets/script/script.js"></script>
</body>
</html>
