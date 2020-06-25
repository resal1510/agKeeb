<body>
  <main class="page faq-page">
    <section class="dark clean-block">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Admin</h2>
        </div>
        <div class="block-content mx-auto" style="width: 75%;">
          <div class="faq-item">
            <h4 class="mb-3">Gestion des articles:</h4>
            <h5 class="mb-4">Ajouter un article:</h5>
            <div></div>
          </div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" onsubmit="keepScrollPos()">
            <?php if (!empty($addError)) {print_r('<p style="color:red;font-weight:bold">'.$addError.'</p>');} ?>
            <?php if (!empty($addSuccess)) {print_r('<p style="color:#3b99e0;font-weight:bold">'.$addSuccess.'</p>');} ?>
            <div class="row marginCustomAdresses">
              <div class="col-2 d-lg-flex align-items-lg-center"><span>Nom:</span></div>
              <div class="col ml-2">
                <input class="form-control-sm champCustom" type="text" name="nameItem">
              </div>
            </div>
            <div class="row marginCustomAdresses">
              <div class="col-2 d-lg-flex align-items-lg-center"><span>Catégorie:</span></div>
              <div class="col-auto ml-2">
                <select class="form-control-sm champCustom" name="catItem">
                  <?php include "mvc/controller/adminPanelSelectItemCat.php" ?>
                </select>
              </div>
            </div>
            <div class="row marginCustomAdresses">
              <div class="col-2 d-lg-flex align-items-lg-center"><span>Prix:</span></div>
              <div class="col ml-2"><input class="form-control-sm champCustom pr-1" type="number" name="priceItem" step="0.01"></div>
            </div>
            <div class="row marginCustomAdresses">
              <div class="col-2 d-lg-flex align-items-lg-center"><span>Stock:</span></div>
              <div class="col ml-2"><input class="form-control-sm champCustom pr-1" type="number" name="stockItem"></div>
            </div>
            <div class="row marginCustomAdresses">
              <div class="col-2"><span>Description:</span></div>
              <div class="col ml-2"><textarea class="champCustom pl-2 pt-1" name="descItem" style="font-size: 14px;"></textarea></div>
            </div>
            <div class="row mb-3">
              <div class="col-2"><span>État:</span></div>
              <div class="col ml-2" style="font-size: 14px;">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" value="true" name="itemStatus"><label class="form-check-label" for="stateItem">Activé</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4" value="false" name="itemStatus"><label class="form-check-label" for="stateItem">Désactivé</label></div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-2 d-lg-flex align-items-lg-center">
                <span>Image:</span>
              </div>
              <div class="col ml-2">
                <input type="file" name="imageItem" required style="font-size: 14px;">
              </div>
            </div>
            <input type="text" name="doWhat" value="addItem" hidden>
            <button class="btn btn-primary border-0 borderCustom" type="submit" style="background-color: rgb(113,195,255);">Ajouter</button>
          </form>


          <h5 class="mb-4 mt-5">Gérer les articles:</h5>
          <div class="row marginCustomAdresses mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Rechercher:</span></div>
            <div class="col-auto"><select class="custom-select custom-select-sm">
                <option value="" selected="">Par identifiant</option>
                <option value="">Par article</option>
              </select></div>
            <div class="col"><input class="form-control-sm champCustom" type="text" name="searchItem"></div>
          </div>
          <div hidden class="row marginCustomAdresses">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>État:<br></span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="" selected="">Tous les articles</option>
                <option value="">Articles activés</option>
                <option value="">Articles désactivés</option>
              </select></div>
          </div>
          <div hidden class="row marginCustomAdresses">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Catégorie:<br></span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="all" selected="">Tous les articles</option>
                <?php include "mvc/controller/adminPanelSelectItemCat.php" ?>
              </select></div>
          </div>
          <div hidden class="row mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Trier par:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="">Identifiant ascendant</option>
                <option value="" selected="">Identifiant descendant</option>
                <option value="">Prix ascendant</option>
                <option value="">Prix descendant</option>
                <option value="">Stock ascendant</option>
                <option value="">Stock descendant</option>
              </select></div>
          </div>
          <?php if (!empty($iEditErr)) {print_r('<p style="color:red;font-weight:bold">'.$iEditErr.'</p>');} ?>
          <?php if (!empty($iEditSuccess)) {print_r('<p style="color:#3b99e0;font-weight:bold">'.$iEditSuccess.'</p>');} ?>
          <div class="row justify-content-between border p-1" style="font-weight: 550;font-size: 15.5px;">
            <div class="col-2 d-xl-flex align-items-xl-center border-right"><span>Identifiant:</span></div>
            <div class="col-4 d-xl-flex align-items-xl-center border-right"><span>Article:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center border-right"><span>Prix:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center border-right"><span>Stock:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>État:</span></div>
          </div>
          <?php include "mvc/controller/adminPanelListItems.php" ?>
          <div class="row text-right mt-2">
            <div class="col" style="font-size: 12px;font-style: italic;"><span>Cliquez sur un article pour le visualiser/modifier.</span></div>
          </div>
          <h4 class="mb-4 mt-5">Gestion des clients:</h4>
          <div class="row marginCustomAdresses mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Rechercher:</span></div>
            <div class="col-auto"><select class="custom-select custom-select-sm">
                <option value="" selected="">Par identifiant</option>
                <option value="">Par e-mail</option>
              </select></div>
            <div class="col"><input class="form-control-sm champCustom" type="text" name="searchAccount"></div>
          </div>
          <div hidden class="row marginCustomAdresses">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>État:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="" selected="">Tous les clients</option>
                <option value="">Comptes activés</option>
                <option value="">Comptes désactivés</option>
              </select></div>
          </div>
          <div hidden class="row marginCustomAdresses">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Admin:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="" selected="">Tous les clients</option>
                <option value="">Administrateurs</option>
                <option value="">Clients</option>
              </select></div>
          </div>
          <div hidden class="row mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Trier par:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="">Identifiant ascendant</option>
                <option value="" selected="">Identifiant descendant</option>
              </select></div>
          </div>
          <div class="row justify-content-between border p-1" style="font-weight: 550;font-size: 15.5px;">
            <div class="col-2 d-xl-flex align-items-xl-center border-right"><span>Identifiant:</span></div>
            <div class="col-6 d-xl-flex align-items-xl-center border-right"><span>E-mail:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center border-right"><span>Admin:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>État:</span></div>
          </div>
          <?php include "mvc/controller/adminPanelListCustomers.php" ?>
          <div class="row text-right mt-2">
            <div class="col" style="font-size: 12px;font-style: italic;"><span>Cliquez sur un compte pour le visualiser/modifier.</span></div>
          </div>
          <h4 class="mb-4 mt-5">Gestion des commandes:</h4>
          <div class="row marginCustomAdresses mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Rechercher:</span></div>
            <div class="col-auto"><select class="custom-select custom-select-sm">
                <option value="" selected="">Par identifiant</option>
                <option value="">Par client</option>
                <option value="">Par date de création</option>
                <option value="">Par article</option>
              </select></div>
            <div class="col"><input class="form-control-sm champCustom" type="text" name="searchOrder"></div>
          </div>
          <div hidden class="row marginCustomAdresses">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>État:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="" selected="">Toutes les commandes</option>
                <option value="">En attente de paiement</option>
                <option value="">Payée</option>
                <option value="">En préparation</option>
                <option value="">Éxpédiée</option>
                <option value="">Clôturée</option>
              </select></div>
          </div>
          <div hidden class="row mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Trier par:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="">Identifiant ascendant</option>
                <option value="" selected="">Identifiant descendant</option>
                <option value="">Montant ascendant</option>
                <option value="">Montant descendant</option>
              </select></div>
          </div>
          <div class="row justify-content-between border p-1" style="font-weight: 550;font-size: 15.5px;">
            <div class="col-2 d-xl-flex align-items-xl-center border-right"><span>Identifiant:</span></div>
            <div class="col-2 d-xl-flex align-items-xl-center border-right"><span>Client:</span></div>
            <div class="col-4 d-xl-flex align-items-xl-center border-right"><span>Date de création:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center border-right"><span>Montant:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center"><span>État:</span></div>
          </div>
          <?php include "mvc/controller/adminPanelListOrders.php" ?>
          <div class="row text-right mt-2">
            <div class="col" style="font-size: 12px;font-style: italic;"><span>Cliquez sur une commande pour la visualiser/modifier.</span></div>
          </div>
          <h4 class="mb-4 mt-5">Gestion des commentaires:</h4>
          <div class="row marginCustomAdresses mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Rechercher:</span></div>
            <div class="col-auto"><select class="custom-select custom-select-sm">
                <option value="" selected="">Par identifiant</option>
                <option value="">Par article</option>
                <option value="">Par commentaire</option>
                <option value="">Par client</option>
                <option value="">Par pseudo</option>
                <option value="">Par date de création</option>
              </select></div>
            <div class="col"><input class="form-control-sm champCustom" type="text" name="searchOrder"></div>
          </div>
          <div hidden class="row marginCustomAdresses">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>État:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="" selected="">Tous les commentaires</option>
                <option value="">Commentaires activés</option>
                <option value="">Commentaires désactivés</option>
              </select></div>
          </div>
          <div hidden class="row mb-4">
            <div class="col-2 d-lg-flex align-items-lg-center"><span>Trier par:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm">
                <option value="">Identifiant ascendant</option>
                <option value="" selected="">Identifiant descendant</option>
                <option value="">Note ascendante</option>
                <option value="">Note descendante</option>
              </select></div>
          </div>
          <div class="row justify-content-between border p-1" style="font-weight: 550;font-size: 15.5px;">
            <div class="col-2 d-xl-flex align-items-xl-center border-right"><span>Identifiant:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-start align-items-xl-center border-right"><span>Article:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-start align-items-xl-center border-right"><span>Note:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-end align-items-xl-center border-right"><span>Client:</span></div>
            <div class="col-3 d-xl-flex justify-content-xl-end align-items-xl-center border-right"><span>Date de création:</span></div>
            <div class="col-1 d-xl-flex justify-content-xl-end align-items-xl-center"><span>État:</span></div>
          </div>
          <?php include "mvc/controller/adminPanelListComments.php" ?>
          <div class="row text-right mt-2">
            <div class="col" style="font-size: 12px;font-style: italic;"><span>Cliquez sur un commentaire pour la visualiser/modifier.</span></div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="modal fade" role="dialog" tabindex="-1" id="Orders">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Commande - #<span id="orderIdTitle"></span></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="keepScrollPos()">
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Identifiant:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="idOrder" id="idOrder"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Client:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="accountOrder" id="accountOrder"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Date de création:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="dateOrder" id="dateOrder"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-start"><span>Contenu:</span></div>
            <div class="col ml-2" id="ordersFillContent">
            </div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Montant:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="priceOrder" id="priceOrder"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>État:<br></span></div>
            <div class="col-auto d-xl-flex align-items-xl-center ml-2"><select class="custom-select custom-select-sm" name="stateOrder" id="stateOrder">
                <?php include "mvc/controller/adminPanelSelectOrderState.php" ?>
              </select></div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="text" name="doWhat" value="editOrders" hidden>
          <button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Sauvegarder</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" role="dialog" tabindex="-1" id="Comment">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Commentaire - #<span id="noteIdTitle"></span></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="keepScrollPos()">
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Identifiant:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="idComment" id="idComment"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Pseudo:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="nameComment" id="nameComment"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Article:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="itemComment" id="itemComment"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Note:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-start align-items-xl-center ml-2" id="noteComment">></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Commentaire:</span></div>
            <div class="col ml-2"><textarea class="champCustom pl-2 pt-1" style="font-size: 14px;" name="commentComment" id="commentComment" readonly></textarea></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Client:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="accountComment" id="accountComment"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Date de création:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="dateComment" id="dateComment"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>État:</span></div>
            <div class="col-auto d-xl-flex align-items-xl-center ml-2"><select class="custom-select custom-select-sm" name="stateComment" id="stateComment">
                <option value="true">Activé</option>
                <option value="false">Désactivé</option>
              </select></div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="text" name="doWhat" value="editComments" hidden>
          <button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Sauvegarder</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <div class="modal fade" role="dialog" tabindex="-1" id="Item">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Article - #<span id="itemIDTitle"></span></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="keepScrollPos()" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Identifiant:</span></div>
            <div class="col ml-2">
              <input class="form-control-sm champCustom" type="text" name="modalIdItem" id="itemID" value="" readonly>
            </div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Article:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" name="modalNameItem" id="itemName"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Catégorie:<br /></span></div>
            <div class="col-auto d-xl-flex align-items-xl-center ml-2"><select class="custom-select custom-select-sm" name="modalCatItem" id="itemCategory">
              <?php include "mvc/controller/adminPanelSelectItemCat.php" ?>
              </select></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Note:</span></div>
            <div class="col-2 d-xl-flex justify-content-xl-start align-items-xl-center ml-2" id="itemRating"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Description:</span></div>
            <div class="col ml-2"><textarea class="champCustom pl-2 pt-1" style="font-size: 14px;" name="modalDescItem" id="itemDescription"></textarea></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Prix:</span></div>
            <div class="col d-xl-flex justify-content-xl-start align-items-xl-center ml-2"><input class="form-control-sm champCustom" type="text" name="modalPriceItem" id="itemPrice"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Stock:</span></div>
            <div class="col d-xl-flex justify-content-xl-start align-items-xl-center ml-2"><input class="form-control-sm champCustom" type="text" name="modalStockItem" id="itemStock"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center">
              <span>Image:</span>
            </div>
            <div class="col-auto ml-2">
              <div id="itemImage" style="margin-bottom:13px">
              </div>
              <input type="file" style="font-size: 13px;" name="modalImageItem">
            </div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>État:<br></span></div>
            <div class="col-auto d-xl-flex align-items-xl-center ml-2">
              <select class="custom-select custom-select-sm" name="stateItem" id="itemState">
                <option value="true">Activé</option>
                <option value="false">Désactivé</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="text" name="doWhat" value="editItem" hidden>
          <button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Sauvegarder</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" role="dialog" tabindex="-1" id="Account">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Client - #<span id="customerIdTitle"></span></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="keepScrollPos()">
        <div class="modal-body">
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Identifiant:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="idAccount" id="idAccount"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>E-mail:</span></div>
            <div class="col ml-2"><input class="form-control-sm champCustom" type="text" readonly="" name="mailAccount" id="mailAccount"></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Administrateur:</span></div>
            <div class="col-auto ml-2"><select class="custom-select custom-select-sm" name="adminAccount" id="adminAccount">
                <option value="1">Oui</option>
                <option value="0">Non</option>
              </select></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>État:<br></span></div>
            <div class="col-auto d-xl-flex align-items-xl-center ml-2"><select class="custom-select custom-select-sm" name="stateAccount" id="stateAccount">
                <option value="true">Activé</option>
                <option value="false">Désactivé</option>
              </select></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Dernière IP:</span></div>
            <div class="col ml-2"><input type="text" class="form-control-sm champCustom" readonly name="ipAccount" id="ipAccount" /></div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Adresses de livraison:<br></span></div>
            <div>
              <div class="row no-gutters" id="listAddrL">

              </div>
            </div>
          </div>
          <div class="row no-gutters marginCustomAdresses">
            <div class="col-4 d-xl-flex align-items-xl-center"><span>Adresses de facturation:<br></span></div>
            <div>
              <div class="row no-gutters" id="listAddrF">

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="text" name="doWhat" value="editCustomer" hidden>
          <button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Sauvegarder</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" role="dialog" tabindex="-1" id="EditAdmin">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="titleAddressModifAdmin"></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="editFormAdmin" onsubmit="keepScrollPos()">
          <div class="modal-body">
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Prénom:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editNameAdmin" name="nameAddrAdmin"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Nom:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editSurnameAdmin" name="surnameAddrAdmin"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Rue et numéro:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editAddrAdmin" name="addressAddrAdmin"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Code postal:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editNpaAdmin" name="npaAddrAdmin"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Ville:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editCityAdmin" name="cityAddrAdmin"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4 d-xl-flex align-items-xl-center"><span>Téléphone:</span></div>
              <div class="col"><input type="text" class="form-control-sm champCustom pl-2" id="editPhoneAdmin" name="phoneAddrAdmin"></div>
            </div>
            <div class="row no-gutters marginCustomAdresses">
              <div class="col-4"><span>Par défaut?</span></div>
              <div class="col"><input type="checkbox" style="font-size: 14px;" id="editDefaultAdmin" name="newDefaultAdmin"></div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="text" name="what" value="modifyAddrAdmin" id="whatInputAdmin" hidden>
            <input type="text" name="idAddrAdmin" id="idAddrAdmin" hidden>
            <button class="btn btn-danger border-0" type="submit" id="deleteAddrAdmin" style="background-color: rgb(248,77,77);">Supprimer</button>
            <button class="btn btn-primary border-0" type="submit" style="background-color: rgb(113,195,255);">Sauvegarder</button>
          </div>
        </form>
      </div>
    </div>
  </div>
