<div class="header">
	<ol class="breadcrumb">
	Resim Kütüphanesi
	</ol>
</div>


<div id="page-inner">

	<div class="col-md-12" style="margin-bottom: 20px">
		<div class="row">
			<form action="?sayfa=resim-yukle" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Dosya Yükle</legend>
				<input required class="custom-file-input" type="file" name="resimler[]" multiple>

				<input class="btn btn-primary" type="submit" value="Yükle">
			</fieldset>
			</form>
		</div>
	</div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
																						<th>Dosya Adı</th>
																						<th>Küçük Resim</th>
																						<th>Bağlantı</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
				<?php

				$dizin = opendir("../kutuphane"); //listelenecek dizin

				while (($dosya = readdir($dizin)) !== false) // https://www.php.net/manual/tr/function.readdir.php

				{ if(! is_dir($dosya)){
					echo "<tr>";
					echo "<td>$dosya</td>";
					echo "<td><img height='50' src='../kutuphane/$dosya'></td>";
					echo '<td><input style="position: absolute; left: -1000px; top: -1000px" value="../kutuphane/'.$dosya.'" id="'.$dosya.'"><button class="btn btn-primary" onclick="kopyala(\''.$dosya.'\')">URL Kopyala</button></td>';
					echo "<td><a class='btn btn-danger' href='?sayfa=resim-sil&id=$dosya'>SİL</a></td>";
					echo "</tr>"; } }

				closedir($dizin);

				?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>

<script type="text/javascript">
	function kopyala(id) {
		var copyText = document.getElementById(id);
		copyText.select();
		document.execCommand("copy"); // resim url'sinin hafızaya kopyalanması
		alert("Bağlantı Kopyalandı.");
}
</script>
