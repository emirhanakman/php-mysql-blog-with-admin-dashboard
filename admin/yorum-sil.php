<div class="header">
	<ol class="breadcrumb">
	Yorum Sil
	</ol>
</div>

<div id="page-inner">

<?php

$id = $_GET["id"];
$onay = @$_GET["onay"];
$sorgu = "SELECT * FROM yorumlar WHERE yorumID='$id'";
$sec = mysqli_query($baglanti, $sorgu);
$satir = mysqli_fetch_array($sec);
$yorum = $satir["yorum"];

if($onay!=1){

	echo '<div class="alert alert-danger" role="alert">';

	echo '<h4 class="alert-heading">"'.$yorum."\" yorumunu silmeyi onaylıyor musunuz?</h4>";

	echo '<hr>';

	echo '<a class="btn btn-success" href="index.php?sayfa=yorum-sil&id='.$id.'&onay=1">Onayla</a>';

	echo '<br><br>';

	echo '<a class="btn btn-info" href="index.php?sayfa=onay-bekleyen-yorumlar">Geri Dön</a>';

	echo '</div>';

}
else if($onay==1){

	$sorgu = "DELETE FROM yorumlar WHERE yorumID='$id'";

	$sil = mysqli_query($baglanti, $sorgu);

	if($sil){

		echo '<div class="alert alert-success" role="alert">';

		echo '<h4 class="alert-heading">"'.$yorum.'" yorum başarıyla silindi</h4>';

		echo '<hr>';

		echo "Yönlendiriliyorsunuz";

		header("Refresh:2; ?sayfa=onay-bekleyen-yorumlar");
	}


}

?>
