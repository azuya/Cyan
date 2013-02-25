<?php require $site["enzyme"]["site_content"].'themes/'.$site["site"]["theme"].'/index.php'; ?>

<br>i18n ----------------<br>
<?php
// ---
putenv("LC_ALL=sv_SE");
setlocale(LC_ALL, 'sv_SE.utf-8', 'swedish');
if (function_exists("bindtextdomain")) {
	$domain = "messages";
	
	echo "[".APPPATH . "lang"."]<br>";
	
	bindtextdomain($domain, APPPATH . "/lang");
	textdomain($domain);
	bind_textdomain_codeset($domain, 'UTF-8');
	echo _("Users")."<br>";
	echo gettext("Users")."<br>";
}
// ---
?>