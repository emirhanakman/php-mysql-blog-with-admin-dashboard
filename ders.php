<?php
  $dersID = $_GET["id"];
  //echo $dersID;

  $sorgu = "SELECT * FROM dersler WHERE dersID = '$dersID'";
  $sec = mysqli_query($baglanti, $sorgu);
  $satir = mysqli_fetch_array($sec);

?>

<h1><?php echo $satir["baslik"]; ?></h1>

<img src="manset/<?php echo $satir["resim"]; ?>" alt="" style="width:100%">

<article style="text-align:justify; margin: 10px 0;">
<?php echo $satir["metin"]; ?>
</article>

<hr>

<section style="text-align:justify; margin: 10px 0;">
<h2>Yorumlar</h2>
<?php
  $sorgu = "SELECT * FROM yorumlar INNER JOIN uyeler ON yorumlar.uyeKod = uyeler.uyeKod WHERE dersID='$dersID' and onay='1' ORDER BY yorumID DESC";
  $sec = mysqli_query($baglanti, $sorgu);
  while($satir = mysqli_fetch_array($sec)){
    echo "<strong>".$satir["ad"]." ".$satir["soyad"]."</strong> ".tarihYaz($satir["yorumZamani"])."<br>";
    echo $satir["yorum"];
    echo "<hr>";
  }

  if(mysqli_num_rows($sec)==0)
  echo "Henüz bu derse yorum yapılmadı, ilk yorum yapan sen ol!";

?>

</section>

<section style="text-align:justify; margin: 10px 0;">
<h2>Yorum Yap</h2>
<?php
if(@$_SESSION["oturum"]==null) echo 'Yorum yapabilmek için üye girişi yapmanız gerekmektedir.';
else echo '<form action="?sayfa=yorum-yap" method="post">
<textarea class="form-control" name="yorum" style="max-width: 500px; max-height:200px" required></textarea>
<br>
<input type="hidden" name="dersID" value="'.$dersID.'">
<button type="submit" class="btn btn-primary">Yorumu Gönder</button>
</form>';
?>
</section>

<?php
  $sorgu = "UPDATE dersler SET okunmaSayisi = okunmaSayisi + 1 WHERE dersID = '$dersID'";
  $guncelle = mysqli_query($baglanti, $sorgu);
?>
