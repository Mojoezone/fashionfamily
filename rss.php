<?php
//connect to DB
require('db-config.php');

//for compatibility because of the <? symbol
echo '<?xml version="1.0" ?>';

//get all the recent published posts out of the db
$query = "SELECT product, product_type, image, description, price, product_id
          FROM products";
//run it
$result = $db->query($query);
//check it
if(! $result){
  die($db->error);
}

if($result->num_rows >= 1){
?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>Fashion Family RSS Feed</title>
<!-- Update when the site goes live! -->
<link>http://localhost/joemo/finalProject/</link>
<description>Subscribe for updates to the products!</description>

<?php while($row = $result->fetch_assoc()){ ?>
<item>


    <title><?php echo $row['product']; ?></title>
    <link>http://localhost/joemo/finalProject/single-product.php?product_id=<?php echo $row['product_id']; ?></link>

    <description><![CDATA[
      <img src="http://localhost/joemo/finalProject/<?php echo $row['image']; ?>" />
      <p>
      <?php echo $row['description']; ?> <?php echo $row['price']; ?>
    </p>]]></description>


</item>
<?php }// end loop ?>
</channel>
</rss>
<?php }//end if statement if there are rows ?>
