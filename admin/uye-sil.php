<?php

  $id = $_GET["id"];
  $onay = @$_GET["onay"];
  //echo $id;

  $sorgu = "SELECT * FROM uyeler WHERE uyeID = '$id'";
  $sec = mysqli_query($baglanti, $sorgu);

  $satir = mysqli_fetch_array($sec);
  $uyeAd = $satir["ad"];
  $uyeSoyad = $satir["soyad"];
  $uyeStatu = $satir["statu"];
  //echo "Adı: $uyeAd <br>";
  //echo "Soyadı: $uyeSoyad <br>";
  //echo "Statü: $uyeStatu <br>";

if($uyeStatu==0){
  echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Üye Silme İşlemi</h4>
  <p>'.$uyeAd.' '.$uyeSoyad.' adlı üye yönetici olduğu için silinemez</p>
  <hr>
  <p class="mb-0">
  <a href="?sayfa=uyeler"><button type="button" class="btn btn-primary">Geri Dön</button></a>
  </p>
  </div>';
}
else if($onay!=1){
  echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Üye Silme İşlemi</h4>
    <p>'.$uyeAd.' '.$uyeSoyad.' adlı kullanıcıyı silmek istiyor musunuz?</p>
    <hr>
    <p class="mb-0">
      <a href="?sayfa=uyeler">
        <button class="btn btn-primary">Hayır, Geri Dön</button>
      </a>
      <a href="?sayfa=uye-sil&id='.$id.'&onay=1">
        <button class="btn btn-success">Evet</button>
      </a>
    </p>
  </div>';
}
else if($onay==1){
  $sorgu = "DELETE FROM uyeler WHERE uyeID = '$id'";
  $sil = mysqli_query($baglanti, $sorgu);

  if($sil){
    echo '<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Üye Silme İşlemi</h4>
    <p>'.$uyeAd.' '.$uyeSoyad.' adlı üye sistemden başarıyla silindi.</p>
    <hr>
    <p class="mb-0">
    <a href="?sayfa=uyeler"><button type="button" class="btn btn-primary">Üyeler Sayfasına Dön</button></a>
    </p>
    </div>';
  }
  else{
    echo '<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Üye Silme İşlemi</h4>
    <p>'.$uyeAd.' '.$uyeSoyad.' adlı üyenin sistemden silinmesinde hata meydana geldi.</p>
    <hr>
    <p class="mb-0">
    <a href="?sayfa=uyeler"><button type="button" class="btn btn-primary">Üyeler Sayfasına Dön</button></a>
    </p>
    </div>';
  }
}


?>
