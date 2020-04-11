<?php
//Detect last page with the GET
$lastPage;
if (isset($_GET['lpage'])) {
  $lastPage = $_GET['lpage'];
} else {
  $lastPage = 'index.php';
}


echo '<input type="text" name="lastPage" value="'.$lastPage.'" hidden>';
?>
