<?php
//connect to db
//load the function.php
//load the parse login

$current_page = 'Register for an Account';
include('admin-header.php');
include('register-parse.php');
?>

<body>
<main class="cf contact">
  <div class="contact-form">


  <h2>Creat an Account</h2>
  <p>
    Sign up and get exclusive offers
  </p>

<?php show_feedback($feedback, $errors); ?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="the_username">Choose a Username</label>
    <span class="hint">Username must be under 40 characters</span>
    <br />
    <input type="text" name="username" id="the_username" required maxlength="40" />

    <label for="the_email">Email</label>
    <input type="email" name="email" id="the_email" required />

    <label for="the_password">Password</label>
    <span class="hint">Password must be at least 8 characters long</span>
    <br />
    <input type="password" name="password" id="the_password" required />

    <label class="policy-checkbox">
      <input type="checkbox" name="policy" value="1" />
      Yes, I agree to the <a href="terms.php">terms of service and privacy policy.</a>
    </label>
    <input type="submit" value="Register" />
    <input type="hidden" name="did_register" value="1" />
  </form>

</div>

  </main>
<?php include('footer.php'); ?>
