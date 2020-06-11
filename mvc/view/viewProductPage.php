<main class="page product-page">
  <section class="clean-block clean-product dark">
    <div class="container">
      <?php include "mvc/controller/catalogPageScriptCartmsg.php" ?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="catalog.php"><span>Catalogue</span></a></li>
        <?php include "mvc/controller/productPageBreadcrumb.php" ?>

      </ol>
      <div class="block-content">
        <div class="product-info">
          <div class="row">
            <div class="col-md-6" style="text-align:center">
              <?php echo '<img src="uploads/'.$pImage.'" alt="" style="width: 360px; height: 360px">'; ?>
            </div>
            <div class="col-md-6">
              <div class="info">
                <h3 style="margin-top: 20px;margin-bottom: 8px;"><?php echo $pName ?></h3>
                <div class="rating">
                  <?php include "mvc/controller/productPageScriptStars.php" ?>
                </div>
                <h3 style="margin-top: 20px;margin-bottom: 20px;">CHF <?php echo $pPrice ?></h3>
                <form class='add-to-cart-form' method="get" action="javascript:submitToCart();">
                  <?php include "mvc/controller/productPageScriptDispoCart.php" ?>
                </form>
                <div class="summary" style="margin-top: 20px;padding-top: 20px;">
                  <p style="margin-bottom: 20px;"><?php echo $pDesc ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <h4 style="margin-bottom: 16px;">Commentaires</h4>
        </div>
        <div class="row mt-2 mb-4">
          <div class="col">
            <?php include "mvc/controller/productPageLoginComments.php" ?>
          </div>
        </div>
        <div id="commentaires" class="fade show tab-pane active">
          <?php include "mvc/controller/productPageScriptComments.php" ?>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" role="dialog" tabindex="-1" id="AddComment">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter un commentaire</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
              <form action="productPage.php?id_product=76" method="post" onsubmit="keepScrollPos()" id="formAddComm">
                <div class="row no-gutters marginCustomAdresses">
                    <div class="col-4 d-xl-flex align-items-xl-center"><span>Pseudo:</span></div>
                    <div class="col ml-2">
                        <input class="form-control-sm champCustom" type="text" name="nameComment" id="nameComment">
                    </div>
                </div>
                <div class="row no-gutters marginCustomAdresses">
                    <div class="col-4 d-xl-flex align-items-xl-center">
                      <span>Note:</span>
                    </div>
                    <div class="col-2 d-xl-flex justify-content-xl-start align-items-xl-center ml-2">
                      <img class="ml-1 rStars" src="img/star-empty.svg" style="height: 30px;" id="rStars1">
                      <img class="ml-1 rStars" src="img/star-empty.svg" style="height: 30px;" id="rStars2">
                      <img class="ml-1 rStars" src="img/star-empty.svg" style="height: 30px;" id="rStars3">
                      <img class="ml-1 rStars" src="img/star-empty.svg" style="height: 30px;" id="rStars4">
                      <img class="ml-1 rStars" src="img/star-empty.svg" style="height: 30px;" id="rStars5">
                    </div>
                    <input type="text" name="starsComment" hidden id="rTotStars">
                </div>
                <div class="row no-gutters marginCustomAdresses">
                    <div class="col-4 d-xl-flex align-items-xl-center"><span>Commentaire:</span></div>
                    <div class="col ml-2">
                      <textarea class="champCustom pl-2 pt-1" style="font-size: 14px;" name="commentComment" id="commentComment"></textarea>
                    </div>
                </div>
                <div class="row no-gutters mt-4">
                  <p id="Err" style="color:red"></p>
                </div>
            </div>
            <div class="modal-footer">
              <input type="text" name="idItemComment" id="idItemComment" value="<?php echo $idAsked ?>" hidden>
              <input type="text" name="idCustComment" id="idCustComment" value="<?php echo $_SESSION["idClient"] ?>" hidden>
                <span id="loadingAnim" style="height:36px;width:50px;margin:0"></span>
              <button class="btn btn-primary border-0" type="button" style="background-color: rgb(113,195,255);" id="reviewSubmit">Commenter</button>

            </div>
          </form>
        </div>
    </div>
</div>
</main>
</body>
