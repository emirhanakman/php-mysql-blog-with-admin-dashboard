<?php

  $server = 'localhost'; // 127.0.0.1
  $kullanici = 'root'; // beltekuser
  $sifre = ''; // 123456
  $veritabani = 'teknokul';

  $baglanti = mysqli_connect($server, $kullanici, $sifre, $veritabani);

  mysqli_query($baglanti, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");

  if($baglanti){
    // echo "Bağlantı başarılı";
  }
  else{
    echo "Bağlantıda problem var!";
  }

?>
