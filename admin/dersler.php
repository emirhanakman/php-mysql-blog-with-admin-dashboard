<div class="header">
	<ol class="breadcrumb">
	dersler
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
                                            <th>Ders Başlığı</th>
                                            <th>Ekleyen</th>
																						<th>Kategori</th>
                                            <th>Tarih</th>
                                            <th>Güncelle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php

	$sorgu = "SELECT * FROM dersler INNER JOIN uyeler ON dersler.ekleyen = uyeler.uyeKod";
	$veriler = mysqli_query($baglanti, $sorgu);
	while($veri = mysqli_fetch_array($veriler)){
	echo '<tr>';
	echo '<td>'.$veri["dersID"].'</td>';
	echo '<td>'.$veri["baslik"].'</td>';
	echo '<td>'.$veri["ad"].' '.$veri["soyad"].'</td>';
	echo '<td>'.$veri["kategori"].'</td>';
	echo '<td>'.$veri["tarih"].'</td>';
	echo '<td><a href="?sayfa=ders-guncelle&id='.$veri["dersID"].'"><button class="btn btn-success">GÜNCELLE</button></a></td>';
	echo '<td><a href="?sayfa=ders-sil&id='.$veri["dersID"].'"><button class="btn btn-danger">SİL</button></a></td>';
	echo '</tr>';
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
