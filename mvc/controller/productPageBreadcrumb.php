<?php
switch ($pCat) {
  case '1':
    $pCategory = "Plaques";
    $catLink = "catalog.php?cat=1";
    break;
    case '2':
      $pCategory = "Circuits imprimés";
      $catLink = "catalog.php?cat=2";
      break;
      case '3':
        $pCategory = "Interrupteurs";
        $catLink = "catalog.php?cat=3";
        break;
        case '4':
          $pCategory = "Touches";
          $catLink = "catalog.php?cat=4";
          break;
          case '5':
            $pCategory = "Câbles";
            $catLink = "catalog.php?cat=5";
            break;
            case '6':
              $pCategory = "Stabilisateurs";
              $catLink = "catalog.php?cat=6";
              break;
              case '7':
                $pCategory = "Boîtiers";
                $catLink = "catalog.php?cat=7";
                break;

  default:
    // code...
    break;
}

print_r('<li class="breadcrumb-item"><a href="'.$catLink.'"><span>'.$pCategory.'</span></a></li>
        <li class="breadcrumb-item"><a href="#"><span>'.$pName.'</span></a></li>');
?>
