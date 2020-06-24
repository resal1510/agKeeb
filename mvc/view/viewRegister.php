<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Création de compte</h2><a class="text-secondary" href="login.php" style="font-size: 16px;">Vous avez déjà un compte?</a></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                  <label for="email">E-mail</label>
                  <input class="form-control item" type="email" name="email" value="<?php echo $email; ?>" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$">
                  <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                  <label for="password">Mot de passe</label>
                  <input class="form-control item" type="password" name="password" value="<?php echo $password; ?>">
                  <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                  <label for="password">Répéter le mot de passe</label>
                  <input class="form-control item" type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                  <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($captcha_err)) ? 'has-error' : ''; ?>">
                  <label for="password">Merci de rentrer le CAPTCHA.&nbsp;</label>
                  <img id="captchaStyle" src="mvc/controller/captchaGenerator.php" /><i id="refreshCaptcha" class="fas fa-redo-alt" onclick="refreshCaptcha()"></i>
                  <input class="form-control item" type="text" name="captcha" />
                  <span class="help-block"><?php echo $_SESSION["code"]; ?></span>
                </div>
                <button class="btn btn-primary btn-block shadow-sm border-0" type="submit" value="submit" style="background-color: #71c3ff;">S'inscrire</button>
              </form>
        </div>
    </section>
</main>
<script src="mvc/controller/registerCaptchaRefresh.js"></script>
</body>
