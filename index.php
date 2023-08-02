<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combo box</title>
</head>
<body>
    <?php include('config.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    Provinsi :  <select name="provinsi" id="provinsi">
        <option value="">-- Pilih Provinsi --</option>

        <!-- Looping Provinsi -->
        <?php 
        $queryProv = mysqli_query($koneksi, "SELECT * FROM provinsi");
        while($dataProv = mysqli_fetch_array($queryProv)) {
        ?>
            <option value="<?php echo $dataProv['id_prov'] ?>"><?php echo $dataProv["nm_prov"]?></option>
        <?php }?>
    </select>

    &nbsp;&nbsp;&nbsp;<img src="loader.gif" alt="loading" width="10px" id="imgLoad" style="display:none;">

    Kota :  <select name="kota" id="kota">
        <!-- Hasil data dari cari_kota.php -->
    </select>

    <script>
        $("#provinsi").change(function(){
            // Variable dari Combo Box
            var id_provinsi = $("#provinsi").val();

            // Tampilkan Image Load
            $('#imgLoad').show();

            // Mengirim dan Mengambil Data
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "cari_kota.php",
                data: {prov: id_provinsi}, 
                success: function(msg){
                    // JIKA TIDAK ADA DATA
                    if (msg.trim() === '') {
                        alert('TIDAK ADA DATA KOTA');
                    }
                    // JIKA DAPAT MENGAMBIL DATA
                    else {
                        $("#kota").html(msg);
                    }
                    // Hilangkan image load
                    $('#imgLoad').hide();
                }
            });
        });
    </script>
</body>
</html>