<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();//anything has session
require('db-config.php');
include_once('functions.php');
include('login-parse.php');

//make  sure the person viewing admin panel is logged in
if(isset($_SESSION['user_id']) AND isset($_SESSION['secret_key'])){
  //check for a match in the db
  $sess_user_id = $_SESSION['user_id'];
  $sess_secret_key = $_SESSION['secret_key'];

  $query = "SELECT * FROM users
  WHERE user_id = $sess_user_id
  AND secret_key = '$sess_secret_key'
  LIMIT 1 ";
  $result = $db->query($query);
  if(!$result){
    //todo:for testing show a message if bad query change this to a redirect later
    header('Location: login.php?e=db');
  }
  if($result->num_rows == 1){
    //success -  we have a logged in user! set up the user info for larter use show user name on the account echo $logged_in_user
    $logged_in_user = $result->fetch_assoc();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $current_page .' | Fashion Family'; ?></title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/reset.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
</head>
<body>
  <header id ="stickynav" class="admin ">

    <div class="header-top">
      <div>
        <div class="logincon">
          <?php
          if($sess_secret_key){
            ?>
            <h5>Welcome <?php echo $logged_in_user['username']; ?> | <a href="login.php?action=logout">Log out</a></h5>
            <?php
          }else{
            ?>
            <a href="login.php"><h5>Sign In/Register</h5></a>
            <?php
          }
          ?>
        </div>

        <form action="search.php" method="get" id="searchform">
          <input type="search"  name="phrase" />
          <input type="submit" value="Search" />
        </form>


      </div>
    </div>

    <div class="header-mid">
      <div>
        <a href="index.php"><h1><img src="images/logo.svg" alt="Fashion Family One Brand One Fashion" /></h1></a>
        <div class="shopc-menuoc">
          <?php
          if($sess_secret_key){ ?>
            <a href="admin-index.php" id="accounticon"><img src="images/accounticon.svg" alt="Account" /></a>
            <?php } ?>
          <a href="cart.php" id="shopcart"><img src="images/shoppingcart.svg" alt="Shopping Cart" /></a>
          <a><i id="menu-oc" class="icon-menu"></i></a>
        </div>

        <div class="navc">

          <nav id="global-nav">
            <ul>
              <li>
                <a href="index.php" class="<?php if($current_page == 'Home')echo 'active'; ?>">Home</a>
              </li>
              <li>
                <a href="shirts.php" class="<?php if($current_page == 'Shirts') echo 'active'; ?>">Shirts</a>
              </li>
              <li>
                <a href="dresses.php" class="<?php if($current_page == 'Dresses') echo 'active'; ?>">Dresses</a>
              </li>
              <li>
                <a href="about.php" class="<?php if($current_page == 'About') echo 'active'; ?>">About</a>
              </li>
              <li>
                <a href="contact.php" class="<?php if($current_page == 'Contact') echo 'active'; ?>">Contact</a>
              </li>

            </ul>
          </nav>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div>
        <ul>
          <li>
            Free Shipping at $50.00 plus
          </li>
          <li>
            New member 10% off total at first checkout
          </li>
        </ul>
      </div>
    </div>

  </header>
