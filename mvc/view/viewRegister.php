<div>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
      <label>email</label>
      <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
      <span class="help-block"><?php echo $email_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <label>Password</label>
      <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
      <span class="help-block"><?php echo $password_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
      <label>Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
      <span class="help-block"><?php echo $confirm_password_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($captcha_err)) ? 'has-error' : ''; ?>">
      <label for="captcha">Confirm Captcha (Seulement des majuscules et chiffres)</label><br>
      <img src="mvc/controller/captchaGenerator.php" /><input type="text" name="captcha" />
      <span class="help-block"><?php echo $captcha_err; ?></span>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Submit">
      <input type="reset" class="btn btn-default" value="Reset">
    </div>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
  </form>
</div>
</body>
