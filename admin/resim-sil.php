<div class="header">
	<ol class="breadcrumb">
	Üye Sil
	</ol>
</div>

<div id="page-inner">

<?php

$id = $_GET["id"];
$onay = @$_GET["onay"];

if($onay!=1){

	echo '<div class="alert alert-danger" role="alert">';

	echo '<h4 class="alert-heading">'.$id." adlı dosyayı serverdan tamamen silmeyi onaylıyor musunuz?</h4>";

	echo '<hr>';

	echo '<a class="btn btn-success" href="index.php?sayfa=resim-sil&id='.$id.'&onay=1">Onayla</a>';

	echo '<br><br>';

	echo '<a class="btn btn-info" href="index.php?sayfa=resim-kutuphanesi">Geri Dön</a>';

	echo '</div>';

}
else if($onay==1){

	$sil = unlink("../kutuphane/$id");

	if($sil){

		echo '<div class="alert alert-success" role="alert">';

		echo '<h4 class="alert-heading">'.$id.' adlı dosyayı serverdan başarıyla silindi</h4>';

		echo '<hr>';

		echo "Yönlendiriliyorsunuz";

		header("Refresh:2; index.php?sayfa=resim-kutuphanesi");
	}
	else{
		echo '<div class="alert alert-danger" role="alert">';

		echo '<h4 class="alert-heading">Silme İşlemi Başarısız</h4>';

		echo '<hr>';

		echo "Yönlendiriliyorsunuz";

		header("Refresh:2; index.php?sayfa=resim-kutuphanesi");
	}

}

?>
