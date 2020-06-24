<body style="height:100%">
  <main class="page faq-page">
    <section class="dark clean-block">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Réactiver mon compte</h2>
        </div>
        <div class="block-content mx-auto" style="width:75%">
          <p>Si vous tombez sur cette page, c'est que vous avez utilisé votre lien de réactivation.</p>
          <p>Pour réactiver votre compte, merci d'entrer les données correspondantes à votre compte ci-dessous :</p><br><br>

          <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post" onsubmit="keepScrollPos()">
          <div class="row no-gutters mb-2">
            <div class="col-3 d-xl-flex align-items-xl-center">
              <span>Adresse mail : </span>
            </div>
            <div class="col">
              <input type="email" class="form-control-sm champCustom ml-2" name="recMail" required>
            </div>
          </div>
          <div class="row no-gutters mb-2">
            <div class="col-3 d-xl-flex align-items-xl-center">
              <span>Mot de passe : </span>
            </div>
            <div class="col">
              <input type="password" class="form-control-sm champCustom ml-2" name="recPwd" required>
            </div>
          </div>
          <div class="row no-gutters mb-2" style="margin-top:30px">
            <?php if (!empty($errRecover)) {echo $errRecover;} ?>
          </div>
          <div class="row mb-5" style="margin-top:30px">
            <div class="col">
              <button class="btn btn-primary border-0 borderCustom" type="submit" style="background-color: rgb(113,195,255);">Réactiver mon compte</button>
            </div>
          </div>
        </form>
      </div>
      </div>
    </section>
  </main>
</body>
