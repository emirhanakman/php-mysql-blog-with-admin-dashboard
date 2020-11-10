<?php
$dolarCek = file_get_contents("http://dolar.tlkur.com/");
preg_match('#<span class="rate" id="USDTRY">(.*?)</span>#', $dolarCek,$cikti);

$euroCek = file_get_contents("http://euro.tlkur.com/");
preg_match('#<span class="rate" id="EURTRY">(.*?)</span>#', $euroCek,$cikti2);
echo'<div class="alert alert-dark" role="alert">Güncel Dolar Kuru: '.$cikti[1].'</div>';
echo'<div class="alert alert-dark" role="alert">Güncel Euro Kuru: '.$cikti2[1].'</div>';
//-------------------------------------------------------------------------------------------------BOT DOLAR EURO KURLARI

  $kategori = $_GET["kategori"];
  $veri = array("yazilim"=>array("danger","YAZILIM"),
                "donanim"=>array("primary","DONANIM"),
                "bilim-teknoloji"=>array("success","BILIM-TEKNOLOJI"),
                "grafik-tasarim"=>array("info","GRAFIK-TASARIM"),
                "haberler"=>array("warning","HABERLER"),
                );
  echo '<div class="alert alert-'.$veri[$kategori][0].'" role="alert" style="margin:0">'.$veri[$kategori][1].'</div>';
  echo '<div class="card-group" style="margin-bottom:10px;">';

  $sorgu = "SELECT * FROM dersler WHERE kategori='$kategori' ORDER BY dersID DESC";
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
      <a href="?sayfa=ders&id='.$satir["dersID"].'" class="btn btn-primary stretched-link">Konuyu Oku</a>
    </div>
  </div>
  </div>';
  }

 echo "</div>";
?>
