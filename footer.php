<style type="text/css">
footer {
  background: #222;
  color: #aaa;
  padding-top: 10px;
}

footer a {
  color: #aaa;
}

footer a:hover {
  color: #fff;
}

footer h3 {
 color: #0894d1;
  letter-spacing: 1px;
  margin: 30px 0 20px;
}

footer .three-column {
 overflow: hidden;
}

footer .three-column li{
 width: 33.3333%;
  float: left;
  padding: 5px 0;
}

footer .socila-list {
  overflow: hidden;
  margin: 20px 0 10px;
}

footer .socila-list li {
  float: left;
  margin-right: 3px;
  opacity: 0.7;
  overflow: hidden;
  border-radius: 50%;
  transition: all 0.3s ease-in-out;
}

footer .socila-list li:hover {
  opacity: 1;
}

footer .img-thumbnail {
  background: rgba(0, 0, 0, 0.2);
  border: 1px solid #444;
  margin-bottom: 5px;
}

footer .copyright {
  padding: 15px 0;
  background: #333;
  margin-top: 20px;
  font-size: 15px;
}

footer .copyright span {
  color: #0894d1;
}
</style>
<footer>
  <div class="container" style="max-width:1050px;">
    <div class="row">

      <div class="col-lg-4 col-md-6">
        <h3>En Popüler Dersler</h3>
        <ul class="list-unstyled">
          <?php
            $sorgu = "SELECT * FROM dersler ORDER BY ((yorumSayisi*2)+okunmaSayisi) DESC LIMIT 5";
            $sec = mysqli_query($baglanti, $sorgu);
            while($satir = mysqli_fetch_array($sec)){
              echo "<a href='?sayfa=ders&id=".$satir["dersID"]."'>".$satir["baslik"]."</a><br>";
            }
          ?>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6">
        <h3>Çok Yorumlanan Dersler</h3>
        <ul class="list-unstyled">
          <?php
            $sorgu = "SELECT * FROM dersler ORDER BY yorumSayisi DESC LIMIT 5";
            $sec = mysqli_query($baglanti, $sorgu);
            while($satir = mysqli_fetch_array($sec)){
              echo "<a href='?sayfa=ders&id=".$satir["dersID"]."'>".$satir["baslik"]."</a><br>";
            }
          ?>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6">
        <h3>En Çok İzlenen Dersler</h3>
        <ul class="list-unstyled">
          <?php
            $sorgu = "SELECT * FROM dersler ORDER BY okunmaSayisi DESC LIMIT 5";
            $sec = mysqli_query($baglanti, $sorgu);
            while($satir = mysqli_fetch_array($sec)){
              echo "<a href='?sayfa=ders&id=".$satir["dersID"]."'>".$satir["baslik"]."</a><br>";
            }
          ?>
        </ul>
      </div>

    </div>
  </div>
  <div class="copyright text-center">
    <strong> Teknokul Platformu | 2019 </strong>
  </div>
</footer>
