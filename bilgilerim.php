<?php

  if(@$_SESSION["oturum"]==null){
      # header('Location: index.php');
      header('Location: ?');
      exit();
  }
  $oturum = $_SESSION["oturum"];
  $sorgu = "SELECT * FROM uyeler WHERE uyeKod = '$oturum' ";
  $sec = mysqli_query($baglanti, $sorgu);

  $satir = mysqli_fetch_array($sec);

?>
<form action="?sayfa=uye-guncelle" method="post" style="max-width:1000px; margin: 20px auto;">
      <fieldset class="border p-2">
        <legend>Üyelik Bilgilerini Güncelle</legend>
  <div class="form-group">
    <label for="ad">Adınız</label>
    <input type="text" class="form-control" name="ad" placeholder="Adınız" value="<?php echo $satir["ad"]; ?>" required>
  </div>
  <div class="form-group">
    <label for="ad">Soyadınız</label>
    <input type="text" class="form-control" name="soyad" placeholder="Soyadınız" value="<?php echo $satir["soyad"]; ?>" required>
  </div>
  <div class="form-group">
    <label for="eposta">e-Postanız</label>
    <input readonly disabled type="email" class="form-control" name="eposta" placeholder="e-Postanız" value="<?php echo $satir["eposta"]; ?>" required>
  </div>
  <div class="form-group">
    <label for="dogumTarihi">Doğum Tarihi</label>
    <input type="date" class="form-control" name="dogumTarihi" placeholder="Doğum Tarihi" value="<?php echo $satir["dogumTarihi"]; ?>" required>
  </div>
  <label for="dogumYeri">Doğum Yeriniz</label>
  <select class="custom-select" name="dogumYeri" required>

    <?php

    $iller = array("Adana", "Adıyaman", "Afyon", "Ağrı", "Amasya", "Ankara", "Antalya", "Artvin", "Aydın", "Balıkesir", "Bilecik", "Bingöl", "Bitlis", "Bolu", "Burdur", "Bursa", "Çanakkale", "Çankırı", "Çorum", "Denizli", "Diyarbakır", "Edirne", "Elazığ", "Erzincan", "Erzurum", "Eskişehir", "Gaziantep", "Giresun", "Gümüşhane", "Hakkari", "Hatay", "Isparta", "Mersin", "İstanbul", "İzmir", "Kars", "Kastamonu", "Kayseri", "Kırklareli", "Kırşehir", "Kocaeli", "Konya", "Kütahya", "Malatya", "Manisa", "Kahramanmaraş", "Mardin", "Muğla", "Muş", "Nevşehir", "Niğde", "Ordu", "Rize", "Sakarya", "Samsun", "Siirt", "Sinop", "Sivas", "Tekirdağ", "Tokat", "Trabzon", "Tunceli", "Şanlıurfa", "Uşak", "Van", "Yozgat", "Zonguldak", "Aksaray", "Bayburt", "Karaman", "Kırıkkale", "Batman", "Şırnak",
  	"Bartın", "Ardahan", "Iğdır", "Yalova", "Karabük", "Kilis", "Osmaniye", "Düzce");

  	foreach ($iller as $il) {
  		if($satir["dogumYeri"] != $il) echo "<option>$il</option>";
  		else echo "<option selected>$il</option>";
  	}

    ?>

  </select>
  <br><br>
  <button onclick="sifreKontrol()" type="submit" class="btn btn-primary">Güncelle</button>
</fieldset>
</form>

<script type="text/javascript">
  function sifreKontrol(){

    var sifre = document.getElementById('sifre').value;
    var sifret = document.getElementById('sifret').value;

    if(sifre!=sifret){
      alert("Şifreler uyuşmuyor!");
      document.getElementById('sifret').value = null;
    }

  }

  function sifreKarsilastir(){
    var sifre = document.getElementById('sifre').value;
    var sifret = document.getElementById('sifret').value;

    if(sifre!=sifret){
      document.getElementById('kontrol').innerHTML= "Şifreler uyuşmuyor!";
    }
    else{
      document.getElementById('kontrol').innerHTML= "Şifreler eşleşti!";
    }
  }

</script>
