<script src="ckeditor/ckeditor.js"></script>
<div class="header">
	<ol class="breadcrumb">
	Yeni Ders Ekle
	</ol>
</div>

<div id="page-inner">

<form action="?sayfa=ders-kaydet" method="post" enctype="multipart/form-data">

	<input class="form-control form-control-lg mb-3" type="text" name="ders-basligi" placeholder="ders Başlığı" required>

	<textarea id="ders-metni" name="ders-metni" required placeholder="Ders Metni" style="width:100%; height: 300px"></textarea>

	<br>

	Kategori: <br><select name="kategori" required>
		<option>Yazilim</option>
		<option>Donanim</option>
		<option>Bilim-Teknoloji</option>
		<option>Grafik-Tasarim</option>
		<option>Haberler</option>
	</select>

	<br><br>

	Manşet Resmi: <input type="file" name="resim">

	<br><br>

	<button type="submit" class="btn btn-primary">Ders/Haber Ekle</button>

</form>

</div>
<script>CKEDITOR.replace( 'ders-metni' );</script>
