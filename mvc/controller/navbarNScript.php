<?php
$currentPage = basename($_SERVER['REQUEST_URI']);
echo '<a class="btn btn-light text-nowrap action-button" role="button" href="login.php?lpage='.$currentPage.'" style="background-color: #71c3ff;margin-right: 0px;padding-right: 20px;">Se connecter</a>';
?>
