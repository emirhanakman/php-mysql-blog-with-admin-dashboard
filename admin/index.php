<?php
ob_start();
session_start();

include("../ayarlar.php");
include("../fonksiyonlar.php");

date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME,"tr_TR");

	@$oturum = $_SESSION["oturum"];
	$sorgu = "SELECT * FROM uyeler WHERE uyeKod = '$oturum'";
	$sec = mysqli_query($baglanti, $sorgu);
	$satir = mysqli_fetch_array($sec);
	$statu = $satir["statu"];
	$ekleyenID = $satir["uyeID"];

	if($statu != 0 or $oturum==null){
		header("Location: ../index.php");
		exit();
	}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>TEKNOKUL | DASHBOARD</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">
	<script src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="background-color: #000000" href="index.php"><img src="/img/logo.png"WIDTH=200 HEIGHT=47 alt="" /></a>

		<div id="sideNav" href="">
		<i class="fa fa-bars icon"></i>
		</div>
            </div>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php"><i class="fa fa-home"></i>Ana Sayfa</a>
                    </li>

                    <li>
                        <a href="?sayfa=uyeler"><i class="fa fa-table"></i>Üyeler</a>
                    </li>

					<li>
                        <a href="?sayfa=ders-ekle"><i class="fa fa-edit"></i>Ders Ekle</a>
                    </li>

					<li>
                        <a href="?sayfa=resim-kutuphanesi"><i class="fa fa-edit"></i>Resim Kütüphanesi</a>
                    </li>

					<li>
                        <a href="?sayfa=dersler"><i class="fa fa-edit"></i>Dersler</a>
                    </li>

					<li>
                        <a href="?sayfa=onay-bekleyen-yorumlar"><i class="fa fa-edit"></i>Onay Bekleyen Yorumlar</a>
                    </li>

					<li>
                        <a href="?sayfa=onayli-yorumlar"><i class="fa fa-edit"></i>Onaylı Yorumlar</a>
                    </li>
										<li>
																	<a href="?sayfa=bot"><i class="fa fa-edit"></i>Bot Haber Getir</a>
															</li>
															<li>
																						<a href="?sayfa=kurCek"><i class="fa fa-edit"></i>Dolar ve Euro Kurları</a>
																				</li>
					<li>

                        <a href="../"><i class="fa fa-rocket"></i>Frontend Sayfası</a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

		<div id="page-wrapper">
					<?php
						$sayfa = @$_GET["sayfa"];

						if($sayfa==null){
							include("home.php");
						}
						else{
							include($sayfa.".php");
						}

					?>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>


	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>

	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


    <!-- Chart Js -->
    <script type="text/javascript" src="assets/js/Chart.min.js"></script>
    <script type="text/javascript" src="assets/js/chartjs.js"></script>

    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    	</script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

</body>

</html>
