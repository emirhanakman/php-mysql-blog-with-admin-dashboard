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
<form action="?sayfa=sifre-degistir" method="post" style="max-width:1000px; margin: 20px auto;">
      <fieldset class="border p-2">
        <legend>Şifre Güncelle</legend>
        <div class="form-group">
          <label for="esifre">Eski Şifreniz</label>
          <input type="password" class="form-control" id="esifre" name="esifre" placeholder="Eski Şifreniz" required>
        </div>
        <div class="form-group">
          <label for="sifre">Yeni Şifreniz</label>
          <input onkeyup="sifreKarsilastir()" type="password" class="form-control" id="sifre" name="sifre" placeholder="Yeni Şifreniz" required>
        </div>
        <div class="form-group">
          <label for="sifret">Yeni Şifreniz (Tekrar)</label>
          <input onkeyup="sifreKarsilastir()" type="password" class="form-control" id="sifret" name="sifret" placeholder="Yeni Şifreniz (Tekrar)" required>
        </div>
        <div id="kontrol">

        </div>
  <br><br>
  <button onclick="sifreKontrol()" type="submit" class="btn btn-primary">Güncelle</button>
</fieldset>
</form>

<script type="text/javascript">
  function sifreKontrol(){

    var sifre = document.getElementById('sifre').value;
    var sifret = document.getElementById('sifret').value;
    var esifre = document.getElementById('esifre').value;

    if(sifre!=sifret){
      alert("Şifreler uyuşmuyor!");
      document.getElementById('sifret').value = null;
    }

    if(esifre == sifre){
      alert("Yeni şifreniz eski şifreniz ile aynı olamaz!");
      document.getElementById('sifre').value = null;
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
