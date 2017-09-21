<?php
error_reporting(E_ALL & ~E_NOTICE);
$current_page = 'Product' ;
$product_id = $_GET['product_id'];

include('admin-header.php');

include('review_parse.php');
?>
<main class="cf single-product">


    <div>
      <?php
      $query = "SELECT *
      FROM products
      WHERE products.product_id = $product_id
      LIMIT 1";

      $result = $db->query($query);
      if($result->num_rows == 1 ){
        $row = $result->fetch_assoc();
        ?>
      <div class="img-ct">
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['product']; ?>" />
      </div>


      <div class="selection">

        <h2><?php echo $row['product']; ?> <span class="price">&dollar;<?php echo $row['price']; ?></span></h2>
        <p><?php echo $row['description']; ?></p>

<!-- action link change... -->
        <form action="http://localhost/joemo/finalProject/cart.php" method="post">

          <label for="the_gender">Gender</label>
          <select name="gender" id="the_gender" required>
            <option value="">
              Choose One
            </option>
            <?php
            $query = "SELECT  pro_vars.product_id, pro_vars.variant_id, variants.variant_id, variants.variant, variants.value
            FROM variants, pro_vars
            WHERE pro_vars.product_id = $product_id
            AND  variants.variant_id = pro_vars.variant_id
            AND variants.value = 'gender'";

            $result = $db->query($query);
            if($result->num_rows >= 1) {
              while($row = $result->fetch_assoc()){
                ?>
                <option value="<?php echo $row['variant'];  ?>">
                  <?php echo strtoupper($row['variant']);  ?>
                </option>
                <?php
              }
              $result->free();
            }
            ?>
          </select>

          <label for="the_age">Age Groups</label>
          <select name="age" id="the_age" required>
            <option value="">
              Choose One
            </option>
            <?php
            $query = "SELECT  pro_vars.product_id, pro_vars.variant_id, variants.variant_id, variants.variant, variants.value
            FROM variants, pro_vars
            WHERE pro_vars.product_id = $product_id
            AND  variants.variant_id = pro_vars.variant_id
            AND variants.value = 'age'";

            $result = $db->query($query);
            if($result->num_rows >= 1) {
              while($row = $result->fetch_assoc()){
                ?>
                <option value="<?php echo $row['variant']; ?>">
                  <?php echo strtoupper($row['variant']); ?>
                </option>
                <?php
              }
              $result->free();
            }
            ?>
          </select>

          <label for="the_size">Size</label>
          <select name="size" id="the_size" required>
            <option value="">
              Choose One
            </option>
            <!-- loop each size -->
            <?php
            $query = "SELECT  pro_vars.product_id, pro_vars.variant_id, variants.variant_id, variants.variant, variants.value
            FROM variants, pro_vars
            WHERE pro_vars.product_id = $product_id
            AND  variants.variant_id = pro_vars.variant_id
            AND variants.value LIKE '%size%'";

            $result = $db->query($query);
            if($result->num_rows >= 1) {
              while($row = $result->fetch_assoc()){
                ?>
                <option value="<?php echo $row['variant']; ?>">
                  <?php echo strtoupper($row['variant']); ?>
                </option>
                <?php
              }
              $result->free();
            }
            ?>
          </select>

          <fieldset class="colors">
            <label style="display: block">Choose Your Color</label>

            <?php
            $query = "SELECT  pro_vars.product_id, pro_vars.variant_id, variants.variant_id, variants.variant, variants.value
            FROM variants, pro_vars
            WHERE pro_vars.product_id = $product_id
            AND  variants.variant_id = pro_vars.variant_id
            AND variants.value = 'color'";

            $result = $db->query($query);
            if($result->num_rows >= 1) {

              while($row = $result->fetch_assoc()){
                ?>
                <label for="the_<?php echo $row['variant']; ?>" style="color: <?php echo $row['variant']; ?> "><?php echo $row['variant']; ?></label>
                <input type="radio" name="color" value="<?php echo $row['variant']; ?>" id="the_<?php echo $row['variant']; ?>"  checked required>
                <?php
              }
              $result->free();
            }
            ?>
          </fieldset>
          <input type="submit" value="Add to Cart" />
          <input type="hidden" name="did_added"  value="1" />
        </form>

      </div>

      <?php
    }
    ?>

    <div class="reviews">
      <section>
        <h2>Customer Reviews</h2>
      <?php
      $query = "SELECT reviews.review_id, reviews.title, reviews.body, reviews.date, reviews.user_id, reviews.product_id, reviews.is_approved, products.product_id, users.user_id, users.username
              FROM reviews, products, users
              WHERE reviews.product_id = $product_id
              AND reviews.user_id = users.user_id
              AND reviews.product_id = products.product_id
              ORDER BY date ASC
              LIMIT 100";
      $result = $db->query($query);
      if($result->num_rows >= 1){
        while($row = $result->fetch_assoc()){
      ?>
        <article>
          <h4><?php echo $row['title']; ?></h4>
          <h5>by <?php echo $row['username']; ?> on <?php echo convert_date($row['date']); ?></h5>
          <p>
            <?php echo $row['body']; ?>
          </p>
        </article>
        <?php
        }
        $result->free();
        }
        ?>
      </section>



      <form action="http://localhost/joemo/finalProject/single-product.php?product_id=<?php echo $product_id; ?>" method="post">

        <label for="the_title">Title</label>
        <input type="text" name="title" id="the_title" required />
        <label for="the_review">Review</label>
        <textarea name="review" id="the_review" rows="6" required></textarea>

        <input type="submit" value="Review" />
        <input type="hidden" name="did_review" value = "1" />
      </form>
    </div>




  </div>
</main>
<?php include('footer.php')?>
