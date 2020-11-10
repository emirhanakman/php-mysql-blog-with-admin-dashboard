<form action="?sayfa=mesaj-gonder" method="post" style="max-width:1000px; margin: 20px auto;">
  <fieldset class="border p-2">
    <legend>İletişim</legend>
    <div class="form-group">
      <label for="adSoyad">Adınız Soyadınız</label>
      <input type="text" class="form-control" name="adSoyad" placeholder="Adınız Soyadınız">
    </div>
    <div class="form-group">
      <label for="eposta">e-Postanız</label>
      <input type="email" class="form-control" name="eposta" placeholder="e-Postanız">
    </div>
    <div class="form-group">
      <label for="mesaj">Mesajınız</label>
      <textarea class="form-control" name="mesaj" placeholder="Mesajınız" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Gönder</button>
  </fieldset>
</form>
