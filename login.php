<?php
//supress Notice: message
error_reporting(E_ALL & ~E_NOTICE);
//we need to use session data on this page
session_start();
$current_page = 'Login';
include('admin-header.php');
?>

<main class="cf contact">
  <div class="contact-form">

<h2>Login to your account</h2>

<?php show_feedback($error_message, array());//just for us to check the validation with$errors passing empty array if it fail ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

  <label for="the_username">Username</label>
  <input type="text" name="username" id="the_username"  required/>

  <label for="the_password">Password</label>
  <input type="password" name="password" id="the_password" required />

<input type="submit" value="Log In" />
<!-- if its true the below hidden is set to true log in -->
<input type="hidden" name="did_login" value="1" />

</form>
<p>
  <a href="register.php" class="register">Register For A New Account</a>
</p>
</div>
</main>

<?php include('footer.php'); ?>
