<div class="header">
	<ol class="breadcrumb">
	Onaylanmış Yorumlar
	</ol>
</div>

<div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Ders</th>
                                            <th>Yorum</th>
                                            <th>Tarih</th>
                                            <th>Onayı Kaldır</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		<?php
		$sorgu = "SELECT * FROM yorumlar INNER JOIN dersler ON yorumlar.dersID=dersler.dersID INNER JOIN uyeler ON yorumlar.uyeKod = uyeler.uyeKod  WHERE onay = '1'";
		$sec = mysqli_query($baglanti, $sorgu);
		while($satir = mysqli_fetch_array($sec)){

	echo '<tr>
		<td>'.$satir["yorumID"].'</td>
		<td>'.$satir["ad"].'</td>
		<td>'.$satir["soyad"].'</td>
		<td>'.$satir["baslik"].'</td>
		<td>'.$satir["yorum"].'</td>
		<td>'.tarihYaz($satir["yorumZamani"]).'</td>
		<td><a class="btn btn-danger" href="?sayfa=onay-kaldir&id='.$satir["yorumID"].'">ONAYI KALDIR</a></td>
	</tr>';
			}
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
