<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Veriler</title>
</head>

<body>

	<?php

	$esifre = md5(md5($_POST["esifre"]));
	$sifre = md5(md5($_POST["sifre"]));

	echo "Eski Şifre: $esifre <br>";
	echo "Yeni Şifre: $sifre <br>";

	$oturum = $_SESSION["oturum"];
	$sorgu = "UPDATE uyeler SET sifre = '$sifre' WHERE uyeKod = '$oturum' and sifre = '$esifre'";
	$guncelle = mysqli_query($baglanti, $sorgu);
	echo $sorgu;

	$kontrol = mysqli_affected_rows($baglanti);

	if($guncelle and $kontrol == 1){
		echo "Şifre güncelleme işlemi başarılı<br>";
	}
	else{
		echo "Şifre güncelleme işleminde sorun meydana geldi<br>";
	}

	echo "Yönlendiriliyorsunuz...";
	header("Refresh: 333; ?sayfa=sifre-guncelle");

	?>

</body>
</html>
