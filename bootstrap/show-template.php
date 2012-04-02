<?php
$f = join("", file("bootstrap.template.html"));
$url = $_SERVER["SCRIPT_NAME"];
$url = substr($url, 1, strrpos($url, "/") - 1);
$url = "http://" . $_SERVER["SERVER_NAME"] . "/" . $url;
$f = str_replace("[[++site_name]]", "Sample boostrap site", $f);
$f = str_replace("[[++site_url]]", "$url/", $f);
$f = str_replace("[[*pagetitle]]", "Sample bootstrap page", $f);
$f = str_replace("[[*description]]", "This page is done to show overall features of Twitter Bootstrap CSS/JS framework.", $f);
$f = str_replace("[[*introtext]]", "Comprehensive introduction to features of Twitter Bootstrap CSS/JS framework.", $f);
$f = str_replace("[[*content]]", join("", file("content.html")), $f);
$f = str_replace("assets/templates/bootstrap/", "", $f);
echo $f;
?>