<?php

  $eposta = $_POST["eposta"];
  $sifre = md5(md5($_POST["sifre"]));

  // echo $eposta."<br>";
  // echo $sifre."<br>";

  $sorgu = "SELECT * FROM uyeler WHERE eposta='$eposta' and sifre='$sifre'";

  $sec = mysqli_query($baglanti, $sorgu);

  $kayitSayisi = mysqli_num_rows($sec);

  if($kayitSayisi==1){
      $satir = mysqli_fetch_array($sec);
      echo '<div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Oturum Açma İşlemi Başarılı</h4>
      <hr>
      <p>Hoş geldiniz, '.$satir["ad"].' '.$satir["soyad"].'</p>
      <p class="mb-0">
      Ana sayfaya yönlendiriliyorsunuz...
      </p>
      </div>';

      // Tarayıcı açık kaldıkça oturumu açık tutma
      $_SESSION["oturum"]=$satir["uyeKod"];

      // Tarayıcı kapanmış olsa da oturumu saklama
  		if(isset($_POST["cerez"])) {
  			setcookie("oturum", $satir["uyeKod"], time() + (86400), "/"); // 86400 = 1 gün
  		}

      header("Refresh: 3; ?");

  }
  else{
    echo '<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Oturum Açma İşlemi Başarısız</h4>
    <hr>
    <p>Böyle bir kullanıcı bulunamadı, lütfen tekrar deneyiniz.</p>
    <p class="mb-0">
    Oturum Açma sayfasına yönlendiriliyorsunuz...
    </p>
    </div>';
    header("Refresh: 3; ?sayfa=oturum-ac");
  }

?>
