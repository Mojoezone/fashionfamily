<?php
$current_page = 'Account';
include('admin-header.php');

?>

<?php if($sess_secret_key){ ?>
  <main class="cf admin-main">

    <div>
      <aside>
        <ul>
          <li>
            <a href="admin-index.php">Account</a>
          </li>
          <li>
            <a href="admin-contact.php">Contact</a>
          </li>
          <li>
            <a href="#">Orders</a>
          </li>
        </ul>
      </aside>
<section>
  <h2>Welcome <?php echo $logged_in_user['username']; ?></h2>
<ul>
  <li>
    Order History
    <ul>
      <li>
        <a href="#">ITEM 1</a>
      </li>
      <li>
        <a href="#">ITEM 2</a>
      </li>
      <li>
        <a href="#">ITEM 3</a>
      </li>
      <li>
        <a href="#">ITEM 4</a>
      </li>
    </ul>
  </li>
</ul>
</section>

</div>
  </main>
<?php }else{
  header('location: login.php?e=db');
} ?>
<?php include('footer.php'); ?>
