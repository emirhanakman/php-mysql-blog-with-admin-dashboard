<?php

unset($_SESSION["oturum"]); // Tanımlanan SESSION'ları tek tek silmek
session_destroy(); // Tüm SESSION'ları tek seferde silmek

setcookie("oturum", "", time() - 7200, "/"); // Tanımlanan COOKIE'nin geçerlik tarihini geçmiş zamanlı yaparak geçersiz kılmak

echo '<div class="alert alert-success" role="alert">
<h4 class="alert-heading">Oturum Başarıyla Sonlandırıldı.</h4>
<hr>
<p class="mb-0">
Ana sayfaya yönlendiriliyorsunuz...
</p>
</div>';

header("Refresh: 3; ?");

?>
