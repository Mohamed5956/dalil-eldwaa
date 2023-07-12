<?php
header("Access-Control-Allow-Origin: *");
include 'conn.php';
if(!$db){
echo "not succeful";
}else{
$q = mysqli_query($db, "SELECT id, name FROM drugs");
$baseUrl = "https://dlildwa.com/indications.php?id=";
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8" ?>'.PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
while($row = mysqli_fetch_array($q)){
echo '<url>' . PHP_EOL;
echo '<loc>'.$baseUrl. $row["id"] .'</loc>' . PHP_EOL;
echo '<changefreq>daily</changefreq>' . PHP_EOL;
echo '<lastmod>'. date("Y-m-d").'</lastmod>' . PHP_EOL;
echo '</url>' . PHP_EOL;
}
echo '</urlset>' . PHP_EOL;
}
?>