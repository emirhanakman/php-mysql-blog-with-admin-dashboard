<?php

  $uyeKod = $_SESSION["oturum"];
  $yorum = $_POST["yorum"];
  $dersID = $_POST["dersID"];
  $yorumZamani = date("Y-m-d H:i:s");
  $onay = 0;


  $sorgu = "SELECT * FROM uyeler WHERE uyeKod='$oturum'";
  $sec = mysqli_query($baglanti, $sorgu);
  $satir = mysqli_fetch_array($sec);
  $statu = $satir["statu"];
  if ($statu == 0) $onay = 1;

  $sorgu = "INSERT INTO yorumlar (uyeKod, yorum, dersID, yorumZamani, onay) VALUES ('$uyeKod', '$yorum', '$dersID', '$yorumZamani', '$onay')";
  $ekle = mysqli_query($baglanti, $sorgu);
  //echo $sorgu;
  if($ekle and $statu==0){
    echo '<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Yorum Ekleme İşlemi</h4>
    <p>Yorumunuz başarıyla yayınlandı.</p>
    <hr>
    <p class="mb-0">
    <a href="?sayfa=ders&id='.$dersID.'"><button type="button" class="btn btn-primary">derse Dön</button></a>
    </p>
    </div>';
  }
  elseif($ekle and $statu==1){
    echo '<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Yorum Ekleme İşlemi</h4>
    <p>Yorumunuz başarıyla kaydedildi, yönetici onayından sonra yayınlanacaktır</p>
    <hr>
    <p class="mb-0">
    <a href="?sayfa=ders&id='.$dersID.'"><button type="button" class="btn btn-primary">derse Dön</button></a>
    </p>
    </div>';
  }
  else{
    echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Yorum Ekleme İşlemi</h4>
    <p>Yorumunuz sisteme kaydedilemedi, lütfen tekrar deneyiniz.</p>
    <hr>
    <p class="mb-0">
    <a href="?sayfa=ders&id='.$dersID.'"><button type="button" class="btn btn-primary">derse Dön</button></a>
    </p>
    </div>';
  }

?>
