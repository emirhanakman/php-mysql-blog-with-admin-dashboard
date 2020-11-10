<script src="ckeditor/ckeditor.js"></script>
<?php
	$id = $_GET["id"];
	$sorgu = "SELECT * FROM dersler WHERE dersID = '$id'";
	$sec = mysqli_query($baglanti, $sorgu);
	$satir = mysqli_fetch_array($sec);
?>
<div class="header">
	<ol class="breadcrumb">
	ders Ekle
	</ol>
</div>

<div id="page-inner">

<form action="?sayfa=ders-guncelle-islem" method="post" enctype="multipart/form-data">

	<input value="<?php echo $satir["baslik"] ?>" class="form-control form-control-lg mb-3" type="text" name="ders-basligi" placeholder="ders Başlığı" required>

	<textarea id="ders-metni" name="ders-metni" required placeholder="ders Metni" style="width:100%; height: 300px"><?php echo $satir["metin"] ?></textarea>

	<br>

	Kategori: <br><select name="kategori" required>
		<?php
		$options = array("Yazılım", "Donanım", "Bilim-Teknoloji", "Grafik-Tasarım", "Haberler");
			foreach($options as $option){
				if($option==$satir["kategori"]) $secili="selected";
				else $secili="";
				echo "<option $secili>$option</option>\n";
			}
		?>
	</select>

	<br><br>

	<img height="50px" src="../manset/<?php echo $satir['resim'] ?>">

	<br><br>

	Manşet Resmi: <input type="file" name="resim">

	<br><br>

	<input type="hidden" name="id" value="<?php echo $satir['dersID'] ?>" >

	<button type="submit" class="btn btn-primary">Dersi Güncelle</button>

</form>

</div>
<script>CKEDITOR.replace( 'ders-metni' );</script>
