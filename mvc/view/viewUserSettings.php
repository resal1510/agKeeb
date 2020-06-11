<body>
  <div class="modal fade" role="dialog" id="Edit">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="titleAddressModif"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="editForm" onsubmit="keepScrollPos()">
          <div class="modal-body">
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Prénom:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editName" name="nameAddr"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Nom:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editSurname" name="surnameAddr"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Rue et numéro:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editAddr" name="addressAddr"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Code postal:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editNpa" name="npaAddr"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Ville:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editCity" name="cityAddr"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Téléphone:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editPhone" name="phoneAddr"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4"><span>Par défaut?</span></div>
              <div class="col"><input type="checkbox" style="font-size: 14px;" id="editDefault" name="newDefault"></div>
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

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="keepScrollPos()">
    <div class="modal fade" role="dialog" tabindex="-1" id="newAddr">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="titleNewAddr"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Prénom:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom" id="shipName" name="newName"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Nom:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom" id="shipSurname" name="newSurname"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Rue et numéro:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom" id="shipAddr" name="newAddr"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Code postal:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom" id="shipNpa" name="newNpa"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Ville:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom" id="shipCity" name="newCity"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Téléphone:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom" id="shipPhone" name="newPhone"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4"><span>Par défaut?</span></div>
              <div class="col"><input type="checkbox" style="font-size: 14px;" id="shipDefault" name="newDefault"></div>
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
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="keepScrollPos()">
            <h4 class="mb-4">Changer de mot de passe:</h4>
            <div class="row no-gutters mb-2">
              <div class="col-5 d-xl-flex align-items-xl-center">
                <span>Mot de passe actuel:&nbsp;</span>
              </div>
              <div class="col">
                <input type="password" class="form-control-sm champCustom ml-2" name="oldPwd" value="<?php echo $oldPwd; ?>">
              </div>
            </div>
            <div class="row no-gutters mb-2">
              <div class="col-5 d-xl-flex align-items-xl-center">
                <span>Nouveau mot de passe:</span>
              </div>
              <div class="col">
                <input type="password" class="form-control-sm champCustom ml-2" name="newPwd" value="<?php echo $newPwd; ?>" pattern=".{8,}" title="Le mot de passe doit contenir 8 caractères ou plus.">
              </div>
            </div>
            <div class="row no-gutters mb-3">
              <div class="col-5 d-xl-flex align-items-xl-center">
                <span>Répéter le nouveau mot de passe:</span>
              </div>
              <div class="col">
                <input type="password" class="form-control-sm champCustom ml-2" name="confirmPwd" value="<?php echo $confirmPwd; ?>" pattern=".{8,}" title="Le mot de passe doit contenir 8 caractères ou plus.">
              </div>
            </div>
            <div style="color:red; font-weight: bold"><?php include "mvc/controller/userSettingsErr.php"; ?></div>
            <div style="color:green; font-weight: bold">
              <?php if (!empty($newPwd_success)) {echo $newPwd_success;} ?>
            </div>
            <input type="what" name="" value="changepwd" hidden>
            <div class="row mb-5">
              <div class="col"><button class="btn btn-primary border-0 borderCustom" type="submit" style="background-color: rgb(113,195,255);">Valider</button></div>
            </div>
            <h4 class="mb-4">Désactiver mon compte:</h4>
            <div class="row no-gutters mb-3">
                <div class="col-3"><span>Mot de passe:</span></div>
                <div class="col"><input class="form-control-sm champCustom ml-2" type="password"></div>
            </div><button class="btn btn-danger border-0" type="button" data-dismiss="modal" style="background-color: rgb(248,77,77);">Désactiver</button></div>
          </form>
        </div>
      </div>
    </section>
  </main>
</body>
<script src="mvc/controller/userSettingsJS.js"></script>

</html>
