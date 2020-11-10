<div class="header">
	<ol class="breadcrumb">
	Ders Güncelle
	</ol>
</div>

<div id="page-inner">

		<?php

		$id = $_POST["id"];
		$baslik = addslashes($_POST["ders-basligi"]);
		$metin = $_POST["ders-metni"];
		$kategori = $_POST["kategori"];


		$sorgu1 = "UPDATE dersler SET baslik='$baslik' WHERE dersID='$id'";

		$gun1 = mysqli_query($baglanti, $sorgu1);

		$sorgu2 = "UPDATE dersler SET metin='$metin' WHERE dersID='$id'";

		$gun2=mysqli_query($baglanti, $sorgu2);

		$sorgu3 = "UPDATE dersler SET kategori='$kategori' WHERE dersID='$id'";

		$gun3=mysqli_query($baglanti, $sorgu3);

			$resim = $_FILES["resim"]["name"];

			if($resim!=null){
				$dosyaAdi = $_FILES["resim"]["name"];
				$geciciAdres = $_FILES["resim"]["tmp_name"];

				$yeniAd = uniqid().".".$uzanti;
				$yeniAdres = "../manset/$yeniAd";

				$yukle = move_uploaded_file($geciciAdres, $yeniAdres);

				$sorgu4 = "UPDATE dersler SET resim='$yeniAd' WHERE dersID='$id'";

				$gun4=mysqli_query($baglanti, $sorgu4);
			}


		echo '<div class="alert alert-success" role="alert">';

		echo '<h4 class="alert-heading">Günceleme İşlemi Başarılı</h4>';

		echo '<hr>';

		echo "Yönlendiriliyorsunuz";

		header("Refresh:2; index.php?sayfa=ders-guncelle&id=$id");

		?>

</div>
