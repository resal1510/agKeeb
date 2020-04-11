<main class="page login-page">
  <section class="clean-block clean-form dark">
    <div class="container">
      <div class="block-heading">
        <h2 class="text-info">Connexion</h2><a class="text-secondary" href="register.php" style="font-size: 16px;">Vous n'avez pas encore de compte?</a>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
          <label for="email">E-mail</label>
          <input class="form-control item" type="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label for="password">Mot de passe</label>
          <input class="form-control" type="password" name="password">
          <span class="help-block" style="color:red"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="rememberme" value="rememberme">
            <label class="form-check-label" for="rememberme">Se souvenir de moi</label>
          </div>
        </div>
        <?php include "mvc/controller/loginButtonLPage.php" ?>
        <button class="btn btn-primary btn-block shadow-sm border-0" type="submit" style="background-color: #71c3ff;">Se connecter</button>
      </form>
    </div>
  </section>
</main>

</body>
