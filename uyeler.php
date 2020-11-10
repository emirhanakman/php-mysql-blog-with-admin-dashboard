
<?php
$sorgu = "SELECT * FROM uyeler"; # Tüm kayıtları listele
$sec = mysqli_query($baglanti, $sorgu);
while ($satir = mysqli_fetch_array($sec)) {
  echo $satir["ad"]." ".$satir["soyad"]."<br>";
}
?>
