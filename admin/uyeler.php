<div class="header">
	<ol class="breadcrumb">
	Üyeler
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
                                            <th>e-Posta</th>
                                            <th>Güncelle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
		<?php
		$sorgu = "SELECT * FROM uyeler";
		$sec = mysqli_query($baglanti, $sorgu);
		while($satir = mysqli_fetch_array($sec)){

	echo '<tr>
		<td>'.$satir["uyeID"].'</td>
		<td>'.$satir["ad"].'</td>
		<td>'.$satir["soyad"].'</td>
		<td>'.$satir["eposta"].'</td>
		<td><a href="?sayfa=uye-guncelle&id='.$satir["uyeID"].'"><button class="btn btn-success">GÜNCELLE</button></a></td><td>';
		if($satir["statu"]==1) echo '<a href="?sayfa=uye-sil&id='.$satir["uyeID"].'"><button class="btn btn-danger">SİL</button></a>';
	echo '</td></tr>';
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
