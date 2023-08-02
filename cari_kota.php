<?php 
include('config.php');

$query = mysqli_query($koneksi, "SELECT * FROM kota WHERE id_prov='".$_POST["prov"]."'");
while($dataProv = mysqli_fetch_array($query)){
?>

    <option value="<?php echo $dataProv["id_kota"] ?>"><?php echo $dataProv["nm_kota"]?></option>

<?php }?>