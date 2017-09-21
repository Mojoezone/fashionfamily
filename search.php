<?php
$current_page = 'Search';
include('admin-header.php');
//search configuration, 2 result per page chan change later on
$per_page = 5;


//sanitize the phrase
$phrase = clean_string($_GET['phrase']);
//parse the search form if the phrase is not blank
if($phrase != ''){
  //get all the posts that contain the phrase
  $query = "SELECT product_id, product, description, image
  FROM products
  WHERE (product LIKE '%$phrase%'
    OR description LIKE '%$phrase%')";

    $result = $db->query($query);
    $total = $result->num_rows;

//take the maxpage  total reult divide by  per_page. figure out how many page we need
    $max_page = ceil($total / $per_page);

    //figure out what page we on. query string will look like search.php?phrase=blank&page=2
    if($_GET['page']){
      $current_page = $_GET['page'];
    }else{
      $current_page = 1;
    }

    //check for out of bounds page
    if($current_page > $max_page){
      //change it to the last page if it is out of bounds
      $current_page = $max_page;
    }//end the out of bound if statement

  }//end parse search

  ?>


  <main class="cf contact">
<div class="contact-form">

    <?php
    //if there are results show them,
    if($total >= 1){
      ?>
      <section class="result">



        <h2>Search Results</h2>
        <h3><?php echo $total; ?> products found. Showing page <?php echo $current_page; ?> of <?php echo $max_page; ?> </h3>



        <?php
        //figure out the offset of this page
        $offset = ($current_page - 1)*$per_page;
        $query .= " LIMIT $offset, $per_page";
        //run the query again with limit
        $result = $db->query($query);

         while($row = $result->fetch_assoc()){
           ?>
          <article>
            <h3><a href="single-product.php?product_id=<?php echo $row['product_id']; ?>"><?php echo $row['product']; ?></a></h3>
            <div class="search-image">
              <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['product']; ?>">
            </div>
            <div class="exceprt">
              <!-- substr is from first character to the number 100 characters, %hellip; is the ... -->
              <?php echo substr($row['description'], 0, 100); ?>&hellip;
            </div>
          </article>
          <?php } ?>
        </section>

        <section class="pagination">
          <?php
          $previous = $current_page - 1;
          $next = $current_page + 1;

             //show the next button if we are not on the last page
             if($current_page != 1){
           ?>
          <a href="search.php?phrase=<?php echo $phrase; ?>&amp;page=<?php echo $previous; ?>">&larr;Previous Page</a>
<?php }

//loop for numbered pagination
for ($i = 1; $i <= $max_page; $i++){
  ?>
  <a href="search.php?phrase=<?php echo $phrase; ?>&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a>
  <?php
}

?>



          <?php
            //show the next button if we are not on the last page
            if($current_page != $max_page){
          ?>
          <a href="search.php?phrase=<?php echo $phrase; ?>&amp;page=<?php echo $next; ?>">Next Page &rarr;</a>
          <?php } ?>

        </section>

        <?php } //ednf if statement
        else{
          echo 'No product found matching ' . $phrase;
        }//end else
        ?>
      </div>
      </main>


      <?php include('footer.php'); ?>
