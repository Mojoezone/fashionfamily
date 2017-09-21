<div id="toTop" class="backtotop">
  <a href="#"><i class="icon-up-open"></i>Top</a>
</div>
<footer>
  <div>


  <div class="payment-icon">
    <i class="icon-cc-visa"></i>
    <i class="icon-cc-mastercard"></i>
    <i class="icon-cc-discover"></i>
    <i class="icon-cc-amex"></i>
    <i class="icon-cc-paypal"></i>

  </div>

<div class="social-icons">
<a href="http://www.facebook.com" target="_blank"><i class="icon-facebook"></i></a>
<a href="http://www.instagram.com" target="_blank"><i class="icon-instagram"></i></a>
<a href="http://www.yelp.com" target="_blank"><i class="icon-yelp"></i></a>
<a href="http://www.twitter.com" target="_blank"><i class="icon-twitter"></i></a>
<a href="rss.php" target="_blank"><i class="icon-rss"></i></a>
</div>

<div class="footer-contact">
<h2><a href="index.php"><img src="images/logo.svg" alt="Home Page"></a></h2>
<section>
  <h5>Contact</h5>
  <p><a href="tel:1-800-456-3241">1-800-456-3241</a></p>
  <p><a href="mailto:ffcustomer@f1f1.com">ffcustomer@f1f1.com</a></p>
</section>

<section>
  <h5>Warehouse</h5>
  <p><a href="https://www.google.com/maps/place/234+Harbor+Drive,+San+Diego,+CA+92101/@32.7093833,-117.1647192,17z/data=!3m1!4b1!4m5!3m4!1s0x80d953575260eaa5:0x4bc44c5650594364!8m2!3d32.7093833!4d-117.1625305" target="_blank">234 Habor Dr San Diego CA 92101</a></p>
</section>
</div>

<div class="footer-nav">
<nav>
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

<div class="policy-nav">
<ul>
  <li>
    <a href="return.php" class="<?php if($current_page == 'Return Policies') echo 'active'; ?>">Return Policy</a> -
  </li>
  <li>
    <a href="terms.php" class="<?php if($current_page == 'Terms & Service') echo 'active'; ?>">Terms &amp; Service</a>
  </li>
</ul>
</div>

<div class="copyright">
<p><i class="icon-copyright"></i>mojoezone.com 2017</p>
</div>

</div>
</footer>
<script>
document.getElementById("menu-oc").onclick = function(){
  var clickMenu = document.getElementById("menu-oc").classList;
  var globalNav = document.getElementById("global-nav").classList;
 if(globalNav.contains("menu-on-off")){
    clickMenu.remove("icon-cancel");
    clickMenu.add("icon-menu");
    globalNav.remove("menu-on-off");
  }else{
    clickMenu.remove("icon-menu");
    clickMenu.add("icon-cancel");
    globalNav.add("menu-on-off");
  }
}//end nav clickMenu

window.onscroll = function(e){

         var element = document.getElementById("stickynav");
         var offset = element.offsetTop;
         if(offset < window.pageYOffset - 150){
           element.classList.add("sticky-nav");
         }else{
           element.classList.remove("sticky-nav");
         }
         if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200){
           document.getElementById("toTop").style.display ="block";
         }else{
           document.getElementById("toTop").style.display ="none";
         }
       }//end stickyNav and toTop

       document.getElementById("toTop").onclick = function(){
         setTimeout(function () {
           document.body.scrollTop = 0;
           document.documentElement.scrollTop = 0;
         }, 1000);
       }//end smooth top

</script>
</body>
</html>
