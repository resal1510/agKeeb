<div class="wrapper">
  <h2>Login</h2>
  <p>Please fill in your credentials to login.</p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
      <label>email</label>
      <input type="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" name="email" class="form-control" value="<?php echo $email; ?>">
      <span class="help-block"><?php echo $email_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <label>Password</label>
      <input type="password" name="password" class="form-control">
      <span class="help-block"><?php echo $password_err; ?></span>
    </div>
    <div class="form-group">
      <label for="rememberme">Se souvenir de moi :</label>
      <input type="checkbox" name="rememberme" value="rememberme"><br>
      <input type="submit" class="btn btn-primary" value="Login">
    </div>
  </form>
  Doesn't have an account ? <a href="register.php">Create yours here !</a>
</div>
</body>
