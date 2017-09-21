<?php
$current_page = 'Shirts';
include('admin-header.php');
?>

<div class="hero-image">
  <section>
    <img src="images/family.jpg" alt="Family Shirt" />
    <h2><a href="single-product.php?product_id=1">Shop Now</a></h2>
  </section>
</div>

<main class="cf">

  <div>
    <nav class="asc-desc">
      <ul class="top">
        <li><a>Price Filter</a>
          <ul class="sub">
        <li>
          <a href="shirt-asc.php">Low to High</a>
        </li>
        <li>
          <a href="shirt-desc.php">High to Low</a>
        </li>
        </ul>
        </li>
      </ul>
    </nav>
<?php
  $query = "SELECT product_id, product, image, description, price, product_type
            FROM products
            WHERE product_type = 'shirt'";
  $result = $db->query($query);

  if($result->num_rows >= 1 ){
    while($row = $result->fetch_assoc()){
?>
    <a href="single-product.php?product_id=<?php echo $row['product_id'] ?>">
      <div class="product-images">
        <figure>
          <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['product']; ?>" />
          <figcaption>
            <p>
              <?php echo $row['product']; ?> -- &dollar;<?php echo $row['price']; ?>
            </p>
          </figcaption>
        </figure>
      </div>
    </a>
<?php
}
$result->free();
}
?>

  </div>
</main>

<?php include('footer.php'); ?>
