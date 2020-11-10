<?php
$veri = file_get_contents("https://www.webtekno.com/haber");
echo"<br>";
preg_match_all('@<span class="content-timeline--underline">(.*?)</span>@si',$veri,$baslik);
preg_match_all('@<h5 class="content-timeline__detail__category">(.*?)</h5>@si',$veri,$kategori);
echo"Sıcak Sıcak Haberler Var :)<br>";
echo"Haberlere Buradan Ulaşabilirsin: https://www.webtekno.com/haber";
    for ($i=0; $i <10; $i++) {
      $kat = $kategori[0][$i];
      $bas = $baslik[0][$i];
      echo"<pre><strong>Haber Başlığı:</strong><h4>$bas</h4><br><strong>Haber Kategorisi: </strong>$kat</pre>";
    }


 ?>
