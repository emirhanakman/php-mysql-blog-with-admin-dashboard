<div class="bd-example" style="max-width:1000px; height:300px; margin: 10px auto">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
  <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
</ol>
<div class="carousel-inner">
  <?php

    $sorgu = "SELECT DISTINCT kategori FROM dersler ORDER BY dersID DESC LIMIT 5"; // kategorilerin son ders girilme sırasını verir
    $sec = mysqli_query($baglanti, $sorgu);
    $sayac = 0;
    while ($satir=mysqli_fetch_array($sec)){
      $kategori = $satir["kategori"];
      $dersSorgu = "SELECT * FROM dersler WHERE kategori = '$kategori' ORDER BY dersID DESC LIMIT 1";
      $dersSec = mysqli_query($baglanti, $dersSorgu);
      $dersSatir=mysqli_fetch_array($dersSec);
      if($sayac==0) echo '<div class="carousel-item active">';
      else echo '<div class="carousel-item">';
              echo '<a href="?sayfa=ders&id='.$dersSatir["dersID"].'"><img src="manset/'.$dersSatir["resim"].'" class="d-block w-100" alt="..." style="height: 300px; object-fit: cover;"></a>
              <a href="?sayfa=ders&id='.$dersSatir["dersID"].'"><div class="carousel-caption d-none d-md-block">
                <h5>'.$dersSatir["baslik"].'</h5>
              </div></a>
            </div>';
            $sayac++;
    }
  ?>
