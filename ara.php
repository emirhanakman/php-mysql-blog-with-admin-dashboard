<?php
	$ara = $_GET["ara"];

	// ALTER TABLE haberler ADD FULLTEXT(baslik, metin)
	$sorgu = "SELECT * FROM dersler WHERE MATCH (baslik, metin) AGAINST ('*$ara*'IN BOOLEAN MODE)";
	// $sorgu = "SELECT * FROM haberler WHERE baslik LIKE '%$ara%' OR metin LIKE '%$ara%'";
	$sec = mysqli_query($baglanti, $sorgu);
	$kacTane = mysqli_num_rows($sec);
	echo "<h4>Arama Sonuçları: $ara ($kacTane sonuç bulundu.)</h4>";

	echo '<div class="card-group" style="margin-bottom:10px;">';
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
			<a href="?sayfa=haber&id='.$satir["dersID"].'" class="btn btn-primary stretched-link">Haberi Oku</a>
		</div>
	</div>
	</div>';
	}

 echo "</div>";
?>
