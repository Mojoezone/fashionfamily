<?php
//require('db-config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $current_page .' | Fashion Family'; ?></title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/reset.css" />
</head>
<body>
  <header>

    <div class="header-top">
      <div>
        <div class="logincon">
          <h5>Sign In/Register &nbsp;<i class="icon-down-open"></i></h5>
          </div>
        <div>

          <form action="login.php" method="post" id="login">
          <label for="the_username">Username</label>
          <input type="text" name="username" id="the_username" required />
          <label for="the_password">Password</label>
          <input type="password" name="password" id="the_password" required />

          <input type="submit" value="Login" />

          <input type="hidden" name="did_login" value="1" />
          <div class="register"><a href="signup.php">New customer Register</a></div>
          </form>

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
        <a id="shopcart"><img src="images/shoppingcart.svg" alt="Shopping Cart" /></a>
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
