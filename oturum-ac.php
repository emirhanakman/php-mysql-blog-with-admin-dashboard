<?php

  if(@$_SESSION["oturum"]!=null){
      header('Location: ?');
      exit();
  }

?>
<form action="?sayfa=giris" method="post" style="max-width:1000px; margin: 20px auto;">
      <fieldset class="border p-2">
        <legend>Oturum Aç</legend>
  <div class="form-group">
    <label for="eposta">e-Postanız</label>
    <input type="email" class="form-control" name="eposta" placeholder="e-Postanız">
  </div>
  <div class="form-group">
    <label for="sifre">Şifreniz</label>
    <input type="password" class="form-control" name="sifre" placeholder="Şifreniz">
  </div>
  <div class="form-group">
    <div class="custom-control custom-checkbox mr-sm-2">
      <input type="checkbox" class="form-check-input" name="cerez">
      <label>Oturum Açık Kalsın</label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Oturum Aç</button>
</fieldset>
</form>
