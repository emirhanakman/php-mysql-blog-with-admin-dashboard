<?php

$ad = $_POST["ad"];
$soyad = $_POST["soyad"];
$dogumTarihi = $_POST["dogumTarihi"];
$dogumYeri = $_POST["dogumYeri"];
$id = $_POST["id"];

echo "ID: $id <br>";
echo "Adı: $ad <br>";
echo "Soyadı: $soyad <br>";
echo "Doğum Tarihi: $dogumTarihi <br>";
echo "Doğum Yeri: $dogumYeri <br>";


$sorgu = "UPDATE uyeler SET ad = '$ad', soyad = '$soyad', dogumYeri = '$dogumYeri', dogumTarihi = '$dogumTarihi' WHERE uyeID = '$id'";
$guncelle = mysqli_query($baglanti, $sorgu);

if($guncelle){
  echo "Güncelleme işlemi başarılı<br>";
}
else{
  echo "Güncelleme işleminde sorun meydana geldi<br>";
}

echo "Yönlendiriliyorsunuz...";
header("Refresh: 3; ?sayfa=uye-guncelle&id=$id");

?>
