<?php

	$baslik = $_POST["adSoyad"]." size bir mesaj gönderdi.";

	$eposta = $_POST["eposta"];

	$mesaj = nl2br($_POST["mesaj"])."<br><br> Gönderici e-Postası: ".$eposta;

include 'class.phpmailer.php';

	$mail = new PHPMailer();
    $mail->SMTPSecure = 'tls';
    $mail->Username = "beltekhaber@hotmail.com";	//Gönderici e-Posta Adresi
    $mail->Password = "Beltek.123";	// Gönderici e-Posta Şifresi
    $mail->AddAddress("eakman209@gmail.com");	// Alıcı Adresi
    $mail->FromName = "Beltek Haber";
    $mail->Subject = $baslik;
    $mail->MsgHTML($mesaj);
    $mail->Host = "smtp.live.com";	// Gönderici e-Posta adresi Outlook ya da Hotmail ise
    $mail->Port = 587;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->From = $mail->Username;
	$mail->CharSet = 'UTF-8';
    $mail->Send();

	echo '<div class="alert alert-success" role="alert">';

	echo '<h4 class="alert-heading">Mesajınız Gönderildi, İlginiz için Teşekkürler.</h4>';

	echo '<hr>';

	echo "Yönlendiriliyorsunuz";

	echo '</div>';

	header("Refresh:3; ?sayfa=iletisim");

?>
