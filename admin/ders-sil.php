<?php

  $id = $_GET["id"];
  $onay = @$_GET["onay"];
  //echo $id;

  $sorgu = "SELECT * FROM dersler WHERE dersID = '$id'";
  $sec = mysqli_query($baglanti, $sorgu);

  $satir = mysqli_fetch_array($sec);
  $baslik = $satir["baslik"];

if($onay!=1){
  echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Ders Silme İşlemi</h4>
    <p>'.$baslik.' başlıklı dersi silmek istiyor musunuz?</p>
    <hr>
    <p class="mb-0">
      <a href="?sayfa=dersler">
        <button class="btn btn-primary">Hayır, Geri Dön</button>
      </a>
      <a href="?sayfa=ders-sil&id='.$id.'&onay=1">
        <button class="btn btn-success">Evet</button>
      </a>
    </p>
  </div>';
}
else if($onay==1){
  $sorgu = "DELETE FROM dersler WHERE dersID = '$id'";
  $sil = mysqli_query($baglanti, $sorgu);

  if($sil){
    echo '<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Ders Silme İşlemi</h4>
    <p>'.$baslik.' başlıklı ders sistemden başarıyla silindi.</p>
    <hr>
    <p class="mb-0">
    <a href="?sayfa=dersler"><button type="button" class="btn btn-primary">dersler Sayfasına Dön</button></a>
    </p>
    </div>';
  }
  else{
    echo '<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Ders Silme İşlemi</h4>
    <p>'.$baslik.' başlıklı dersin sistemden silinmesinde hata meydana geldi.</p>
    <hr>
    <p class="mb-0">
    <a href="?sayfa=dersler"><button type="button" class="btn btn-primary">dersler Sayfasına Dön</button></a>
    </p>
    </div>';
  }
}


?>
