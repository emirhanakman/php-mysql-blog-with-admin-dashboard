<!doctype html>
<?php
  session_start();
  include("ayarlar.php");
  include("fonksiyonlar.php");

  if(isset($_COOKIE["oturum"])){
    $_SESSION["oturum"] = $_COOKIE["oturum"];
    setcookie("oturum", $_SESSION["oturum"], time() + (86400), "/"); // 86400 = 1 gün Çerezi 1 gün daha uzat
  }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">

    <title>Teknokul | Bilişim Teknoloji Eğitim</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container" style="max-width: 1240px; margin: 0 auto">
      <a class="navbar-brand" href="?"><IMG SRC="/img/logo.png" ALT="En Son Ders" WIDTH=150 HEIGHT=60></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="?sayfa=dersler&kategori=yazilim">Yazılım</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?sayfa=dersler&kategori=donanim">Donanım</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?sayfa=dersler&kategori=bilim-teknoloji">Bilim-Teknoloji</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?sayfa=dersler&kategori=grafik-tasarim">Grafik-Tasarım</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?sayfa=dersler&kategori=haberler">Haberler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?sayfa=iletisim">İletişim</a>
          </li>
          <?php
          if(@$_SESSION["oturum"]==null){
          echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kullanıcı İşlemleri
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="?sayfa=uye-ol">Üye Ol</a>
              <a class="dropdown-item" href="?sayfa=oturum-ac">Oturum Aç</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Şifremi Unuttum</a>
            </div>
          </li>';
        }
          else{
            $oturum = $_SESSION["oturum"];
            $sorgu = "SELECT * FROM uyeler WHERE uyeKod='$oturum'";
            $sec = mysqli_query($baglanti, $sorgu);
            $satir = mysqli_fetch_array($sec);
            $statu = $satir["statu"];
            $adSoyad = $satir["ad"]." ".$satir["soyad"];
            echo '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                '.$adSoyad.'
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?sayfa=bilgilerim">Bilgilerim</a>
                <a class="dropdown-item" href="?sayfa=sifre-guncelle">Şifre Güncelle</a>';
                if($statu == 0) echo '<a class="dropdown-item" href="admin">Yönetim Paneli</a>';
                echo '<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?sayfa=oturumu-kapat">Oturum Kapat</a>
              </div>
            </li>';
          }
        ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input type="hidden" name="sayfa" value="ara" />
          <input class="form-control mr-sm-2" type="search" placeholder="Ara bul bakalım :)" name="ara" aria-label="Search" value="<?php echo @$_GET["ara"]; ?>">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ara</button>
        </form>
      </div>
    </div>
      </nav>
    <main style="max-width:1000px; margin: 10px auto">
      <?php
        $sayfa = @$_GET['sayfa'];
        if($sayfa == null) {
          include("home.php");
        }
        else {
          include("$sayfa.php");
        }
      ?>
    </main>

    <?php include("footer.php"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
