<?php

	function tara($data) {
		$data = strip_tags($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = str_replace("%","",$data);
		$data = str_replace("'"," ",$data);
		$data = str_replace("chr(34)"," ",$data);
		$data = str_replace("chr(39)"," ",$data);
		$data = str_replace("="," ",$data);
		$data = str_replace("&"," ",$data);
		$data = str_replace("¿"," ",$data);
		return $data;
	}
	function karakter($bul){
		$bulunacak = array('ç','Ç','ı','İ','ğ','Ğ','ü','ö','Ş','ş','Ö','Ü',',',' ','(',')','[',']','!','\'');
		$degistir  = array('c','C','i','I','g','G','u','o','S','s','O','U','','_','','','','','','');
		$sonuc=str_replace($bulunacak, $degistir, $bul);
		return $sonuc;
	}
	function tarihYaz($tarih){
		$tarih = date('j M Y - H:i', strtotime($tarih));
		$ae = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		$at = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");

		return(str_replace($ae,$at,$tarih));
	}

?>
