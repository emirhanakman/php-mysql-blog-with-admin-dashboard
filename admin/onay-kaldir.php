<div class="header">
	<ol class="breadcrumb">
	Onay Kaldır
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
$hid = $satir["yorum"];

if($onay!=1){

	echo '<div class="alert alert-danger" role="alert">';

	echo '<h4 class="alert-heading">"'.$yorum."\" yorumunun onayını kaldırmayı onaylıyor musunuz?</h4>";

	echo '<hr>';

	echo '<a class="btn btn-success" href="?sayfa=onay-kaldir&id='.$id.'&onay=1">Onayla</a>';

	echo '<br><br>';

	echo '<a class="btn btn-info" href="?sayfa=onayli-yorumlar">Geri Dön</a>';

	echo '</div>';

}
else if($onay==1){

	$sorgu = "UPDATE yorumlar SET onay=0 WHERE yorumID='$id'";

	$sil = mysqli_query($baglanti, $sorgu);

	if($sil){

		mysqli_query($baglanti,"UPDATE dersler SET yorumSayisi = yorumSayisi-1 WHERE haberID='$hid'");

		echo '<div class="alert alert-success" role="alert">';

		echo '<h4 class="alert-heading">"'.$yorum.'" yorumunun onayı başarıyla kaldırıldı</h4>';
		
		echo '<hr>';

		echo "Yönlendiriliyorsunuz";

		header("Refresh:2; ?sayfa=onayli-yorumlar");
	}


}

?>
