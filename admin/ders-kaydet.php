<?php

$baslik = addslashes($_POST["ders-basligi"]);
$metin = $_POST["ders-metni"];
$kategori = $_POST["kategori"];
//$resim = "ornek.png";
$okunmaSayisi = 0;
$yorumSayisi = 0;
$tarih = date("Y-m-d H:i:s");
$ekleyen = $_SESSION["oturum"];

$dosyaAdi = $_FILES["resim"]["name"];
$geciciAdres = $_FILES["resim"]["tmp_name"];
$boyut = $_FILES["resim"]["size"];
$hataKodu = $_FILES["resim"]["error"];
$tip = $_FILES["resim"]["type"];

$parcala = explode(".",$dosyaAdi);
$uzanti = end($parcala); // Bir dizinin son elemanına ulaşma

$yeniAd = uniqid().".".$uzanti;
$yeniAdres = "../manset/$yeniAd";

$yukle = move_uploaded_file($geciciAdres, $yeniAdres);

$sorgu = "INSERT INTO dersler (baslik, metin, resim, kategori, tarih, okunmaSayisi, yorumSayisi, ekleyen) VALUES ('$baslik', '$metin', '$yeniAd', '$kategori', '$tarih', '$okunmaSayisi', '$yorumSayisi', '$ekleyen')";
$ekle = mysqli_query($baglanti, $sorgu);

if($ekle && $yukle){
  echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Ders Ekleme İşlemi</h4>
  <p>'.$baslik.' başlıklı ders '.$kategori.' kategorisine başarıyla eklenmiştir.</p>
  <hr>
  <p class="mb-0">
  <a href="?sayfa=dersler"><button type="button" class="btn btn-primary">dersler Sayfasına Git</button></a>
  <a href="?sayfa=ders-ekle"><button type="button" class="btn btn-success">Yeni ders Ekle</button></a>
  </p>
  </div>';
}
else{
  echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Ders Ekleme İşleminde Hata Meydana Geldi</h4>
  <p>'.$baslik.' başlıklı ders '.$kategori.' kategorisine eklenememiştir.</p>
  <hr>
  <p class="mb-0">
  <a href="?sayfa=dersler"><button type="button" class="btn btn-primary">dersler Sayfasına Git</button></a>
  <button type="button" class="btn btn-success" onclick="window.history.go(-1)">Tekrar Dene</button>
  </p>
  </div>';
}

?>
