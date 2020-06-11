<?php
header('Content-Type: application/rss+xml; charset=ISO-8859-1');
include "mvc/controller/config.php";
include "mvc/model/rssListItemsSQL.php";
foreach ($rssDate as $key) {
  $lastItemDate = date(DATE_RSS, strtotime($key['date_creation']));
}
?>
<?xml version="1.0" encoding="ISO-8859-1"?>
<rss version="2.0">
    <channel>
        <title>agKeeb Shop</title>
        <description>Ceci est le flux RSS contenant les derniers articles mis en vente, de votre shop de clavier préféré : agKeeb !</description>
        <lastBuildDate><?php echo $lastItemDate; ?></lastBuildDate>
        <link>https://sandbox.allanresin.ch/agkeeb</link>
        <?php foreach ($resultRss as $key) {
          $rssDate = date(DATE_RSS, strtotime($key['date_creation']));
          echo('<item>
            <title>'.$key['nom_article'].'</title>
            <description>'.$key['description'].'</description>
            <pubDate>'.$rssDate.'</pubDate>
            <link>https://sandbox.allanresin.ch/agkeeb/productPage.php?id_product='.$key['id_article'].'</link>
            <image>
              <url>https://sandbox.allanresin.ch/agkeeb/uploads/'.$key['nom_image'].'</url>
              <link>https://sandbox.allanresin.ch/agkeeb/productPage.php?id_product='.$key['id_article'].'</link>
            </image>
        </item>');
        }
        ?>
    </channel>
</rss>
