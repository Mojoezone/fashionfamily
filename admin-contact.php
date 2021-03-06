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
  <h2><?php echo $logged_in_user['username']; ?> -- Your Contact Information</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label>Address</label>
  <input type="text" name="str-address"  placeholder="street address" required />
  <input type="text" name="city-address" placeholder="city" required />
  <select required>
    <option value="">
      Select a State
    </option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
<input type="text" pattern="[0-9]{5}" name="zipcode" placeholder="zipcode" maxlength="5" required />
<input type="submit" value="Update" />
<input type="hidden" name="did_update"  value ="1" />
</form>
</section>
</div>
  </main>
  <?php }else{
    header('location: login.php?e=db');
  } ?>
<?php include('footer.php'); ?>
