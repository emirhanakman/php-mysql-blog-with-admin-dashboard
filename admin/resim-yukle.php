<div class="alert alert-info" role="alert">
<h4 class="alert-heading">Resim Yükleme İşlemleri</h4>
<hr>

<?php
		$dosyaSayisi = count($_FILES["resimler"]["name"]);
		for($i=0;$i<$dosyaSayisi;$i++){
		$dosyaAdi = $_FILES["resimler"]["name"][$i];
		$geciciAdres = $_FILES["resimler"]["tmp_name"][$i];
		$boyut = $_FILES["resimler"]["size"][$i];
		$hataKodu = $_FILES["resimler"]["error"][$i];
		$tip = $_FILES["resimler"]["type"][$i];

		$parcala = explode(".",$dosyaAdi);
		$uzanti = end($parcala); // Bir dizinin son elemanına ulaşma

		$damga = date("ymdHis");

		$yeniAd = $damga.uniqid().".".$uzanti;
		$yeniAdres = "../kutuphane/$yeniAd";

		$yukle = move_uploaded_file($geciciAdres,$yeniAdres);

		if($yukle){
			echo $dosyaAdi." dokümanı başarıyla yüklendi.<br>";
		}
		else echo $dosyaAdi." yüklenirken hata meydana geldi.<br>";
	}

	echo "<hr>";
	echo "Yönlendiriliyorsunuz";
	echo "</div>";

	// header("Refresh:2; index.php?sayfa=resim-kutuphanesi");

?>
