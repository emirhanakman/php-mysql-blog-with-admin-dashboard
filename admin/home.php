<div class="header">
	<ol class="breadcrumb">
	Ana Sayfa
	</ol>
</div>

<div id="page-inner">
	<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default">
		<div class="panel-body">
		<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" >
			<thead>
				<tr>
				<th width="300">Bilgi</th>
				<th>Sayı</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td>Toplam Ders Sayısı</td>
				<td>
					<?php
						$sorgu = "SELECT * FROM dersler";
						$sec = mysqli_query($baglanti, $sorgu);
						echo mysqli_num_rows($sec);
					?>
				</td>
				</tr>
				<tr>
					<td>Toplam Yazılım Kategorisi Ders Sayısı</td>
					<td>
						<?php
							$sorgu = "SELECT * FROM dersler WHERE kategori = 'Yazilim'";
							$sec = mysqli_query($baglanti, $sorgu);
							echo mysqli_num_rows($sec);
						?>
					</td>
				</tr>
				<tr>
					<td>Toplam Donanım Kategorisi Ders Sayısı</td>
					<td>
						<?php
							$sorgu = "SELECT * FROM dersler WHERE kategori = 'Donanim'";
							$sec = mysqli_query($baglanti, $sorgu);
							echo mysqli_num_rows($sec);
						?>
					</td>
				</tr>
				<tr>
					<td>Toplam Bilim-Teknoloji Kategorisi Ders Sayısı</td>
					<td>
						<?php
							$sorgu = "SELECT * FROM dersler WHERE kategori = 'Bilim-Teknoloji'";
							$sec = mysqli_query($baglanti, $sorgu);
							echo mysqli_num_rows($sec);
						?>
					</td>
				</tr>
				<tr>
					<td>Toplam Grafik-Tasarım Kategorisi Ders Sayısı</td>
					<td>
						<?php
							$sorgu = "SELECT * FROM dersler WHERE kategori = 'Grafik-Tasarim'";
							$sec = mysqli_query($baglanti, $sorgu);
							echo mysqli_num_rows($sec);
						?>
					</td>
				</tr>
				<tr>
					<td>Toplam Haber Kategorisi Haber Sayısı</td>
					<td>
						<?php
							$sorgu = "SELECT * FROM dersler WHERE kategori = 'Haberler'";
							$sec = mysqli_query($baglanti, $sorgu);
							echo mysqli_num_rows($sec);
						?>
					</td>
				</tr>
				<tr>
				<td>Onay Bekleyen Yorum Sayısı</td>
				<td>
					<?php
						$sorgu = "SELECT * FROM yorumlar WHERE onay = '0'";
						$sec = mysqli_query($baglanti, $sorgu);
						echo mysqli_num_rows($sec);
					?>
				</td>
				</tr>
				<tr>
				<td>Onaylı Yorum Sayısı</td>
				<td>
					<?php
						$sorgu = "SELECT * FROM yorumlar WHERE onay = '1'";
						$sec = mysqli_query($baglanti, $sorgu);
						echo mysqli_num_rows($sec);
					?>
				</td>
				</tr>
				<tr>
				<td>Toplam Üye Sayısı</td>
				<td>
					<?php
						$sorgu = "SELECT * FROM uyeler";
						$sec = mysqli_query($baglanti, $sorgu);
						echo mysqli_num_rows($sec);
					?>
				</td>
				</tr>
			</tbody>
		</table>
		</div>

		</div>
		</div>

	</div>
	</div>

</div>
