<?php
echo"<br>";
$dolarCek = file_get_contents("http://dolar.tlkur.com/");
preg_match('#<span class="rate" id="USDTRY">(.*?)</span>#', $dolarCek,$cikti);

$euroCek = file_get_contents("http://euro.tlkur.com/");
preg_match('#<span class="rate" id="EURTRY">(.*?)</span>#', $euroCek,$cikti2);

echo "Güncel Dolar Kuru: ".$cikti[1];
echo "<br>Güncel Euro Kuru: ".$cikti2[1];

echo "<br><br>Kurların geldiği kaynak site: <a href>http://tlkur.com/</a>";
?>
