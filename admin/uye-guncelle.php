<?php

	$id = $_GET["id"];
	$sorgu = "SELECT * FROM uyeler WHERE uyeID = '$id'";
	$sec = mysqli_query($baglanti, $sorgu);
	$satir = mysqli_fetch_array($sec);

	$iller = array(1=>"Adana", "Adıyaman", "Afyon", "Ağrı", "Amasya", "Ankara", "Antalya", "Artvin", "Aydın", "Balıkesir", "Bilecik", "Bingöl", "Bitlis", "Bolu", "Burdur", "Bursa", "Çanakkale", "Çankırı", "Çorum", "Denizli", "Diyarbakır", "Edirne", "Elazığ", "Erzincan", "Erzurum", "Eskişehir", "Gaziantep", "Giresun", "Gümüşhane", "Hakkari", "Hatay", "Isparta", "Mersin", "İstanbul", "İzmir", "Kars", "Kastamonu", "Kayseri", "Kırklareli", "Kırşehir", "Kocaeli", "Konya", "Kütahya", "Malatya", "Manisa", "Kahramanmaraş", "Mardin", "Muğla", "Muş", "Nevşehir", "Niğde", "Ordu", "Rize", "Sakarya", "Samsun", "Siirt", "Sinop", "Sivas", "Tekirdağ", "Tokat", "Trabzon", "Tunceli", "Şanlıurfa", "Uşak", "Van", "Yozgat", "Zonguldak", "Aksaray", "Bayburt", "Karaman", "Kırıkkale", "Batman", "Şırnak", "Bartın", "Ardahan", "Iğdır", "Yalova", "Karabük", "Kilis", "Osmaniye", "Düzce");

?>

<div class="header">
	<ol class="breadcrumb">
	Üye Güncelle
	</ol>
</div>

<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body" style="max-width: 720px">
					<form action="?sayfa=uye-guncelle-islem" method="post">
						<div class="form-group row">
							<label for="full_name" class="col-md-4 col-form-label text-md-right">Adı</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="ad" value="<?php echo $satir["ad"] ?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="email_address" class="col-md-4 col-form-label text-md-right">Soyadı</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="soyad" value="<?php echo $satir["soyad"] ?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="user_name" class="col-md-4 col-form-label text-md-right">e-Posta</label>
							<div class="col-md-12">
								<input readonly type="email" class="form-control" name="eposta" value="<?php echo $satir["eposta"] ?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="phone_number" class="col-md-4 col-form-label text-md-right">Doğum Yeri</label>
							<div class="col-md-12">
								<select class="form-control" name="dogumYeri" required>
									<?php
										foreach($iller as $il){
											if($il==$satir["dogumYeri"]) $secili="selected";
											else $secili="";
											echo "<option $secili>$il</option>\n";
										}
									?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="present_address" class="col-md-4 col-form-label text-md-right">Doğum Tarihi</label>
							<div class="col-md-12">
								<input type="date" class="form-control" name="dogumTarihi" value="<?php echo $satir["dogumTarihi"] ?>" required>
							</div>
						</div>

						<input type="hidden" name="id" value="<?php echo $satir["uyeID"] ?>">

						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
							Üye Bilgilerini Güncelle
							</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
