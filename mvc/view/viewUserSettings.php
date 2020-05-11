<!DOCTYPE html>
<html>
<div class="modal fade" role="dialog" id="Edit">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titleAddressModif"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="editForm">
        <div class="modal-body">
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Prénom:</span></div>
            <div class="col"><input type="text" class="champCustom" id="editName" name="nameAddr"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Nom:</span></div>
            <div class="col"><input type="text" class="champCustom" id="editSurname" name="surnameAddr"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Rue et numéro:</span></div>
            <div class="col"><input type="text" class="champCustom" id="editAddr" name="addressAddr"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Code postal:</span></div>
            <div class="col"><input type="text" class="champCustom" id="editNpa" name="npaAddr"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Ville:</span></div>
            <div class="col"><input type="text" class="champCustom" id="editCity" name="cityAddr"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Téléphone:</span></div>
            <div class="col"><input type="text" class="champCustom" id="editPhone" name="phoneAddr"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Par défaut?</span></div>
            <div class="col"><input type="checkbox" id="editDefault" name="newDefault"></div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="text" name="what" value="modifyaddr" id="whatInput" hidden>
          <input type="text" name="idAddr" id="idAddr" hidden>
          <button class="btn btn-danger border-0" type="submit" id="deleteAddr" style="background-color: rgb(248,77,77);">Supprimer</button>
          <button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="modal fade" role="dialog" tabindex="-1" id="newAddr">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="titleNewAddr"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Prénom:</span></div>
            <div class="col"><input type="text" class="champCustom" id="shipName" name="newName"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Nom:</span></div>
            <div class="col"><input type="text" class="champCustom" id="shipSurname" name="newSurname"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Rue et numéro:</span></div>
            <div class="col"><input type="text" class="champCustom" id="shipAddr" name="newAddr"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Code postal:</span></div>
            <div class="col"><input type="text" class="champCustom" id="shipNpa" name="newNpa"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Ville:</span></div>
            <div class="col"><input type="text" class="champCustom" id="shipCity" name="newCity"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Téléphone:</span></div>
            <div class="col"><input type="text" class="champCustom" id="shipPhone" name="newPhone"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4"><span>Par défaut?</span></div>
            <div class="col"><input type="checkbox" id="shipDefault" name="newDefault"></div>
          </div>
        </div>
        <input type="text" name="what" value="addAddr" hidden>
        <input type="text" name="newCat" id="newCat" hidden>
        <div class="modal-footer"><button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Sauvegarder</button></div>
      </div>
    </div>
  </div>
</form>
<main class="page faq-page">
  <section class="dark clean-block">
    <div class="container">
      <div class="block-heading">
        <h2 class="text-info">Mes paramètres</h2>
      </div>
      <div class="block-content mx-auto" style="width:75%">
        <div class="faq-item">
          <h4 class="mb-4">Mes adresses de livraison:</h4>
          <div>
            <div class="row no-gutters">
              <?php include "mvc/controller/settingsListAddr.php"; ?>
            </div>
          </div>
        </div>
        <div class="col mb-5 p-0"><a class="newAddr shipLink" id="startNewShip">Ajouter une adresse</a></div>
        <h4 class="mb-4">Mes adresses de facturation:</h4>
        <div class="row no-gutters">
          <?php include "mvc/controller/settingsListAddr2.php"; ?>
        </div>
        <div class="col mb-5 p-0"><a class="newAddr shipLink" id="startNewPay">Ajouter une adresse</a></div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h4 class="mb-4">Changer de mot de passe:</h4>
          <div class="row no-gutters mb-2">
            <div class="col-5">
              <span>Ancien mot de passe:&nbsp;</span>
            </div>
            <div class="col">
              <input type="password" class="champCustom ml-2" name="oldPwd" value="<?php echo $oldPwd; ?>">
            </div>
          </div>
          <div class="row no-gutters mb-2">
            <div class="col-5">
              <span>Nouveau mot de passe:</span>
            </div>
            <div class="col">
              <input type="password" class="champCustom ml-2" name="newPwd" value="<?php echo $newPwd; ?>" pattern=".{8,}" title="Le mot de passe doit contenir 8 caractères ou plus.">
            </div>
          </div>
          <div class="row no-gutters mb-3">
            <div class="col-5">
              <span>Répéter le nouveau mot de passe:</span>
            </div>
            <div class="col">
              <input type="password" class="champCustom ml-2" name="confirmPwd" value="<?php echo $confirmPwd; ?>" pattern=".{8,}" title="Le mot de passe doit contenir 8 caractères ou plus.">
            </div>
          </div>
          <div style="color:red; font-weight: bold"><?php include "mvc/controller/userSettingsErr.php"; ?></div>
          <div style="color:green; font-weight: bold">
            <?php if (!empty($newPwd_success)) {echo $newPwd_success;} ?>
          </div><br>
          <input type="what" name="" value="changepwd" hidden>
          <button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Valider</button>
        </form>
      </div>
    </div>
  </section>
</main>
</body>
<script src="mvc/controller/userSettingsJS.js"></script>

</html>
