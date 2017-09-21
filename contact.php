<?php
$current_page = 'Contact';
include('admin-header.php');
include('contact-parse.php');
?>


<main class="cf contact">

  <div class="contact-form">

  <h2>Contact Us:</h2>
  <p>Please fill the form below...</p>
  <p>
    <?php echo $display_msg ?>
  </p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="the_name">Name:</label>
    <input type="text" name="name" id="the_name" required />

    <label for="the_email">Email Address:</label>
    <input type="email" name="email" id="the_email" required />

    <label for="the_inquiries">Please select a inquiry:</label>
    <select id="the_inquiries" required>
      <option value="">Choose One</option>
      <option value="billing">Billing</option>
      <option value="products">Products</option>
      <option value="return">Return</option>
      <option value="others">Other</option>
    </select>

    <label for="the_message">Message:</label>
    <textarea name="message" id="the_message" rows="10" required></textarea>

    <input type="submit" value="Send" />
    <input type="hidden" name="did_contact" value="1" />
  </form>


  </div>
</main>

<?php include('footer.php'); ?>