</div>
<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>


  <div class="alert alert-danger" role="alert" style="margin:0">YAZILIM BÖLÜMÜ</div>

  <div class="card-group" style="margin-bottom:10px;">
  <?php
  $sorgu = "SELECT * FROM dersler WHERE kategori='Yazilim' ORDER BY dersID DESC LIMIT 1,3";
  $sec = mysqli_query($baglanti, $sorgu);
  while($satir = mysqli_fetch_array($sec)){
    $metin = $satir["metin"];
    $metin = strip_tags($metin); // metindeki resimleri temizler
    $ozet = substr($metin, 0, 200); // metnin ilk 200 karakterini alır
    $ozet = str_replace("&nbsp;", '', $ozet); // özetteki boşlukları temizler
  echo '<div class="col-md-4">
  <div class="card">
    <img src="manset/'.$satir["resim"].'" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title">'.$satir["baslik"].'</h5>
      <p class="card-text">'.$ozet.'...</p>
      <p class="card-text"><small class="text-muted">'.$satir["tarih"].'</small></p>
      <a href="?sayfa=ders&id='.$satir["dersID"].'" class="btn btn-primary stretched-link">Konuyu Aç</a>
    </div>
  </div>
  </div>';
  }
  ?>
  </div>

  <div class="alert alert-primary" role="alert" style="margin:0">DONANIM BÖLÜMÜ</div>

  <div class="card-group" style="margin-bottom:10px;">
  <?php
  $sorgu = "SELECT * FROM dersler WHERE kategori='Donanim' ORDER BY dersID DESC LIMIT 1,3";
  $sec = mysqli_query($baglanti, $sorgu);
  while($satir = mysqli_fetch_array($sec)){
    $metin = $satir["metin"];
    $metin = strip_tags($metin); // metindeki resimleri temizler
    $ozet = substr($metin, 0, 200); // metnin ilk 200 karakterini alır
    $ozet = str_replace("&nbsp;", '', $ozet); // özetteki boşlukları temizler
  echo '<div class="col-md-4">
  <div class="card">
    <img src="manset/'.$satir["resim"].'" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title">'.$satir["baslik"].'</h5>
      <p class="card-text">'.$ozet.'...</p>
      <p class="card-text"><small class="text-muted">'.$satir["tarih"].'</small></p>
      <a href="?sayfa=ders&id='.$satir["dersID"].'" class="btn btn-primary stretched-link">Konuyu Aç</a>
    </div>
  </div>
  </div>';
  }
  ?>
  </div>

  <div class="alert alert-success" role="alert" style="margin:0">BILIM-TEKNOLOJI BÖLÜMÜ</div>

  <div class="card-group" style="margin-bottom:10px;">
  <?php
  $sorgu = "SELECT * FROM dersler WHERE kategori='Bilim-Teknoloji' ORDER BY dersID DESC LIMIT 1,3";
  $sec = mysqli_query($baglanti, $sorgu);
  while($satir = mysqli_fetch_array($sec)){
    $metin = $satir["metin"];
    $metin = strip_tags($metin); // metindeki resimleri temizler
    $ozet = substr($metin, 0, 200); // metnin ilk 200 karakterini alır
    $ozet = str_replace("&nbsp;", '', $ozet); // özetteki boşlukları temizler
  echo '<div class="col-md-4">
  <div class="card">
    <img src="manset/'.$satir["resim"].'" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title">'.$satir["baslik"].'</h5>
      <p class="card-text">'.$ozet.'...</p>
      <p class="card-text"><small class="text-muted">'.$satir["tarih"].'</small></p>
      <a href="?sayfa=ders&id='.$satir["dersID"].'" class="btn btn-primary stretched-link">Konuyu Aç</a>
    </div>
  </div>
  </div>';
  }
  ?>
  </div>

  <div class="alert alert-info" role="alert" style="margin:0">GRAFIK-TASARIM BÖLÜMÜ</div>

  <div class="card-group" style="margin-bottom:10px;">
  <?php
  $sorgu = "SELECT * FROM dersler WHERE kategori='Grafik-Tasarim' ORDER BY dersID DESC LIMIT 1,3";
  $sec = mysqli_query($baglanti, $sorgu);
  while($satir = mysqli_fetch_array($sec)){
    $metin = $satir["metin"];
    $metin = strip_tags($metin); // metindeki resimleri temizler
    $ozet = substr($metin, 0, 200); // metnin ilk 200 karakterini alır
    $ozet = str_replace("&nbsp;", '', $ozet); // özetteki boşlukları temizler
  echo '<div class="col-md-4">
  <div class="card">
    <img src="manset/'.$satir["resim"].'" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title">'.$satir["baslik"].'</h5>
      <p class="card-text">'.$ozet.'...</p>
      <p class="card-text"><small class="text-muted">'.$satir["tarih"].'</small></p>
      <a href="?sayfa=ders&id='.$satir["dersID"].'" class="btn btn-primary stretched-link">Konuyu Aç</a>
    </div>
  </div>
  </div>';
  }
  ?>
  </div>

  <div class="alert alert-warning" role="alert" style="margin:0">HABER BÖLÜMÜ</div>

  <div class="card-group" style="margin-bottom:10px;">
  <?php
  $sorgu = "SELECT * FROM dersler WHERE kategori='Haberler' ORDER BY dersID DESC LIMIT 1,3";
  $sec = mysqli_query($baglanti, $sorgu);
  while($satir = mysqli_fetch_array($sec)){
    $metin = $satir["metin"];
    $metin = strip_tags($metin); // metindeki resimleri temizler
    $ozet = substr($metin, 0, 200); // metnin ilk 200 karakterini alır
    $ozet = str_replace("&nbsp;", '', $ozet); // özetteki boşlukları temizler
  echo '<div class="col-md-4">
  <div class="card">
    <img src="manset/'.$satir["resim"].'" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
    <div class="card-body">
      <h5 class="card-title">'.$satir["baslik"].'</h5>
      <p class="card-text">'.$ozet.'...</p>
      <p class="card-text"><small class="text-muted">'.$satir["tarih"].'</small></p>
      <a href="?sayfa=ders&id='.$satir["dersID"].'" class="btn btn-primary stretched-link">Konuyu Aç</a>
    </div>
  </div>
  </div>';
  }
  ?>
  </div>
