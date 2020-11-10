<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Veriler</title>
</head>

<body>

	<?php

	$ad = $_POST["ad"];
	$soyad = $_POST["soyad"];
	$dogumTarihi = $_POST["dogumTarihi"];
	$dogumYeri = $_POST["dogumYeri"];

	echo "Adı: $ad <br>";
	echo "Soyadı: $soyad <br>";
	echo "Doğum Tarihi: $dogumTarihi <br>";
	echo "Doğum Yeri: $dogumYeri <br>";

	$oturum = $_SESSION["oturum"];
	$sorgu = "UPDATE uyeler SET ad = '$ad', soyad = '$soyad', dogumYeri = '$dogumYeri', dogumTarihi = '$dogumTarihi' WHERE uyeKod = '$oturum'";
	$guncelle = mysqli_query($baglanti, $sorgu);

	if($guncelle){
		echo "Güncelleme işlemi başarılı<br>";
	}
	else{
		echo "Güncelleme işleminde sorun meydana geldi<br>";
	}

	echo "Yönlendiriliyorsunuz...";
	header("Refresh: 3; ?sayfa=bilgilerim");
/*
	$sorgu1 = "UPDATE uyeler SET ad = '$ad' WHERE uyeKod = '$oturum'";
	$guncelle1 = mysqli_query($baglanti, $sorgu1);
	if($guncelle1){
		echo "Ad güncelleme işlemi başarılı<br>";
	}
	else{
		echo "Ad güncelleme işleminde sorun meydana geldi<br>";
	}

	$sorgu2 = "UPDATE uyeler SET soyad = '$soyad' WHERE uyeKod = '$oturum'";
	$guncelle2 = mysqli_query($baglanti, $sorgu2);
	if($guncelle2){
		echo "Soyad güncelleme işlemi başarılı<br>";
	}
	else{
		echo "Soyad güncelleme işleminde sorun meydana geldi<br>";
	}
*/
	?>

</body>
</html>
