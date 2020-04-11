<?php
$currentPage = basename($_SERVER['REQUEST_URI']);
echo '<a class="dropdown-item" role="presentation" href="logout.php?lpage='.$currentPage.'"><i class="fas fa-sign-out-alt" style="margin-right:10px;"></i>Déconnexion</a>';
?>
