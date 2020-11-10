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
	$eposta = $_POST["eposta"];
	$sifre = md5(md5($_POST["sifre"]));
	$dogumTarihi = $_POST["dogumTarihi"];
	$dogumYeri = $_POST["dogumYeri"];
	$uyeKod = uniqid();
	$statu = 1;
	$sorgu = "INSERT INTO uyeler (uyeKod, ad, soyad, eposta, sifre, dogumYeri, dogumTarihi, statu) VALUES ('$uyeKod', '$ad', '$soyad', '$eposta', '$sifre', '$dogumYeri', '$dogumTarihi', '$statu')";
	$kayit = mysqli_query($baglanti, $sorgu);
	if($kayit){
		echo "Üye Kaydı Başarılı";
		echo "<br>";
		echo "Ana sayfaya yönlendiriliyorsunuz";
		header("Refresh: 2; index.php");
	}
	else{
		echo "Kayıtta Hata Meydana Geldi";
		echo "<br>";
		echo "Lütfen formu tekrar doldurunuz";
		header("Refresh: 2; ?sayfa=uye-ol");

	}

	?>

</body>
</html>
